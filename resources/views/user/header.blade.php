<!-- Start: Header Section -->
<header id="header-v1" class="navbar-wrapper">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="navbar-header">
                                    <div class="navbar-brand">
                                        <h1>
                                            <a href="{{ url('/') }}">
                                                <img src="{{ asset('assets/images/libraria-logo-v1.png') }}" alt="Logo">
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <!-- Header Topbar -->
                                <div class="header-topbar hidden-sm hidden-xs">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="topbar-info">
                                                <a href="tel:+61-3-8376-6284"><i class="fa fa-phone"></i>+119</a>
                                                <span>/</span>
                                                <a href="mailto:support@libraria.com"><i class="fa fa-envelope"></i>support@libraria.com</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                        <div class="topbar-links">
                                        @if(Auth::guard()->check())  
                                            <a href="#"><i class="fa fa-user"></i> {{ Auth::guard()->user()->name }}</a>
                                            
                                            <form action="{{ route('user-logout') }}" method="POST" style="display: inline;">
                                                @csrf
                                                 <span>|</span>

                                                <a href="#" onclick="this.closest('form').submit(); return false;" class="text-red-600 hover:text-red-800">
                                                    <i class="fa fa-sign-out"></i> Log out
                                                </a>
                                            </form>
                                        @else
                                            <a href="login"><i class="fa fa-lock"></i> Login</a>
                                            <span>|</span>
                                            <a href="register"><i class="fa fa-sign-out"></i> Register</a>

                                        @endif


                                        <div class="header-cart dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                            </a>
                                            <div class="dropdown-menu cart-dropdown">
                                                <ul>
                                                    <li class="clearfix">
                                                        <img src="{{ asset('assets/images/header-cart-image-01.jpg') }}" alt="cart item">
                                                        <div class="item-info">
                                                            <div class="name"><a href="#">The Great Gatsby</a></div>
                                                            <div class="author"><strong>Author:</strong> F. Scott Fitzgerald</div>
                                                            <div class="price">1 X $10.00</div>
                                                        </div>
                                                        <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>
                                                    </li>
                                                    <li class="clearfix">
                                                        <img src="{{ asset('assets/images/header-cart-image-02.jpg') }}" alt="cart item">
                                                        <div class="item-info">
                                                            <div class="name"><a href="#">The Great Gatsby</a></div>
                                                            <div class="author"><strong>Author:</strong> F. Scott Fitzgerald</div>
                                                            <div class="price">1 X $10.00</div>
                                                        </div>
                                                        <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>
                                                    </li>
                                                    <li class="clearfix">
                                                        <img src="{{ asset('assets/images/header-cart-image-03.jpg') }}" alt="cart item">
                                                        <div class="item-info">
                                                            <div class="name"><a href="#">The Great Gatsby</a></div>
                                                            <div class="author"><strong>Author:</strong> F. Scott Fitzgerald</div>
                                                            <div class="price">1 X $10.00</div>
                                                        </div>
                                                        <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>
                                                    </li>
                                                </ul>
                                                <div class="cart-total">
                                                    <div class="title">SubTotal</div>
                                                    <div class="price">$30.00</div>
                                                </div>
                                                <div class="cart-buttons">
                                                    <a href="cart.html" class="btn btn-dark-gray">View Cart</a>
                                                    <a href="checkout.html" class="btn btn-primary">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-collapse hidden-sm hidden-xs">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown active">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="/">Home</a>
                                            
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle"  onclick="window.location.href='{{ route('books-media') }}'" style="cursor: pointer;">Books &amp; Media
                                            </a>
                                        </li>
                                        <li class="dropdown">   
                                            <a data-toggle="dropdown"   onclick="window.location.href='{{ route('news-events') }}'" style="cursor: pointer;" >News &amp; Events</a>
                                        </li>
                                        <li><a href="cart">Cart</a></li>
                                        <li><a href="checkout">Checkout</a></li>
                                        <li><a href="services">Services</a></li>
                                        <li><a href="contact">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu hidden-lg hidden-md">
                            <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                            <div id="mobile-menu">
                                <ul>
                                    <li class="mobile-title">
                                        <h4>Navigation</h4>
                                        <a href="#" class="close"></a>
                                    </li>
                                    <li>
                                        <a href="index-2.html">Home</a>
                                       
                                    </li>
                                    <li>
                                        <a href="books-media-list-view.html">Books &amp; Media</a>
                                        <ul>
                                            <li><a href="books-media-list-view.html">Books &amp; Media List View</a></li>
                                            <li><a href="books-media-gird-view-v1.html">Books &amp; Media Grid View V1</a></li>
                                            <li><a href="books-media-gird-view-v2.html">Books &amp; Media Grid View V2</a></li>
                                            <li><a href="books-media-detail-v1.html">Books &amp; Media Detail V1</a></li>
                                            <li><a href="books-media-detail-v2.html">Books &amp; Media Detail V2</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="news-events-list-view.html">News &amp; Events</a>
                                        <ul>
                                            <li><a href="news-events-list-view.html">News &amp; Events List View</a></li>
                                            <li><a href="news-events-detail.html">News &amp; Events Detail</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Pages</a>
                                        <ul>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="login">login</a></li>
                                            <li><a href="register">register</a></li>
                                            <li><a href="404.html">404/Error</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="blog.html">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Blog Grid View</a></li>
                                            <li><a href="blog-detail.html">Blog Detail</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- End: Header Section -->
        