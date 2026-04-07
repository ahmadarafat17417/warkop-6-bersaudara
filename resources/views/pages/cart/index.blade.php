@extends('layouts.default')

@section('page_title', 'Your Cart')

@section('body_style', 'font-[Poppins]')

@section('page_content')
    <div class="container px-4 py-8 mx-auto max-w-7xl">
        <!-- Header dengan Breadcrumb -->
        <div class="mb-8">
            <nav class="flex mb-4 text-sm text-gray-500">
                <a href="{{ route('products.index') }}" class="hover:text-blue-600">Home</a>
                <span class="mx-2">/</span>
                <span class="text-gray-800">Cart</span>
            </nav>
            <h1 class="text-3xl font-bold text-gray-800">Shopping Cart</h1>
            <p class="text-gray-600">{{ $cartItems->count() }} item(s) in your cart</p>
        </div>

        @if ($cartItems->isEmpty())
            <div class="py-16 text-center bg-white rounded-lg shadow-sm">
                <x-mdi-cart-outline class="w-24 h-24 mx-auto text-gray-300" />
                <p class="mt-4 text-xl text-gray-600">Your cart is empty</p>
                <p class="mt-2 text-gray-500">Looks like you haven't added any items to your cart yet.</p>
                <a href="{{ route('main.index') }}"
                    class="inline-flex items-center px-6 py-3 mt-6 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700 gap-x-2">
                    <x-mdi-shopping-outline class="w-5 h-5" />
                    Continue Shopping
                </a>
            </div>
        @else
            <div class="flex flex-col gap-8 lg:flex-row">
                <!-- Cart Items Section -->
                <div class="flex-1">
                    <!-- Cart Items Header -->
                    <div class="hidden p-4 mb-4 bg-white rounded-lg shadow-sm lg:grid lg:grid-cols-12 gap-x-4">
                        <div class="col-span-6 text-sm font-medium text-gray-500">Product</div>
                        <div class="col-span-2 text-sm font-medium text-center text-gray-500">Price</div>
                        <div class="col-span-2 text-sm font-medium text-center text-gray-500">Quantity</div>
                        <div class="col-span-2 text-sm font-medium text-right text-gray-500">Total</div>
                    </div>

                    <!-- Cart Items -->
                    <div class="space-y-4">
                        @foreach ($cartItems as $item)
                            <div class="p-4 transition bg-white rounded-lg shadow-sm hover:shadow-md">
                                <div class="flex flex-col gap-4 lg:grid lg:grid-cols-12 lg:items-center lg:gap-x-4">
                                    <!-- Product Info -->
                                    <div class="flex col-span-6 gap-4">
                                        <!-- Product Image with zoom effect -->
                                        <div class="relative overflow-hidden rounded-lg w-28 h-28 group">
                                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                                alt="{{ $item->product->name }}"
                                                class="object-cover w-full h-full transition group-hover:scale-110">
                                        </div>

                                        <!-- Product Details -->
                                        <div class="flex-1">
                                            <h3 class="text-lg font-semibold text-gray-800">{{ $item->product->name }}</h3>
                                            <p class="text-sm text-gray-500">{{ $item->product->category }}</p>

                                            <!-- Mobile Price (visible only on mobile) -->
                                            <div class="mt-2 lg:hidden">
                                                <span class="text-sm text-gray-500">Price: </span>
                                                <span class="font-medium">Rp.
                                                    {{ number_format($item->product->price) }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Price (desktop) -->
                                    <div class="hidden col-span-2 text-center lg:block">
                                        <span class="font-medium">Rp. {{ number_format($item->product->price) }}</span>
                                    </div>

                                    <!-- Quantity Controls -->
                                    <div class="col-span-2">
                                        <div class="flex items-center justify-start lg:justify-center">
                                            <div class="flex items-center bg-gray-50 rounded-xl">
                                                <form action="{{ route('cart.decrease', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="w-10 h-10 text-gray-400 transition-all rounded-l-xl hover:text-blue-600 hover:bg-blue-50 hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-200">
                                                        <x-mdi-minus class="w-4 h-4 mx-auto" />
                                                    </button>
                                                </form>

                                                <span
                                                    class="w-12 text-lg font-medium text-center text-gray-700 select-none">{{ $item->quantity }}</span>

                                                <form action="{{ route('cart.increase', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="w-10 h-10 text-gray-400 transition-all rounded-r-xl hover:text-blue-600 hover:bg-blue-50 hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-200">
                                                        <x-mdi-plus class="w-4 h-4 mx-auto" />
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Total Price and Actions -->
                                    <div class="flex items-center justify-between col-span-2">
                                        <div class="lg:text-right">
                                            <span class="text-sm text-gray-500 lg:hidden">Total: </span>
                                            <span class="font-semibold text-blue-600">Rp.
                                                {{ number_format($item->product->price * $item->quantity) }}</span>
                                        </div>

                                        <!-- Remove Button -->
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-500 transition rounded-full hover:text-red-700 hover:bg-red-50"
                                                onclick="return confirm('Are you sure you want to remove this item?')">
                                                <x-mdi-delete-outline class="w-5 h-5" />
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Cart Actions -->
                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('products.index') }}"
                            class="inline-flex items-center text-blue-600 transition hover:text-blue-800 gap-x-2">
                            <x-mdi-arrow-left class="w-5 h-5" />
                            Continue Shopping
                        </a>

                        <form method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center text-red-500 transition hover:text-red-700 gap-x-2"
                                onclick="return confirm('Are you sure you want to clear your cart?')">
                                <x-mdi-delete-sweep-outline class="w-5 h-5" />
                                Clear Cart
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:w-80">
                    <div class="sticky p-6 bg-white rounded-lg shadow-sm top-4">
                        <h2 class="mb-6 text-xl font-semibold">Order Summary</h2>

                        <!-- Summary Items -->
                        <div class="space-y-4">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span class="font-medium">Rp. {{ number_format($subtotal) }}</span>
                            </div>

                            <div class="flex justify-between text-gray-600">
                                <span>Tax (10%)</span>
                                <span class="font-medium">Rp. {{ number_format($tax) }}</span>
                            </div>

                            <div class="flex justify-between text-gray-600">
                                <span>Shipping</span>
                                <span class="text-green-600">Free</span>
                            </div>

                            <!-- Total -->
                            <div class="flex justify-between pt-4 text-lg font-semibold border-t">
                                <span>Total</span>
                                <span class="text-xl text-blue-600">Rp. {{ number_format($total) }}</span>
                            </div>
                        </div>

                        <!-- Checkout Button - Modified to open modal -->
                        <button type="button" onclick="openQRModal()"
                            class="inline-flex items-center justify-center w-full px-6 py-3 mt-6 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700 gap-x-2">
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- QR Code Modal -->
    <div id="qrModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background overlay dengan blur -->
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75 backdrop-blur-sm" aria-hidden="true"></div>

            <!-- Modal panel -->
            <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="w-full mt-3 text-center sm:mt-0 sm:text-left">
                            <!-- Modal Header -->
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                                    Complete Your Payment
                                </h3>
                                <button onclick="closeQRModal()" class="text-gray-400 hover:text-gray-500">
                                    <x-mdi-close class="w-6 h-6" />
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="mt-2">
                                <p class="mb-4 text-sm text-gray-500">
                                    Scan the QR code below to complete your payment of <span class="font-semibold text-blue-600">Rp. {{ number_format($total) }}</span>
                                </p>

                                <!-- QR Code Image -->
                                <div class="flex justify-center p-6 mb-4 bg-gray-50 rounded-xl">
                                    <img src="{{ asset('img/about/qris.png') }}"
                                         alt="Payment QR Code"
                                         class="">
                                </div>

                                <!-- Additional Payment Info -->
                                <div class="p-4 text-sm bg-blue-50 rounded-xl">
                                    <p class="text-blue-700">
                                        <span class="font-semibold">Instructions:</span><br>
                                        1. Open your payment app<br>
                                        2. Scan the QR code above<br>
                                        3. Confirm the payment amount<br>
                                        4. Click "Selesaikan Pembayaran" after payment
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                    <!-- Selesaikan Pembayaran Button - This will submit the checkout form -->
                    <form action="{{ route('cart.checkout') }}" method="POST" id="checkoutForm" class="inline">
                        @csrf
                        <button type="submit"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Selesaikan Pembayaran
                        </button>
                    </form>

                    <!-- Cancel Button -->
                    <button type="button" onclick="closeQRModal()"
                        class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Modal -->
    <script>
        function openQRModal() {
            document.getElementById('qrModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        function closeQRModal() {
            document.getElementById('qrModal').classList.add('hidden');
            document.body.style.overflow = 'auto'; // Restore scrolling
        }

        // Close modal when clicking outside (optional)
        window.onclick = function(event) {
            const modal = document.getElementById('qrModal');
            if (event.target === modal) {
                closeQRModal();
            }
        }

        // Close modal with ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeQRModal();
            }
        });
    </script>
@endsection
