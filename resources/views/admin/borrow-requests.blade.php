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
      <!-- partial:../../partials/_navbar.html -->
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
                        <p class="card-description">Manage book borrowing requests from users</p>
                        @if (session('success'))
                        <div class="alert alert-success">
                           {{ session('success') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                           <table class="table table-striped">
                              <thead>
                                 <tr>
                                    <th>Order Code</th>
                                    <th>User</th>
                                    <th>Books</th>
                                    <th>Request Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @forelse($orders as $order)
                                 <tr id="order-row-{{ $order->id }}">
                                    <td>
                                       <strong>{{ $order->order_code }}</strong>
                                       @if($order->borrowed_at)
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
                                       <button class="btn btn-sm btn-info generate-qr" 
                                          data-order='@json(["order_code" => $order->order_code, "book_ids" => $order->book_ids])'
                                          title="Generate QR Code">
                                       <i class="fas fa-qrcode"></i> QR
                                       </button>
                                       <button class="btn btn-sm btn-secondary mark-returned" 
                                          data-id="{{ $order->id }}"
                                          title="Mark as Returned">
                                       <i class="fas fa-undo"></i> Returned
                                       </button>
                                       @else
                                       <span class="text-muted">No actions available</span>
                                       @endif
                                       <div class="qr-container-{{ $order->id }}" style="margin-top: 10px;"></div>
                                    </td>
                                 </tr>
                                 @empty
                                 <tr>
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
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode-generator/1.4.4/qrcode.min.js"></script>
                        <script>
                           // Fixed JavaScript section for borrow-requests.blade.php
                           // Replace the existing <script> section with this improved version
                           
                           document.addEventListener('DOMContentLoaded', function() {
                           let currentOrderId = null;
                           
                           // Accept Order
                           document.querySelectorAll('.accept-order').forEach(button => {
                           button.addEventListener('click', function() {
                           const orderId = this.getAttribute('data-id');
                           
                           if (confirm('Are you sure you want to accept this order?')) {
                           // Disable button to prevent double-clicking
                           this.disabled = true;
                           this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                           
                           fetch(`/admin/orders/${orderId}/accept`, {
                           method: 'POST',
                           headers: {
                           'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                           'Content-Type': 'application/json',
                           'Accept': 'application/json'
                           }
                           })
                           .then(response => {
                           if (!response.ok) {
                           throw new Error(`HTTP error! status: ${response.status}`);
                           }
                           return response.json();
                           })
                           .then(data => {
                           if (data.success) {
                           alert(data.message);
                           location.reload();
                           } else {
                           alert('Error: ' + data.message);
                           // Re-enable button on error
                           this.disabled = false;
                           this.innerHTML = '<i class="fas fa-check"></i> Accept';
                           }
                           })
                           .catch(error => {
                           console.error('Error:', error);
                           alert('An error occurred while processing the request: ' + error.message);
                           // Re-enable button on error
                           this.disabled = false;
                           this.innerHTML = '<i class="fas fa-check"></i> Accept';
                           });
                           }
                           });
                           });
                           
                           // Reject Order
                           document.querySelectorAll('.reject-order').forEach(button => {
                           button.addEventListener('click', function() {
                           currentOrderId = this.getAttribute('data-id');
                           // Clear previous reason
                           document.getElementById('rejectReason').value = '';
                           $('#rejectModal').modal('show');
                           });
                           });
                           
                           document.getElementById('confirmReject').addEventListener('click', function() {
                           if (!currentOrderId) {
                           alert('No order selected');
                           return;
                           }
                           
                           const reason = document.getElementById('rejectReason').value.trim();
                           
                           // Optional: Require a reason
                           if (!reason) {
                           alert('Please provide a reason for rejection');
                           return;
                           }
                           
                           // Disable button to prevent double-clicking
                           this.disabled = true;
                           this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                           
                           fetch(`/admin/orders/${currentOrderId}/reject`, {
                           method: 'POST',
                           headers: {
                           'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                           'Content-Type': 'application/json',
                           'Accept': 'application/json'
                           },
                           body: JSON.stringify({ 
                           reason: reason || 'Rejected by admin'
                           })
                           })
                           .then(response => {
                           console.log('Response status:', response.status);
                           console.log('Response headers:', response.headers);
                           
                           if (!response.ok) {
                           throw new Error(`HTTP error! status: ${response.status}`);
                           }
                           return response.json();
                           })
                           .then(data => {
                           console.log('Response data:', data);
                           
                           if (data.success) {
                           alert(data.message);
                           $('#rejectModal').modal('hide');
                           location.reload();
                           } else {
                           alert('Error: ' + data.message);
                           // Re-enable button on error
                           this.disabled = false;
                           this.innerHTML = 'Reject Order';
                           }
                           })
                           .catch(error => {
                           console.error('Error:', error);
                           alert('An error occurred while processing the request: ' + error.message);
                           // Re-enable button on error
                           this.disabled = false;
                           this.innerHTML = 'Reject Order';
                           });
                           });
                           
                           // Mark as Returned
                           document.querySelectorAll('.mark-returned').forEach(button => {
                           button.addEventListener('click', function() {
                           const orderId = this.getAttribute('data-id');
                           
                           if (confirm('Are you sure you want to mark this order as returned?')) {
                           // Disable button to prevent double-clicking
                           this.disabled = true;
                           this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                           
                           fetch(`/admin/orders/${orderId}/returned`, {
                           method: 'POST',
                           headers: {
                           'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                           'Content-Type': 'application/json',
                           'Accept': 'application/json'
                           }
                           })
                           .then(response => {
                           if (!response.ok) {
                           throw new Error(`HTTP error! status: ${response.status}`);
                           }
                           return response.json();
                           })
                           .then(data => {
                           if (data.success) {
                           alert(data.message);
                           location.reload();
                           } else {
                           alert('Error: ' + data.message);
                           // Re-enable button on error
                           this.disabled = false;
                           this.innerHTML = '<i class="fas fa-undo"></i> Returned';
                           }
                           })
                           .catch(error => {
                           console.error('Error:', error);
                           alert('An error occurred while processing the request: ' + error.message);
                           // Re-enable button on error
                           this.disabled = false;
                           this.innerHTML = '<i class="fas fa-undo"></i> Returned';
                           });
                           }
                           });
                           });
                           
                           // Generate QR Code
                           document.querySelectorAll('.generate-qr').forEach(button => {
                           button.addEventListener('click', function() {
                           const orderData = JSON.parse(this.getAttribute('data-order'));
                           const orderId = this.closest('tr').id.split('-')[2];
                           
                           // Create QR code
                           const qr = qrcode(0, 'M');
                           qr.addData(JSON.stringify(orderData));
                           qr.make();
                           
                           const qrContainer = document.querySelector(`.qr-container-${orderId}`);
                           qrContainer.innerHTML = `
                           <div style="text-align: center; margin-top: 10px;">
                           ${qr.createImgTag(4)}
                           <br>
                           <small class="text-muted">QR Code for Order</small>
                           </div>
                           `;
                           });
                           });
                           });
                        </script>
                     </div>
                  </div>
               </div>
               <!-- content-wrapper ends -->
               <!-- partial:../../partials/_footer.html -->
               @include('admin.footer')
               <!-- partial -->
            </div>
            <!-- main-panel ends -->
         </div>
         <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="../../../admin/assets/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="../../../admin/assets/js/off-canvas.js"></script>
      <script src="../../../admin/assets/js/hoverable-collapse.js"></script>
      <script src="../../../admin/assets/js/misc.js"></script>
      <script src="../../../admin/assets/js/settings.js"></script>
      <script src="../../../admin/assets/js/todolist.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page -->
      <!-- End custom js for this page -->
   </body>
</html>