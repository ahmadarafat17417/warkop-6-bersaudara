<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Order; // You'll need to create this model
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->where('user_id', Auth::id())->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $taxRate = 0.1;
        $tax = $subtotal * $taxRate;
        $total = $subtotal + $tax;

        return view('pages.cart.index', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
        ]);
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        $cartItem = CartItem::where('user_id', Auth::id())->where('product_id', $productId)->first();

        if ($cartItem) {
            $cartItem->delete();
            ToastMagic::info('Produk dihapus dari keranjang: ', $product->name);
            return back()->with('success', 'Item removed from cart');
        }

        CartItem::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'quantity' => 1,
        ]);

        ToastMagic::success('Berhasil menambahkan produk ke keranjang: ', $product->name);
        return back()->with('success', 'Item added to cart!');
    }

    public function increase($id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())->findOrFail($id);
        $cartItem->increment('quantity');
        return back();
    }

    public function decrease($id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())->findOrFail($id);

        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        }

        return back();
    }

    public function remove($id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())->findOrFail($id);
        $cartItem->delete();

        return back()->with('success', 'Item removed from cart');
    }

    public function checkout(Request $request)
    {
        $cartItems = CartItem::with('product')->where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty!');
        }

        try {
            $order = DB::transaction(function () use ($cartItems) {
                // Create order
                $order = Order::create([
                    'order_number' => 'ORD-' . strtoupper(Str::random(10)),
                    'user_id' => Auth::id(),
                    'subtotal' => $cartItems->sum(fn($item) => $item->product->price * $item->quantity),
                    'tax' => $cartItems->sum(fn($item) => $item->product->price * $item->quantity) * 0.1,
                    'total' => $cartItems->sum(fn($item) => $item->product->price * $item->quantity) * 1.1,
                    'status' => 'processing',
                    'payment_method' => $request->payment_method ?? 'qris',
                    'payment_status' => 'paid',
                    'paid_at' => now(),
                ]);

                // Create order items and update stock
                foreach ($cartItems as $item) {
                    $product = $item->product;

                    if ($product->stock < $item->quantity) {
                        throw new \Exception("Insufficient stock for {$product->name}");
                    }

                    // Create order item
                    $order->items()->create([
                        'product_id' => $product->id,
                        'product_name' => $product->name,
                        'price' => $product->price,
                        'quantity' => $item->quantity,
                        'subtotal' => $product->price * $item->quantity,
                    ]);

                    // Decrease stock
                    $product->decrement('stock', $item->quantity);
                }

                // Clear cart
                CartItem::where('user_id', Auth::id())->delete();

                return $order;
            });

            ToastMagic::success('Pembayaran berhasil!');
            return redirect()->route('order.receipt', $order->order_number);

        } catch (\Exception $e) {
            ToastMagic::error('Checkout gagal: ' . $e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function receipt($orderNumber)
    {
        $order = Order::with('items.product')
            ->where('order_number', $orderNumber)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('pages.order.receipt', compact('order'));
    }
}
