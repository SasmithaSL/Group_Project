<!DOCTYPE html>
<html lang="en">
@include('admin.head')
<body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                @if (\Session::has('success'))
                                        <div class="alert alert-success">
                                            <strong>{{ \Session::get('success') }}</strong>
                                        </div>
                                    @endif
                                    @if (\Session::has('delete'))
                                        <div class="alert alert-danger">
                                            <strong>{{ \Session::get('delete') }}</strong>
                                        </div>
                                    @endif
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                 @endif   

                 <form action="{{ route('admin.login-form') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label> Email *</label>
                  <input type="text" class="form-control p_input" name="email" required>
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input type="password" class="form-control p_input" name="password" required autocomplete="off">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input"> Remember me 
                    </label>
                  </div>
                  <a href="#" class="forgot-pass">Forgot password</a>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                </div>
              </form>



              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
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
  </body>
</html>