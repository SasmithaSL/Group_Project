@extends('user.layout')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection
@section('content')
<section class="page-banner services-banner">
   <div class="container">
      <div class="banner-header">
         <h2>Cart Page</h2>
         <span class="underline center"></span>
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
               </form>
               @if (count($cartItems))
               <div class="mt-4" style="margin-bottom: 20px; text-align: right !important; display: flex !important; justify-content: flex-end !important; align-items: center !important; gap: 10px !important;">
                  <button type="button" id="selectAllBtn" class="btn btn-outline-primary" style="padding: 8px 16px; height: 38px;">
                  <i class="fas fa-check-square me-1"></i> SELECT ALL
                  </button>
                  <button type="button" id="deselectAllBtn" class="btn btn-outline-secondary" style="padding: 8px 16px; height: 38px;">
                  <i class="fas fa-square me-1"></i> DESELECT ALL
                  </button>
                  <button type="button" id="checkoutBtn" class="read-more-btn">
                  <i class="fas fa-shopping-cart me-2"></i> REQUEST BOOKS
                  </button>
               </div>
               @endif
               {{-- Modal --}}
               <div id="checkoutModal" class="modal" style="display: none;">
                  <div class="modal-content"
                     style="width: 400px; margin: auto; padding: 20px; background: white; border-radius: 10px; position: relative;">
                     <button id="closeModalBtn"
                        style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 20px;">&times;</button>
                     <h3 class="text-center">Confirm Book Request</h3>
                     <div id="bookList" style="margin-top: 15px;"></div>
                     <div style="display: flex; justify-content: center; margin-top: 15px;">
                        <button id="placeOrderBtn" class="read-more-btn" style="align-self: center;">Submit Request</button>
                     </div>
                     <div id="loading" style="display:none; text-align: center; margin-top: 20px;">
                        <i class="fas fa-spinner fa-spin"></i> Processing your request...
                     </div>
                     <div id="successMessage" style="display:none; text-align: center; margin-top: 20px;">
                        <i class="fas fa-check-circle" style="color: green; font-size: 24px;"></i>
                        <p style="margin-top: 10px; color: green;">Your book request has been submitted successfully!</p>
                        <p style="color: #666; font-size: 14px;">The admin will review your request and you'll be notified once it's approved.</p>
                        <button id="okBtn" class="read-more-btn" style="margin-top: 15px; align-self: center;">OK</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <script>
            document.addEventListener('DOMContentLoaded', function() {
                const checkoutBtn = document.getElementById('checkoutBtn');
                const checkoutModal = document.getElementById('checkoutModal');
                const closeModalBtn = document.getElementById('closeModalBtn');
                const placeOrderBtn = document.getElementById('placeOrderBtn');
                const bookList = document.getElementById('bookList');
                const loading = document.getElementById('loading');
                const successMessage = document.getElementById('successMessage');
                const okBtn = document.getElementById('okBtn');
                const selectAllBtn = document.getElementById('selectAllBtn');
                const deselectAllBtn = document.getElementById('deselectAllBtn');
            
                selectAllBtn.addEventListener('click', function() {
                    const checkboxes = document.querySelectorAll('input[name="selected_books[]"]');
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = true;
                    });
                });
            
                deselectAllBtn.addEventListener('click', function() {
                    const checkboxes = document.querySelectorAll('input[name="selected_books[]"]');
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = false;
                    });
                });
            
                checkoutBtn.addEventListener('click', function() {
                    const selectedBooks = document.querySelectorAll('input[name="selected_books[]"]:checked');
                    
                    if (selectedBooks.length === 0) {
                        alert('Please select at least one book to request.');
                        return;
                    }
            
                    bookList.innerHTML = '';
                    selectedBooks.forEach(function(checkbox) {
                        const title = checkbox.getAttribute('data-title');
                        const image = checkbox.getAttribute('data-image');
                        
                        const bookItem = document.createElement('div');
                        bookItem.style.cssText = 'display: flex; align-items: center; margin-bottom: 10px; padding: 10px; border: 1px solid #ddd; border-radius: 5px;';
                        bookItem.innerHTML = `
                            <img src="${image}" alt="${title}" style="height: 60px; width: 45px; object-fit: cover; margin-right: 10px;">
                            <span><strong>${title}</strong></span>
                        `;
                        bookList.appendChild(bookItem);
                    });
            
                    checkoutModal.style.display = 'flex';
                });
            
                closeModalBtn.addEventListener('click', function() {
                    checkoutModal.style.display = 'none';
                    resetModal();
                });
            
                placeOrderBtn.addEventListener('click', function() {
                    const selectedBooks = Array.from(document.querySelectorAll('input[name="selected_books[]"]:checked')).map(cb => cb.value);
                    
                    if (selectedBooks.length === 0) {
                        alert('Please select at least one book.');
                        return;
                    }
            
                    placeOrderBtn.style.display = 'none';
                    loading.style.display = 'block';
            
                    fetch('{{ route("cart.process") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            selected_books: selectedBooks
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        loading.style.display = 'none';
                        
                        if (data.success) {
                            successMessage.style.display = 'block';
                        } else {
                            alert('Error: ' + (data.message || 'Something went wrong'));
                            placeOrderBtn.style.display = 'block';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        loading.style.display = 'none';
                        placeOrderBtn.style.display = 'block';
                        alert('An error occurred while processing your request.');
                    });
                });
            
                okBtn.addEventListener('click', function() {
                    window.location.reload();
                });
            
                document.querySelectorAll('.remove-btn').forEach(function(btn) {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        if (confirm('Are you sure you want to remove this book from your cart?')) {
                            const url = this.getAttribute('data-url');
                            window.location.href = url;
                        }
                    });
                });
            
                function resetModal() {
                    placeOrderBtn.style.display = 'block';
                    loading.style.display = 'none';
                    successMessage.style.display = 'none';
                    bookList.innerHTML = '';
                }
            
                window.addEventListener('click', function(event) {
                    if (event.target === checkoutModal) {
                        checkoutModal.style.display = 'none';
                        resetModal();
                    }
                });
            });
         </script>
      </main>
   </div>
</div>
@endsection