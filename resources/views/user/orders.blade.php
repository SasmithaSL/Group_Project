@extends('user.layout')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection
@section('content')
    <section class="page-banner services-banner">
        <div class="container">
            <div class="banner-header text-center">
                <h2>Your Orders</h2>
                <span class="underline center"></span>
            </div>
        </div>
    </section>

    <div class="site-content" id="content">
        <div class="content-area" id="primary">
            <main class="site-main" id="main">
                <div class="cart-main">
                    <div class="container">
                        <div class="center-content">
                            @if (session('success'))
                                <div class="alert alert-success text-center mt-3">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <h2 class="section-title">Order History</h2>
                            <span class="underline center"></span>
                        </div>

                        @if ($orders->count())
                            <table class="table table-bordered shop_table orders">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Order Code</th>
                                        <th>Book Details</th>
                                        <th class="text-center align-middle">Status / QR</th>
                                        <th class="text-center align-middle">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="text-center align-middle" style="vertical-align: middle;">
                                                <div>
                                                    <strong>{{ $order->order_code }}</strong><br>
                                                    <small>
                                                        Ordered: {{ $order->created_at?->format('Y-m-d') ?? 'N/A' }}<br>
                                                        Borrowed:
                                                        {{ $order->borrowed_at?->format('Y-m-d') ?? 'Not Borrowed Yet' }}<br>
                                                        Due: {{ $order->due_at?->format('Y-m-d') ?? 'Not Borrowed Yet' }}
                                                    </small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-wrap">
                                                    @foreach ($order->books as $book)
                                                        <div
                                                            style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px; width: 100%;">
                                                            <img src="data:image/jpeg;base64,{{ $book->image }}"
                                                                alt="{{ $book->title }}"
                                                                style="height: 80px; width: 60px; object-fit: cover;">
                                                            <div>
                                                                <strong>{{ $book->title }}</strong><br>
                                                                <span><strong>Author:</strong>
                                                                    {{ $book->author }}</span><br>
                                                                <span><strong>ISBN:</strong> {{ $book->isbn }}</span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>

                                            <td class="text-center align-middle">
                                                @if ($order->status !== 'cancelled')
                                                    <span class="badge bg-primary">{{ ucfirst($order->status) }}</span><br>

                                                    <div
                                                        style="display: flex; flex-direction: column; align-items: center; gap: 10px; margin-top: 10px;">
                                                        <button class="btn btn-sm btn-info generate-qr"
                                                            data-order='@json(['order_code' => $order->order_code, 'book_ids' => $order->book_ids])'>
                                                            <i class="fas fa-qrcode"></i> Generate QR
                                                        </button>

                                                        <a href="#" class="btn btn-sm btn-secondary download-qr"
                                                            style="display: none;" download="order-qr.png">
                                                            Download QR
                                                        </a>

                                                        <div class="qr-output"></div>
                                                    </div>
                                                @else
                                                    <button class="btn btn-sm btn-info" disabled>
                                                        <i class="fas fa-ban"></i> QR Disabled
                                                    </button>
                                                @endif
                                            </td>
                                            <td class="text-center align-middle">
                                                @if ($order->status === 'pending')
                                                    <button class="btn btn-sm btn-danger cancel-order"
                                                        data-id="{{ $order->id }}">
                                                        <i class="fas fa-times-circle"></i> Cancel
                                                    </button>
                                                @else
                                                    <span class="text-muted">Cancelled</span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center mt-4">
                                <p>No orders found.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/orders.js') }}"></script>
@endsection
