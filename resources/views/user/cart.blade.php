<!DOCTYPE html>
<html lang="zxx">
@include('user.head')
        
 @include('user.header')

    <body>
        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Cart Page</h2>
                    <span class="underline center"></span>
                </div>
               
            </div>
        </section>
        <!-- End: Page Banner -->
        <!-- Start: Cart Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="cart-main">
                        <div class="container">
                        <div class="center-content">
                                        <h2 class="section-title">Review your selected books </h2>
                                        <span class="underline center"></span>
                                        <!-- <p class="lead">The standard chunk of Lorem Ipsum used since</p> -->
                                        <div class="clearfix"></div>
                                    </div>
                            <div class="row">
                               
                                <div class="col-md-12">
                                    <div class="page type-page status-publish hentry">
                                        <div class="entry-content">
                                            <div class="woocommerce table-tabs" id="responsiveTabs">
                                                <ul class="nav nav-tabs">
                                                </ul>
                                                <div class="tab-content">

                                                    <div id="sectionA" class="tab-pane fade in active">
                                                        <form method="post" action="#">

                                                            <table class="table table-bordered shop_table cart">
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-name"> </th>
                                                                    <th class="product-name">Title</th>
                                                                    <th class="product-quantity">Action</th>
                                                                    <th class="product-price"></th>
                                                                </tr>
                                                            </thead>
                                                          <tbody>
                                                            @foreach($cartItems as $item)
                                                            <tr class="cart_item">
                                                                <td class="product-cbox">
                                                                    <span><input type="checkbox" name="selected_books[]" value="{{ $item->id }}"></span>
                                                                </td>
                                                                <td class="product-name">
                                                                    <span class="product-thumbnail">
                                                                <img src="data:image/jpeg;base64,{{ $item->book->image }}" alt="{{ $item->book->title }}" style="height: 111px; width: 100px; object-fit: cover;">
                                                                    </span>
                                                                    <span class="product-detail">
                                                                        <strong>{{ $item->book->title }}</strong><br>
                                                                        <span><strong>Author:</strong> {{ $item->book->author }}</span><br>
                                                                        <span><strong>ISBN:</strong> {{ $item->book->isbn }}</span>
                                                                    </span>
                                                                </td>
                                                                <td class="product-action">
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown">Action <b class="caret"></b></a>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#">Request to Borrow</a></li>
                                                                            <li><a href="#">Remove from Cart</a></li>
                                                                            <li><a href="#">Place a Hold</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                                <td class="product-pridsfce">
                                                                    <button class="btn btn-primary">Proceed</button>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            </tbody>

                                                        </table>
                                                        </form>
                                                    </div>

                                                    
                                                    <div id="sectionB" class="tab-pane fade in">
                                                        <h5>Lorem Ipsum Dolor</h5>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                                    </div>
                                                    <div id="sectionC" class="tab-pane fade in">
                                                        <h5>Lorem Ipsum Dolor</h5>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                                    </div>
                                                    <div id="sectionD" class="tab-pane fade in">
                                                        <h5>Lorem Ipsum Dolor</h5>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                                    </div>                                                    
                                                    <div id="sectionE" class="tab-pane fade in">
                                                        <h5>Lorem Ipsum Dolor</h5>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                                    </div>                                                    
                                                    <div id="sectionF" class="tab-pane fade in">
                                                        <h5>Lorem Ipsum Dolor</h5>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .entry-content -->
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
          
        </section>
        <!-- End: Social Network -->
                
        @include('user.footer')
        
    </body>


</html>