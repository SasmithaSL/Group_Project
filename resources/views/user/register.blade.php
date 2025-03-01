<!DOCTYPE html>
<html lang="zxx">

@include('user.head')
        
@include('user.header')

    <body>
        
        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Signin</h2>
                    <span class="underline center"></span>
                    <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
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
                                        
                                                    <div class="company-detail new-account bg-light margin-right">
                                                        <div class="new-user-head">
                                                            <h2>Create New Account</h2>
                                                            <span class="underline left"></span>
                                                        </div>

                                                        <form class="login" method="post">
                                                            <p class="form-row form-row-first input-required">
                                                                <label>
                                                                    <h5>Full Name</h5>
                                                                    <span class="first-letter"></span>  
                                                                </label>
                                                                <input type="text" id="username1" name="username" class="input-text">
                                                            </p>

                                                            <p class="form-row form-row-first input-required">
                                                                <label>
                                                                    <h5>Password </h5>
                                                                    <span class="first-letter"></span>  
                                                                </label>
                                                                <input type="text" id="username1" name="username" class="input-text">
                                                            </p>

                                                            <p class="form-row form-row-first input-required">
                                                                <label>
                                                                    <h5>Re type Password </h5>
                                                                    <span class="first-letter"></span>  
                                                                </label>
                                                                <input type="text" id="username1" name="username" class="input-text">
                                                            </p>

                                                            <p class="form-row form-row-first input-required">
                                                                <label>
                                                                    <h5>Email Address </h5>
                                                                    <span class="first-letter"></span>  
                                                                </label>
                                                                <input type="text" id="username1" name="username" class="input-text">
                                                            </p>

                                                            <p class="form-row form-row-first input-required">
                                                                <label>
                                                                    <h5>Phone Number</h5>
                                                                    <span class="first-letter"></span>  
                                                                </label>
                                                                <input type="text" id="username1" name="username" class="input-text">
                                                            </p>
   
   

                                                            <div class="clear"></div>
                                                            <input type="submit" value="Signup" name="signup" class="button btn btn-default">
                                                            <div class="clear"></div>
                                                        </form> 
                                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Cart Section -->
        
        <!-- Start: Social Network -->
        <section class="social-network section-padding">
            <div class="container">
                <div class="center-content">
                    <h2 class="section-title">Follow Us</h2>
                    <span class="underline center"></span>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <ul>
                    <li>
                        <a class="facebook" href="#" target="_blank">
                            <span>
                                <i class="fa fa-facebook-f"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="#" target="_blank">
                            <span>
                                <i class="fa fa-twitter"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="google" href="#" target="_blank">
                            <span>
                                <i class="fa fa-google-plus"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="rss" href="#" target="_blank">
                            <span>
                                <i class="fa fa-rss"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="linkedin" href="#" target="_blank">
                            <span>
                                <i class="fa fa-linkedin"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="youtube" href="#" target="_blank">
                            <span>
                                <i class="fa fa-youtube"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <!-- End: Social Network -->
        

    </body>
    @include('user.footer')



</html>
