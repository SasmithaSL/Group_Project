<!DOCTYPE html>
<html lang="en">
@include('admin.head')

  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <!-- <a class="sidebar-brand brand-logo" href="../../index"><img src="../../../admin/assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="../../index"><img src="../../../admin/assets/images/logo-mini.svg" alt="logo" /></a> -->
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
            <div class="page-header">
              <h3 class="page-title"> Form elements </h3>
          
            </div>
            <div class="row">
                  
                <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add a new book</h4>

                <!-- Success and Error Messages -->
                @if (session('success'))
                    <div class="alert form-control text-white" style="background-color: #28a745; border: none;" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif

                @if (session('delete'))
                    <div class="alert form-control text-white" style="background-color: #dc3545; border: none;" role="alert">
                        <strong>{{ session('delete') }}</strong>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert form-control" style="background-color: #f8d7da; color: #721c24; border: none;" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="forms-sample" method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Book Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title" required>
                    </div>

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Enter Author name" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Book Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter book description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Enter ISBN" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Book Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                        <button type="submit" class="btn btn-primary mr-2">Add Book</button>
                    </form>
                </div>
            </div>
        </div>

            <!-- Auto-hide alerts after 4 seconds -->
            <script>
                setTimeout(function() {
                    document.querySelectorAll('.alert').forEach(alert => {
                        alert.style.transition = 'opacity 0.5s';
                        alert.style.opacity = '0';
                        setTimeout(() => alert.remove(), 400);
                    });
                }, 4000);
            </script>

             
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <!-- <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span> -->
            </div>
          </footer>
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
    <script src="../../../admin/assets/vendors/select2/select2.min.js"></script>
    <script src="../../../admin/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../../admin/assets/js/off-canvas.js"></script>
    <script src="../../../admin/assets/js/hoverable-collapse.js"></script>
    <script src="../../../admin/assets/js/misc.js"></script>
    <script src="../../../admin/assets/js/settings.js"></script>
    <script src="../../../admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../../admin/assets/js/file-upload.js"></script>
    <script src="../../../admin/assets/js/typeahead.js"></script>
    <script src="../../../admin/assets/js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>