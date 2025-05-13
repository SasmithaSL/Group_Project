<!DOCTYPE html>
<html lang="zxx">
@include('user.head')
        
 @include('user.header')
    <body>
        
        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Checkout</h2>
                    <span class="underline center"></span>
                </div>
               
            </div>
        </section>
        <!-- End: Page Banner -->
        <!-- Start: Cart Checkout Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="checkout-main">
                        <div class="container">
                        <div class="center-content">
                                        <h2 class="section-title">Checkout Page</h2>
                                        <span class="underline center"></span>
                                        <!-- <p class="lead">The standard chunk of Lorem Ipsum used since</p> -->
                                        <div class="clearfix"></div>
                                    </div>
                            <div class="row">
                                <div class="cart-head">
                                   
                                    <div class="col-xs-12 col-sm-6 library-info">
                                       
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-12">
                                    <article class="page type-page status-publish hentry">
                                        <div class="entry-content">
                                            <div class="woocommerce">
                                                <form action="http://libraria.demo.presstigers.com/checkout.html" class="checkout woocommerce-checkout" method="post" name="checkout">

                                                    

                                                <table class="table table-bordered shop_table cart">
                                                    <thead>
                                                    <tr>
                                                        <th>Book Title</th>
                                                        <th>Author</th>
                                                        <th>ISBN</th>
                                                        <th>Borrowed Date</th>
                                                        <th>Return Date</th>
                                                        <th>Quantity</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>The Great Gatsby</td>
                                                        <td>F. Scott Fitzgerald</td>
                                                        <td>9780743273565</td>
                                                        <td>2025-04-27</td>
                                                        <td>2025-05-27</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <td>1984</td>
                                                        <td>George Orwell</td>
                                                        <td>9780451524935</td>
                                                        <td>2025-04-27</td>
                                                        <td>2025-05-27</td>
                                                        <td>1</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                <a href="#" class="btn btn-primary" style=color:#fff>Confirm Checkout</a>
                                                </div>
                                                                                                    
                                                </form>
                                            </div>



                                            
                                        </div><!-- .entry-content -->
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Cart Checkout Section -->

        <!-- Start: Social Network -->
        <section class="social-network section-padding">
          
        </section>
        <!-- End: Social Network -->
        
        @include('user.footer')
        
    </body>


</html>
