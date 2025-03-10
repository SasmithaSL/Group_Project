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
                    <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
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
                            <div class="row">
                                <div class="cart-head">
                                    <div class="col-xs-12 col-sm-6 account-option">
                                        <strong>Scott Fitzgerald</strong>
                                        <ul>
                                            <li><a href="#">Edit Account</a></li>
                                            <li class="divider">|</li>
                                            <li><a href="#">Edit Pin </a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 library-info">
                                        <ul>
                                            <li>
                                                <strong>Home Library:</strong>
                                                Stephen A. Schwarzman Building
                                            </li>
                                            <li>
                                                <strong>Email:</strong>
                                                <a href="mailto:scottfitzgerald@gmail.com">scottfitzgerald@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-12">
                                    <article class="page type-page status-publish hentry">
                                        <div class="entry-content">
                                            <div class="woocommerce">
                                                <form action="http://libraria.demo.presstigers.com/checkout.html" class="checkout woocommerce-checkout" method="post" name="checkout">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <h2>Contact Information</h2>
                                                            <span class="underline left"></span>
                                                            <div class="woocommerce-info">
                                                                <div class="col-sm-7">
                                                                    <p class="input-required">
                                                                        <label>
                                                                            <span class="first-letter">Email Address</span>  
                                                                            <span class="second-letter">*</span>
                                                                        </label>
                                                                        <input type="text" value="" class="input-text">
                                                                    </p>
                                                                    <p class="input-required">
                                                                        <label>
                                                                            <span class="first-letter">Password</span>  
                                                                            <span class="second-letter">*</span>
                                                                        </label>
                                                                        <input type="password" value="" class="input-text">
                                                                    </p>
                                                                    <input type="submit" class="btn btn-default" name="Login" value="Login">
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <h3>Create New Account</h3>
                                                                    <div class="radio">
                                                                        <input id="register" type="radio" value="register" name="register">
                                                                        <label for="register">Register and Checkout</label>
                                                                        <h3>Checkout as Guest</h3>
                                                                        <input id="checkout" type="radio" value="checkout" name="register">
                                                                        <label for="checkout">Checkout without registration</label>
                                                                    </div>
                                                                    <input type="submit" class="btn btn-default" name="continue" value="Continue">
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h2>Your order</h2>
                                                            <span class="underline left"></span>
                                                            <div class="woocommerce-checkout-review-order" id="order_review">
                                                                <table class="shop_table woocommerce-checkout-review-order-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="product-name">Product</th>
                                                                            <th class="product-total">Total</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="cart_item">
                                                                            <td class="product-name">
                                                                                <span class="woocommerce-product-amount">The Great Gatsby</span>
                                                                            </td>
                                                                            <td class="product-total">
                                                                                <span class="woocommerce-Price-amount amount">$10.00</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="cart_item">
                                                                            <td class="product-name">
                                                                                <span class="woocommerce-product-amount">The Great Gatsby</span>
                                                                            </td>
                                                                            <td class="product-total">
                                                                                <span class="woocommerce-Price-amount amount">$10.00</span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr class="cart-subtotal">
                                                                            <td>Cart Sub Total</td>
                                                                            <td>$20.00</td>
                                                                        </tr>
                                                                        <tr class="cart-shipping">
                                                                            <td>Fine</td>
                                                                            <td>$05.00</td>
                                                                        </tr>
                                                                        <tr class="cart-shipping">
                                                                            <td>Shipping</td>
                                                                            <td><strong class="shipping-amount">Free</strong></td>
                                                                        </tr>
                                                                        <tr class="order-total">
                                                                            <th>Order Totals</th>
                                                                            <th>$947.96</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div id="customer_details">
                                                            <div class="col-xs-12 col-sm-6">
                                                                <div class="woocommerce-billing-fields">
                                                                    <h2>Billing Address</h2>
                                                                    <span class="underline left"></span>
                                                                    <div class="row">
                                                                        <div class="billing-address-box">
                                                                            <div class="col-xs-12 col-sm-6">
                                                                                <p id="billing_first_name_field" class="form-row form-row form-row-first">
                                                                                    <input type="text" value="" autocomplete="given-name" placeholder="First Name" id="billing_first_name" name="billing_first_name" class="input-text">
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-6">
                                                                                <p id="billing_last_name_field" class="form-row form-row form-row-last validate-required">                                                                        
                                                                                    <input type="text" value="" autocomplete="family-name" placeholder="Last Name" id="billing_last_name" name="billing_last_name" class="input-text">
                                                                                </p>
                                                                            </div>
                                                                            <div class="clear"></div>
                                                                            <div class="col-xs-12 col-sm-12">
                                                                                <p id="billing_company_field" class="form-row form-row form-row-wide">
                                                                                    <input type="text" value="" autocomplete="organization" placeholder="Company Name" id="billing_company" name="billing_company" class="input-text ">
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-12">
                                                                                <p id="billing_address_1_field" class="form-row form-row form-row-wide address-field validate-required">
                                                                                    <input type="text" value="" placeholder="Address" name="billing_address_1" class="input-text">
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-6">
                                                                                <p id="billing_city_field" class="form-row form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                                                                                    <input type="text" value="" placeholder="Town / City" name="billing_city" class="input-text">
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-6">
                                                                                <p id="billing_state_field" class="form-row form-row form-row-first address-field validate-state validate-required" data-o_class="form-row form-row form-row-first address-field validate-required validate-state">
                                                                                    <input type="text" name="billing_state" placeholder="State / County" value="" class="input-text ">
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-6">
                                                                                <p id="billing_postcode_field" class="form-row form-row form-row-last address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode">
                                                                                    <input type="text" value="" placeholder="Postcode / ZIP" id="billing_postcode" name="billing_postcode" class="input-text ">
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-6">
                                                                                <p id="billing_phone_field" class="form-row form-row form-row-last validate-required validate-phone">
                                                                                    <input type="tel" value="" autocomplete="tel" placeholder="Phone" id="billing_phone" name="billing_phone" class="input-text ">
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-12">
                                                                                <div class="radio">
                                                                                    <input id="bill-address" type="radio" value="bill-address" name="bill-address">
                                                                                    <label for="bill-address">Ship Items To The Above Billing Address</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-6">
                                                                <div class="woocommerce-checkout-payment" id="payment">
                                                                    <h2>Payment Method</h2>
                                                                    <span class="underline left"></span>
                                                                    <div class="form-row place-order">
                                                                        <div class="radio">
                                                                            <input id="ship-address" type="radio" value="ship-address" name="ship-address">
                                                                            <label for="ship-address"><strong>Direct Bank Transfer</strong>
                                                                                Make your payment directly into our bank account. Please use your Order ID as the payment refercene. Your order wont be shipped until the funds have cleard in our account.
                                                                            </label>
                                                                            <input id="cash-delivery" type="radio" value="cash-delivery" name="ship-address">
                                                                            <label for="cash-delivery"><strong>Cash On Delivery</strong></label>
                                                                            <input id="paypal" type="radio" value="paypal" name="ship-address">
                                                                            <label for="paypal"><strong>Paypal</strong>
                                                                                <span><a href="#"><img src="/assets/images/cart/payment-discover.jpg" alt=""></a></span>
                                                                                <span><a href="#"><img src="/assets/images/cart/payment-american-express.jpg" alt=""></a></span>
                                                                                <span><a href="#"><img src="/assets/images/cart/payment-paypal.jpg" alt=""></a></span>
                                                                                <span><a href="#"><img src="/assets/images/cart/payment-mastercard.jpg" alt=""></a></span>
                                                                                <span><a href="#"><img src="/assets/images/cart/payment-visa.jpg" alt=""></a></span>
                                                                            </label>
                                                                        </div>
                                                                        <input type="submit" data-value="Place order" value="Place order" id="place_order" name="woocommerce_checkout_place_order" class="button alt btn btn-default">	
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>	
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
        
        @include('user.footer')
        
    </body>


</html>
