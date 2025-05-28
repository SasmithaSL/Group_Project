@extends('user.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('content')
    <section class="page-banner services-banner">
        <div class="container">
            <div class="banner-header">
                <h2>Cart Page</h2> <span class="underline center"></span>
            </div>
        </div>
    </section>

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="cart-main">
                    <div class="container">
                        <div class="center-content">
                            @if (session('success'))
                                <div class="alert alert-success text-center mt-3">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <h2 class="section-title">Review your selected books</h2>
                            <span class="underline center"></span>
                        </div>

                        <form id="cartForm">
                            <table class="table table-bordered shop_table cart">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center align-middle">
                                            <i class="fas fa-check-square fa-xl" title="Select"></i>
                                        </th>
                                        <th scope="col">Book Details</th>
                                        <th scope="col" class="text-center align-middle">
                                            <i class="fas fa-cog fa-2x" title="Actions"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($cartItems as $item)
                                        <tr class="cart_item">
                                            <td class="text-center align-middle">
                                                <input type="checkbox" name="selected_books[]" value="{{ $item->id }}"
                                                    data-title="{{ $item->book->title }}"
                                                    data-image="data:image/jpeg;base64,{{ $item->book->image }}">
                                            </td>
                                            <td>
                                                <div style="display: flex; align-items: center;">
                                                    <img src="data:image/jpeg;base64,{{ $item->book->image }}"
                                                        alt="{{ $item->book->title }}"
                                                        style="height: 111px; width: 100px; object-fit: cover; margin-right: 15px;">
                                                    <div>
                                                        <strong>{{ $item->book->title }}</strong><br>
                                                        <span><strong>Author:</strong> {{ $item->book->author }}</span><br>
                                                        <span><strong>ISBN:</strong> {{ $item->book->isbn }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <a href="#" class="text-danger remove-btn" title="Remove"
                                                    data-url="{{ route('cart.remove', $item->id) }}">
                                                    <i class="fas fa-trash-alt fa-2x"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Your cart is empty.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            @if (count($cartItems))
                                <div class="d-flex justify-content-end mt-4 text-right">
                                    <button type="button" id="checkoutBtn" class="read-more-btn" style="margin-bottom: 20px;">
                                        <i class="fas fa-shopping-cart me-2"></i> Checkout Selected
                                    </button>
                                </div>
                            @endif

                        </form>

                        {{-- Modal --}}
                        <div id="checkoutModal" class="modal" style="display: none;">
                            <div class="modal-content"
                                style="width: 400px; margin: auto; padding: 20px; background: white; border-radius: 10px; position: relative;">
                                <button id="closeModalBtn"
                                    style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 20px;">&times;</button>

                                <h3 class="text-center">Confirm Order</h3>
                                <div id="bookList" style="margin-top: 15px;"></div>
                                <div style="text-align: center; margin-top: 15px;">
                                    <button id="placeOrderBtn" class="read-more-btn">Place Order</button>
                                </div>

                                <div id="loading" style="display:none;">Processing...</div>
                                <div style="display: flex; flex-direction: column; align-items: center; margin-top: 20px;">
                                    <div id="qrCodeContainer" style="margin-bottom: 15px;"></div>
                                    <a id="downloadQrBtn" style="display:none;" download="order-qr.png"
                                        class="read-more-btn">Download QR</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const cartProcessUrl = "{{ route('cart.process') }}";
        const csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('js/cart.js') }}"></script>
@endsection
