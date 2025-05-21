<!DOCTYPE html>
<html lang="en">
@include('admin.head')

  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="../../index"><img src="../../../admin/assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="../../index"><img src="../../../admin/assets/images/logo-mini.svg" alt="logo" /></a>
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
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
            <div class="row">


            <!-- Add event -->
              <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Add Event</h4>
                      <p class="card-description"> Horizontal form layout </p>
                      <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Topic</label>
                          <div class="col-sm-9">
                            <input type="text" name="topic" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                            <textarea name="description" class="form-control" rows="4" required></textarea>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date</label>
                          <div class="col-sm-9">
                            <input type="date" name="event_date" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Start Time</label>
                          <div class="col-sm-9">
                            <input type="time" name="start_time" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">End Time</label>
                          <div class="col-sm-9">
                            <input type="time" name="end_time" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Venue</label>
                          <div class="col-sm-9">
                            <input type="text" name="venue" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Image</label>
                          <div class="col-sm-9">
                            <input type="file" name="image" class="form-control">
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Add Event</button>
                        <button type="reset" class="btn btn-dark">Cancel</button>
                      </form>
                    </div>
                  </div>
              </div>

            
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
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