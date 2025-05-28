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
               <div class="content-wrapper">
                  <div class="card">
                     <div class="card-body">
                        <h4 class="card-title mb-3">Manage Users</h4>
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
   </body>
</html>