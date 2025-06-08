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
                  <h2 class="section-title">My Book Requests</h2>
                  <span class="underline center"></span>
               </div>
               @if ($orders->count())
               <table class="table table-bordered shop_table orders">
                  <thead>
                     <tr>
                        <th class="text-center align-middle">Order Number</th>
                        <th>Book Details</th>
                        <th class="text-center align-middle">Status & Dates</th>
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
                              Requested: {{ $order->created_at?->format('Y-m-d') ?? 'N/A' }}
                              </small>
                           </div>
                        </td>
                        <td>
                           <div class="d-flex flex-wrap">
                              @foreach ($order->books as $book)
                              <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px; width: 100%;">
                                 <img src="data:image/jpeg;base64,{{ $book->image }}"
                                    alt="{{ $book->title }}"
                                    style="height: 80px; width: 60px; object-fit: cover;">
                                 <div>
                                    <strong>{{ $book->title }}</strong><br>
                                    <span><strong>Author:</strong> {{ $book->author }}</span><br>
                                    <span><strong>ISBN:</strong> {{ $book->isbn }}</span>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                        </td>
                        <td class="text-center align-middle">
                           @switch($order->status)
                           @case('pending')
                           <span class="badge bg-warning text-dark">Pending Review</span>
                           <br><small class="text-muted">Waiting for admin approval</small>
                           @break
                           @case('approved')
                           <span class="badge bg-success">Approved</span>
                           <br><small class="text-muted">Ready for collection</small>
                           @break
                           @case('issued')
                           <span class="badge bg-primary">Books Issued</span>
                           @if($order->issued_at)
                           <br><small><strong>Issued:</strong> {{ $order->issued_at->format('Y-m-d') }}</small>
                           @endif
                           @if($order->due_at)
                           <br><small><strong>Due:</strong> {{ $order->due_at->format('Y-m-d') }}</small>
                           @endif
                           @break
                           @case('rejected')
                           <span class="badge bg-danger">Rejected</span>
                           @if($order->notes)
                           <br><small class="text-muted">{{ $order->notes }}</small>
                           @endif
                           @break
                           @case('returned')
                           <span class="badge bg-info">Returned</span>
                           @if($order->returned_at)
                           <br><small><strong>Returned:</strong> {{ $order->returned_at->format('Y-m-d') }}</small>
                           @endif
                           @break
                           @case('cancelled')
                           <span class="badge bg-secondary">Cancelled</span>
                           @break
                           @default
                           <span class="badge bg-light text-dark">{{ ucfirst($order->status) }}</span>
                           @endswitch
                        </td>
                        <td class="text-center align-middle">
                           @if ($order->status === 'pending')
                           <button class="btn btn-sm btn-danger cancel-order"
                              data-id="{{ $order->id }}">
                           <i class="fas fa-times-circle"></i> Cancel Request
                           </button>
                           @else
                           <span class="text-muted">
                           @if($order->status === 'cancelled')
                           Request cancelled
                           @elseif($order->status === 'rejected')
                           Request rejected
                           @elseif($order->status === 'approved')
                           Approved - Ready for collection
                           @elseif($order->status === 'issued')
                           Books in your possession
                           @elseif($order->status === 'returned')
                           Books returned
                           @endif
                           </span>
                           @endif
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
               @else
               <div class="text-center mt-4">
                  <i class="fas fa-book-open fa-3x text-muted mb-3"></i>
                  <p>No book requests found.</p>
                  <a href="{{ route('books.index') }}" class="read-more-btn">
                  <i class="fas fa-search"></i> Browse Books
                  </a>
               </div>
               @endif
            </div>
         </div>
       <script>
         document.querySelectorAll('.cancel-order').forEach(button => {
                    button.addEventListener('click', function() {
                        const orderId = this.getAttribute('data-id');
                        
                        if (confirm('Are you sure you want to cancel this book request?')) {
                            fetch(`/orders/${orderId}/cancel`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json',
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert('Your request has been cancelled successfully.');
                                    location.reload();
                                } else {
                                    alert('Error: ' + data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred while cancelling the request.');
                            });
                        }
                    });
       </script>
      </main>
   </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/orders.js') }}"></script>
@endsection