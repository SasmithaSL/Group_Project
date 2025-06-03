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
<style>
   document.addEventListener('DOMContentLoaded', function() {
   // Generate QR Code
   document.querySelectorAll('.generate-qr').forEach(button => {
   button.addEventListener('click', function() {
   // Get data from individual attributes
   const orderData = {
   order_code: this.getAttribute('data-order-code'),
   book_ids: JSON.parse(this.getAttribute('data-book-ids') || '[]'),
   borrowed_at: this.getAttribute('data-borrowed-at'),
   due_at: this.getAttribute('data-due-at')
   };
   const qrOutput = this.parentElement.querySelector('.qr-output');
   const downloadBtn = this.parentElement.querySelector('.download-qr');
   // Create QR code
   const qr = qrcode(0, 'M');
   qr.addData(JSON.stringify(orderData));
   qr.make();
   // Display QR code
   qrOutput.innerHTML = `
   <div style="margin-top: 10px;">
      ${qr.createImgTag(3)}
      <br><small class="text-muted">Show this QR at library</small>
   </div>
   `;
   // Show download button
   downloadBtn.style.display = 'inline-block';
   // Set up download functionality
   const canvas = qrOutput.querySelector('img');
   if (canvas) {
   const downloadCanvas = document.createElement('canvas');
   const ctx = downloadCanvas.getContext('2d');
   const img = new Image();
   img.onload = function() {
   downloadCanvas.width = img.width;
   downloadCanvas.height = img.height;
   ctx.drawImage(img, 0, 0);
   downloadBtn.href = downloadCanvas.toDataURL('image/png');
   };
   img.src = canvas.src;
   }
   // Hide generate button after first use
   this.style.display = 'none';
   });
   });
   // Cancel Order (keeping your existing code)
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
   });
   });
</style>
<div class="site-content" id="content">
   <div class="content-area" id="primary">
      <main class="site-main" id="main">
         <!-- resources\views\user\orders.blade.php -->
         <!-- resources\views\user\orders.blade.php -->
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
                        <th class="text-center align-middle">Order Code</th>
                        <th>Book Details</th>
                        <th class="text-center align-middle">Status & Dates</th>
                        <th class="text-center align-middle">QR Code</th>
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
                           @if($order->borrowed_at)
                           <br><small><strong>Borrowed:</strong> {{ $order->borrowed_at->format('Y-m-d') }}</small>
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
                           @if ($order->status === 'approved')
                           <div style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
                              <button class="btn btn-sm btn-info generate-qr"
                                 data-order-code="{{ $order->order_code }}"
                                 data-book-ids="{{ json_encode($order->book_ids) }}"
                                 data-borrowed-at="{{ $order->borrowed_at?->toDateString() }}"
                                 data-due-at="{{ $order->due_at?->toDateString() }}">
                              <i class="fas fa-qrcode"></i> Generate QR
                              </button>
                              <a href="#" class="btn btn-sm btn-secondary download-qr"
                                 style="display: none;" download="order-qr.png">
                              <i class="fas fa-download"></i> Download QR
                              </a>
                              <div class="qr-output"></div>
                           </div>
                           @elseif ($order->status === 'pending')
                           <div class="text-muted">
                              <i class="fas fa-hourglass-half"></i><br>
                              <small>QR available after approval</small>
                           </div>
                           @elseif ($order->status === 'rejected')
                           <div class="text-muted">
                              <i class="fas fa-ban"></i><br>
                              <small>Request rejected</small>
                           </div>
                           @else
                           <div class="text-muted">
                              <i class="fas fa-check-circle"></i><br>
                              <small>Completed</small>
                           </div>
                           @endif
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
                           Approved - Contact library
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
         <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode-generator/1.4.4/qrcode.min.js"></script>
         <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Generate QR Code
                document.querySelectorAll('.generate-qr').forEach(button => {
                    button.addEventListener('click', function() {
                        const orderData = JSON.parse(this.getAttribute('data-order'));
                        const qrOutput = this.parentElement.querySelector('.qr-output');
                        const downloadBtn = this.parentElement.querySelector('.download-qr');
                        
                        // Create QR code
                        const qr = qrcode(0, 'M');
                        qr.addData(JSON.stringify(orderData));
                        qr.make();
                        
                        // Display QR code
                        qrOutput.innerHTML = `
                            <div style="margin-top: 10px;">
                                ${qr.createImgTag(3)}
                                <br><small class="text-muted">Show this QR at library</small>
                            </div>
                        `;
                        
                        // Show download button
                        downloadBtn.style.display = 'inline-block';
                        
                        // Set up download functionality
                        const canvas = qrOutput.querySelector('img');
                        if (canvas) {
                            const downloadCanvas = document.createElement('canvas');
                            const ctx = downloadCanvas.getContext('2d');
                            const img = new Image();
                            
                            img.onload = function() {
                                downloadCanvas.width = img.width;
                                downloadCanvas.height = img.height;
                                ctx.drawImage(img, 0, 0);
                                
                                downloadBtn.href = downloadCanvas.toDataURL('image/png');
                            };
                            
                            img.src = canvas.src;
                        }
                        
                        // Hide generate button after first use
                        this.style.display = 'none';
                    });
                });
            
                // Cancel Order
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
                });
            });
         </script>
      </main>
   </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/orders.js') }}"></script>
@endsection