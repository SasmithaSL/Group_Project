<!DOCTYPE html>
<html lang="zxx">
   @include('user.head')
   @include('user.header')
   <body>
      <!-- Start: Page Banner -->
      <section class="page-banner services-banner">
         <div class="container">
            <div class="banner-header">
            </div>
         </div>
      </section>
      <!-- End: Page Banner -->
      <!-- Start: Cart Section -->
      <div id="content" class="site-content">
      <div id="primary" class="content-area">
      <main id="main" class="site-main">
         <div class="signin-main">
            <div class="container">
               <div class="woocommerce">
                  <div class="woocommerce-login">
                     <div class="company-info signin-register">
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
                        <div class="login-form-container">
                           <div class="login-form-header">
                              <h2>Sign in</h2>
                           </div>
                           <form class="login" action="/user-login" method="post">
                              @csrf
                              <p class="form-row input-required">
                                 <label>
                              <h5 class="theading">Email</h5>
                              </label>
                              <input type="email" name="email" class="input-text" required>
                              </p>
                              <p class="form-row input-required">
                                 <label>
                              <h5 class=theading>Password</h5>
                              </label>
                              <input type="password" name="password" class="input-text" required>
                              </p>
                              <div class="clear"></div>
                              <input type="submit" value="Signup" name="signup" class="button btn btn-default" style=font-size:17px>
                              <div class="clear"></div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
      </main>
      </div>
      </div>
      @include('user.footer')
   </body>
</html>