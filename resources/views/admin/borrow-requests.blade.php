<!DOCTYPE html>
<html lang="en">
   @include('admin.head')
   <body>
      <div class="container-scroller">
         <!-- partial:../../partials/_sidebar.html -->
         <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
               <a class="sidebar-brand brand-logo" href="../../index.html"><img src="../../../admin/assets/images/logo.png" alt="logo" /></a>
               <a class="sidebar-brand brand-logo-mini" href="../../index.html"><img src="../../../admin/assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            @include('admin.sidebar')
         </nav>
         <!-- partial -->
         <div class="container-fluid page-body-wrapper">
            @include('admin.navbar')
            <!-- partial -->
            <div class="main-panel">
               <div class="content-wrapper">
                  <div class="row">
                     <div class = "col-md-12 grid-margin stretch-card">
                        <!-- resources\views\admin\borrow-requests.blade.php -->
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title">Borrow Requests Management</h4>
                              @if (session('success'))
                              <div class="alert alert-success">
                                 {{ session('success') }}
                              </div>
                              @endif
                              <!-- Search Section -->
                              <div class="row mb-3">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="orderSearch">Search by Order Number:</label>
                                       <div class="input-group">
                                          <input type="text" class="form-control" id="orderSearch" 
                                             placeholder="Enter order number..." autocomplete="off">
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>&nbsp;</label>
                                       <div>
                                          <small class="text-muted" id="searchResults"></small>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                       <tr>
                                          <th>Order Number</th>
                                          <th>User</th>
                                          <th>Books</th>
                                          <th>Request Date</th>
                                          <th>Status</th>
                                          <th>Actions</th>
                                       </tr>
                                    </thead>
                                    <tbody id="ordersTableBody">
                                       @forelse($orders as $order)
                                       <tr id="order-row-{{ $order->id }}" class="order-row" data-order-number="{{ strtolower($order->order_code) }}">
                                          <td>
                                             <strong>{{ $order->order_code }}</strong>
                                             @if($order->issued_at)
                                             <br><small class="text-muted">
                                             Issued: {{ $order->issued_at->format('Y-m-d') }}
                                             </small>
                                             @elseif($order->borrowed_at)
                                             <br><small class="text-muted">
                                             Borrowed: {{ $order->borrowed_at->format('Y-m-d') }}
                                             </small>
                                             @endif
                                             @if($order->due_at)
                                             <br><small class="text-muted">
                                             Due: {{ $order->due_at->format('Y-m-d') }}
                                             </small>
                                             @endif
                                          </td>
                                          <td>
                                             <strong>{{ $order->user->name }}</strong><br>
                                             <small class="text-muted">{{ $order->user->email }}</small>
                                          </td>
                                          <td>
                                             <div style="max-height: 150px; overflow-y: auto;">
                                                @foreach($order->books as $book)
                                                <div class="d-flex align-items-center mb-2">
                                                   <img src="data:image/jpeg;base64,{{ $book->image }}" 
                                                      alt="{{ $book->title }}"
                                                      style="height: 40px; width: 30px; object-fit: cover; margin-right: 10px;">
                                                   <div>
                                                      <small><strong>{{ $book->title }}</strong></small><br>
                                                      <small class="text-muted">{{ $book->author }}</small>
                                                   </div>
                                                </div>
                                                @endforeach
                                             </div>
                                          </td>
                                          <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                          <td>
                                             @switch($order->status)
                                             @case('pending')
                                             <label class="badge badge-warning">Pending</label>
                                             @break
                                             @case('approved')
                                             <label class="badge badge-success">Approved</label>
                                             @break
                                             @case('issued')
                                             <label class="badge badge-primary">Issued</label>
                                             @break
                                             @case('rejected')
                                             <label class="badge badge-danger">Rejected</label>
                                             @break
                                             @case('returned')
                                             <label class="badge badge-info">Returned</label>
                                             @break
                                             @case('cancelled')
                                             <label class="badge badge-secondary">Cancelled</label>
                                             @break
                                             @default
                                             <label class="badge badge-light">{{ ucfirst($order->status) }}</label>
                                             @endswitch
                                             @if($order->notes)
                                             <br><small class="text-muted">Note: {{ $order->notes }}</small>
                                             @endif
                                          </td>
                                          <td>
                                             @if($order->status === 'pending')
                                             <button class="btn btn-sm btn-success accept-order" 
                                                data-id="{{ $order->id }}"
                                                title="Accept Order">
                                             <i class="fas fa-check"></i> Accept
                                             </button>
                                             <button class="btn btn-sm btn-danger reject-order" 
                                                data-id="{{ $order->id }}"
                                                title="Reject Order">
                                             <i class="fas fa-times"></i> Reject
                                             </button>
                                             @elseif($order->status === 'approved')
                                             <button class="btn btn-sm btn-primary issue-order" 
                                                data-id="{{ $order->id }}"
                                                title="Issue Books">
                                             <i class="fas fa-hand-holding"></i> Issue
                                             </button>
                                             @elseif($order->status === 'issued')
                                             <button class="btn btn-sm btn-secondary mark-returned" 
                                                data-id="{{ $order->id }}"
                                                title="Mark as Returned">
                                             <i class="fas fa-undo"></i> Returned
                                             </button>
                                             @else
                                             <span class="text-muted">No actions available</span>
                                             @endif
                                          </td>
                                       </tr>
                                       @empty
                                       <tr id="no-orders-row">
                                          <td colspan="6" class="text-center">No borrow requests found.</td>
                                       </tr>
                                       @endforelse
                                    </tbody>
                                 </table>
                              </div>
                              <!-- Reject Order Modal -->
                              <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog">
                                 <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title">Reject Order</h5>
                                          <button type="button" class="close" data-dismiss="modal">
                                          <span>&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body">
                                          <form id="rejectForm">
                                             <div class="form-group">
                                                <label for="rejectReason">Reason for rejection:</label>
                                                <textarea class="form-control" id="rejectReason" name="reason" rows="3" 
                                                   placeholder="Enter reason for rejection..."></textarea>
                                             </div>
                                          </form>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <button type="button" class="btn btn-danger" id="confirmReject">Reject Order</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <script>
                                 $(document).ready(function () {
                                    let currentOrderId = null;
                                    let allRows = $('.order-row');
                                 
                                    // Search functionality
                                    $('#orderSearch').on('input', function() {
                                       const searchTerm = $(this).val().toLowerCase().trim();
                                       
                                       if (searchTerm === '') {
                                          // Show all rows
                                          allRows.show();
                                          updateSearchResults('');
                                       } else {
                                          let visibleCount = 0;
                                          
                                          allRows.each(function() {
                                             const orderNumber = $(this).data('order-number');
                                             if (orderNumber.includes(searchTerm)) {
                                                $(this).show();
                                                visibleCount++;
                                             } else {
                                                $(this).hide();
                                             }
                                          });
                                          
                                          updateSearchResults(searchTerm, visibleCount);
                                       }
                                    });
                                    
                                    // Clear search
                                    $('#clearSearch').click(function() {
                                       $('#orderSearch').val('');
                                       allRows.show();
                                       updateSearchResults('');
                                       $('#orderSearch').focus();
                                    });
                                    
                                    // Update search results text
                                    function updateSearchResults(searchTerm, visibleCount = null) {
                                       const resultsElement = $('#searchResults');
                                       
                                       if (searchTerm === '') {
                                          resultsElement.text('');
                                       } else {
                                          const totalCount = allRows.length;
                                          if (visibleCount === 0) {
                                             resultsElement.html('<i class="fas fa-exclamation-triangle text-warning"></i> No orders found matching "' + searchTerm + '"');
                                          } else {
                                             resultsElement.html('<i class="fas fa-search text-info"></i> Found ' + visibleCount + ' of ' + totalCount + ' orders');
                                          }
                                       }
                                    }
                                 
                                    // Accept Order
                                    $('.accept-order').click(function (e) {
                                       e.preventDefault();
                                       
                                       const orderId = $(this).data('id');
                                       const button = $(this);
                                 
                                       if (confirm('Are you sure you want to accept this order?')) {
                                             button.prop('disabled', true);
                                             button.html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                                 
                                             $.ajax({
                                                url: '/admin/orders/' + orderId + '/accept',
                                                method: 'POST',
                                                data: {
                                                   _token: '{{ csrf_token() }}'
                                                },
                                                success: function (response) {
                                                   if (response.success) {
                                                         showPopup('✅ ' + response.message, 'success');
                                                         setTimeout(() => {
                                                            location.reload();
                                                         }, 1500);
                                                   } else {
                                                         showPopup('❌ Error: ' + response.message, 'error');
                                                         button.prop('disabled', false);
                                                         button.html('<i class="fas fa-check"></i> Accept');
                                                   }
                                                },
                                                error: function (xhr) {
                                                   console.error('Error:', xhr);
                                                   showPopup('❌ Failed to accept order.', 'error');
                                                   button.prop('disabled', false);
                                                   button.html('<i class="fas fa-check"></i> Accept');
                                                }
                                             });
                                       }
                                    });
                                 
                                    // Issue Order
                                    $('.issue-order').click(function (e) {
                                       e.preventDefault();
                                       
                                       const orderId = $(this).data('id');
                                       const button = $(this);
                                 
                                       if (confirm('Are you sure you want to issue these books?')) {
                                             button.prop('disabled', true);
                                             button.html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                                 
                                             $.ajax({
                                                url: '/admin/orders/' + orderId + '/issue',
                                                method: 'POST',
                                                data: {
                                                   _token: '{{ csrf_token() }}'
                                                },
                                                success: function (response) {
                                                   if (response.success) {
                                                         showPopup('✅ ' + response.message, 'success');
                                                         setTimeout(() => {
                                                            location.reload();
                                                         }, 1500);
                                                   } else {
                                                         showPopup('❌ Error: ' + response.message, 'error');
                                                         button.prop('disabled', false);
                                                         button.html('<i class="fas fa-hand-holding"></i> Issue');
                                                   }
                                                },
                                                error: function (xhr) {
                                                   console.error('Error:', xhr);
                                                   showPopup('❌ Failed to issue books.', 'error');
                                                   button.prop('disabled', false);
                                                   button.html('<i class="fas fa-hand-holding"></i> Issue');
                                                }
                                             });
                                       }
                                    });
                                 
                                    // Reject Order
                                    $('.reject-order').click(function (e) {
                                       e.preventDefault();
                                       
                                       currentOrderId = $(this).data('id');
                                       $('#rejectReason').val('');
                                       $('#rejectModal').modal('show');
                                    });
                                 
                                    $('#confirmReject').click(function (e) {
                                       e.preventDefault();
                                       
                                       if (!currentOrderId) {
                                             showPopup('❌ No order selected', 'error');
                                             return;
                                       }
                                 
                                       const reason = $('#rejectReason').val().trim();
                                       if (!reason) {
                                             showPopup('❌ Please provide a reason for rejection', 'error');
                                             return;
                                       }
                                 
                                       const button = $(this);
                                       button.prop('disabled', true);
                                       button.html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                                 
                                       $.ajax({
                                             url: '/admin/orders/' + currentOrderId + '/reject',
                                             method: 'POST',
                                             data: {
                                                _token: '{{ csrf_token() }}',
                                                reason: reason
                                             },
                                             success: function (response) {
                                                if (response.success) {
                                                   showPopup('✅ ' + response.message, 'success');
                                                   $('#rejectModal').modal('hide');
                                                   setTimeout(() => {
                                                         location.reload();
                                                   }, 1500);
                                                } else {
                                                   showPopup('❌ Error: ' + response.message, 'error');
                                                   button.prop('disabled', false);
                                                   button.html('Reject Order');
                                                }
                                             },
                                             error: function (xhr) {
                                                console.error('Error:', xhr);
                                                showPopup('❌ Failed to reject order.', 'error');
                                                button.prop('disabled', false);
                                                button.html('Reject Order');
                                             }
                                       });
                                    });
                                 
                                    // Mark as Returned
                                    $('.mark-returned').click(function (e) {
                                       e.preventDefault();
                                       
                                       const orderId = $(this).data('id');
                                       const button = $(this);
                                 
                                       if (confirm('Are you sure you want to mark this order as returned?')) {
                                             button.prop('disabled', true);
                                             button.html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                                 
                                             $.ajax({
                                                url: '/admin/orders/' + orderId + '/returned',
                                                method: 'POST',
                                                data: {
                                                   _token: '{{ csrf_token() }}'
                                                },
                                                success: function (response) {
                                                   if (response.success) {
                                                         showPopup('✅ ' + response.message, 'success');
                                                         setTimeout(() => {
                                                            location.reload();
                                                         }, 1500);
                                                   } else {
                                                         showPopup('❌ Error: ' + response.message, 'error');
                                                         button.prop('disabled', false);
                                                         button.html('<i class="fas fa-undo"></i> Returned');
                                                   }
                                                },
                                                error: function (xhr) {
                                                   console.error('Error:', xhr);
                                                   showPopup('❌ Failed to mark order as returned.', 'error');
                                                   button.prop('disabled', false);
                                                   button.html('<i class="fas fa-undo"></i> Returned');
                                                }
                                             });
                                       }
                                    });
                                 
                                    // Show popup function
                                    function showPopup(message, type) {
                                       const popup = $('<div class="popup"></div>')
                                             .addClass(type === 'success' ? 'success-popup' : 'error-popup')
                                             .text(message);
                                 
                                       $('body').append(popup);
                                 
                                       setTimeout(() => {
                                             popup.fadeOut(500, () => popup.remove());
                                       }, 3000);
                                    }
                                 });
                              </script>
                              <style>
                                 .popup {
                                 position: fixed;
                                 top: 20px;
                                 right: 20px;
                                 padding: 15px 20px;
                                 border-radius: 5px;
                                 color: white;
                                 font-weight: bold;
                                 z-index: 9999;
                                 box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                                 }
                                 .success-popup {
                                 background-color: #28a745;
                                 }
                                 .error-popup {
                                 background-color: #dc3545;
                                 }
                                 /* Search input styling */
                                 #orderSearch {
                                 border-radius: 4px 0 0 4px;
                                 }
                                 #clearSearch {
                                 border-radius: 0 4px 4px 0;
                                 border-left: 0;
                                 }
                                 #clearSearch:hover {
                                 background-color: #e9ecef;
                                 }
                                 /* Highlight matching rows */
                                 .order-row {
                                 transition: background-color 0.2s ease;
                                 }
                              </style>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @include('admin.footer')
            </div>
         </div>
      </div>
   </body>
</html>