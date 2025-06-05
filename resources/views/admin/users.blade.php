<!DOCTYPE html>
<html lang="en">
   @include('admin.head')
   <body>
      <div class="container-scroller">
         <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="index"><img src="/admin/assets/images/logo.png" alt="logo" /></a>
            </div>
            @include('admin.sidebar')
         </nav>
         <div class="container-fluid page-body-wrapper">
            @include('admin.navbar')
            <div class="main-panel">
                  <!-- resources\views\admin\users.blade.php -->

               <div class="content-wrapper">
                 <div class="card">
                        <div class="card-body">
                           <div class="d-flex justify-content-between align-items-center mb-3">
                                 <h4 class="card-title mb-0">Manage Users</h4>
                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                    <i class="fas fa-plus"></i> + Add User
                                 </button>
                           </div>
                           <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                       <tr>
                                             <th>User ID</th>
                                             <th>Client Name</th>
                                             <th>Email</th>
                                             <th>Number</th>
                                             <th>Registered Date</th>
                                             <th>Role</th>
                                             <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($users as $user)
                                       <tr>
                                             <td><span class="pl-2">{{ $user->id }}</span></td>
                                             <td>{{ $user->name }}</td>
                                             <td>{{ $user->email }}</td>
                                             <td>{{ $user->number }}</td>
                                             <td>{{ $user->created_at->format('d M Y') }}</td>
                                             <td>{{ ucfirst($user->role) }}</td>
                                             <td>
                                                <form action="{{ route('admin.users.delete', $user) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                   @csrf
                                                   @method('DELETE')
                                                   <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                             </td>
                                       </tr>
                                       @endforeach
                                       @if($users->isEmpty())
                                       <tr>
                                             <td colspan="7" class="text-center">No users found.</td>
                                       </tr>
                                       @endif
                                    </tbody>
                                 </table>
                           </div>
                        </div>
                     </div>

                    <!-- Add User Modal -->
                  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                  <div class="modal-dialog"> <!-- removed modal-lg -->
                     <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        <div class="modal-body">

                           <div class="mb-3">
                              <label for="name" class="form-label">Full Name</label>
                              <input type="text" name="name" class="form-control" id="name" required>
                           </div>

                           <div class="mb-3">
                              <label for="email" class="form-label">Email Address</label>
                              <input type="email" name="email" class="form-control" id="email" required>
                           </div>

                           <div class="mb-3">
                              <label for="number" class="form-label">Phone Number</label>
                              <input type="number" name="number" class="form-control" id="number" required>
                           </div>

                           <div class="mb-3">
                              <label for="role" class="form-label">Role</label>
                              <select name="role" class="form-control" id="role" required>
                              <option value="">Select Role</option>
                              <option value="user">User</option>
                              <option value="admin">Admin</option>
                              </select>
                           </div>

                           <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" name="password" class="form-control" id="password" required>
                           </div>

                           <div class="mb-3">
                              <label for="password_confirmation" class="form-label">Re-type Password</label>
                              <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                           </div>

                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                           <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                        </form>
                     </div>
                  </div>
                  </div>

               </div>
            </div>
            @include('admin.footer')
         </div>
      </div>
      </div>
      <script src="/admin/assets/vendors/js/vendor.bundle.base.js"></script>
      <script src="/admin/assets/vendors/chart.js/Chart.min.js"></script>
      <script src="/admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
      <script src="/admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
      <script src="/admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <script src="/admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
      <script src="/admin/assets/js/off-canvas.js"></script>
      <script src="/admin/assets/js/hoverable-collapse.js"></script>
      <script src="/admin/assets/js/misc.js"></script>
      <script src="/admin/assets/js/settings.js"></script>
      <script src="/admin/assets/js/todolist.js"></script>
      <script src="/admin/assets/js/dashboard.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

   </body>
</html>