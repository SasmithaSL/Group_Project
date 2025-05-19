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
                                                        <form method="post" action="http://libraria.demo.presstigers.com/cart-page.html">

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
                                                                <tr class="cart_item">
                                                                    <td data-title="cbox" class="product-cbox">
                                                                        <span>
                                                                            <input type="checkbox" id="cbox3" value="first_checkbox">
                                                                        </span>
                                                                    </td>
                                                                    <td data-title="Product" class="product-name">
                                                                        <span class="product-thumbnail">
                                                                            <a href="#"><img src="/assets/images/cart/cart-product-1.jpg" alt="cart-product-1"></a>
                                                                        </span>
                                                                        <span class="product-detail">
                                                                            <a href="#" class="book-title"><strong>The Sonic Boom</strong></a>
                                                                            <span><strong>Author:</strong> Joel Beckerma</span>
                                                                            <span><strong>ISBN:</strong> 78451269</span>
                                                                        </span>
                                                                    </td>
                                                                    <td data-title="action" class="product-action">
                                                                        <div class="dropdown">
                                                                            <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown" id="dropdownMenu3">Request to Borrow <b class="caret"></b></a>
                                                                            <ul class="dropdown-menu" id="dropdownOptions3">
                                                                                <li><a href="#" data-value="Request to Borrow">Request to Borrow</a></li>
                                                                                <li><a href="#" data-value="Remove from Cart">Remove from Cart</a></li>
                                                                                <li><a href="#" data-value="Place a Hold">Place a Hold</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-pridsfce">
                                                                        <button class="btn btn-primary">Proceed</button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="cart_item">
                                                                    <td>
                                                                        <span data-title="cbox" class="product-cbox">
                                                                            <input type="checkbox" id="cbox1" value="first_checkbox">
                                                                        </span>
                                                                    </td>
                                                                    <td data-title="Product" class="product-name">
                                                                        <span class="product-thumbnail">
                                                                            <a href="#"><img src="/assets/images/cart/cart-product-2.jpg" alt="cart-product-2"></a>
                                                                        </span>
                                                                        <span class="product-detail">
                                                                            <a href="#" class="book-title"><strong>The Great Gatsby</strong></a>
                                                                            <span><strong>Author:</strong> F. Scott Fitzgerald</span>
                                                                            <span><strong>ISBN:</strong> 78452597</span>
                                                                        </span>
                                                                    </td>
                                                                    <td data-title="action" class="product-action">
                                                                        <div class="dropdown">
                                                                            <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown" id="dropdownMenu1">Request to Borrow <b class="caret"></b></a>
                                                                            <ul class="dropdown-menu" id="dropdownOptions1">
                                                                                <li><a href="#" data-value="Request to Borrow">Request to Borrow</a></li>
                                                                                <li><a href="#" data-value="Remove from Cart">Remove from Cart</a></li>
                                                                                <li><a href="#" data-value="Place a Hold">Place a Hold</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-price">
                                                                        <button class="btn btn-primary">Proceed</button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="cart_item">
                                                                    <td>
                                                                        <span data-title="cbox" class="product-cbox">
                                                                            <input type="checkbox" id="cbox2" value="first_checkbox">
                                                                        </span>
                                                                    </td>
                                                                    <td data-title="Product" class="product-name">
                                                                        <span class="product-thumbnail">
                                                                            <a href="#"><img src="/assets/images/cart/cart-product-3.jpg" alt="cart-product-3"></a>
                                                                        </span>
                                                                        <span class="product-detail">
                                                                            <a href="#" class="book-title"><strong>The missing piece</strong></a>
                                                                            <span><strong>Author:</strong>Kevin egan</span>
                                                                            <span><strong>ISBN:</strong> 44979747</span>
                                                                        </span>
                                                                    </td>
                                                                    <td data-title="action" class="product-action">
                                                                        <div class="dropdown">
                                                                            <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown" id="dropdownMenu2">Request to Borrow <b class="caret"></b></a>
                                                                            <ul class="dropdown-menu" id="dropdownOptions2">
                                                                                <li><a href="#" data-value="Request to Borrow">Request to Borrow</a></li>
                                                                                <li><a href="#" data-value="Remove from Cart">Remove from Cart</a></li>
                                                                                <li><a href="#" data-value="Place a Hold">Place a Hold</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-price">
                                                                        <button class="btn btn-primary">Proceed</button>
                                                                    </td>
                                                                </tr>
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
                                                                
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to handle dropdown selection for each dropdown
    function setupDropdown(dropdownId, optionsId) {
        const dropdown = document.getElementById(dropdownId);
        const options = document.querySelectorAll(`#${optionsId} a`);

        options.forEach(option => {
            option.addEventListener('click', function(e) {
                e.preventDefault();
                const selectedText = this.getAttribute('data-value');
                
                // Remove existing caret if it exists
                const existingCaret = dropdown.querySelector('.caret');
                if (existingCaret) {
                    existingCaret.remove();
                }

                // Update the button text
                dropdown.childNodes[0].nodeValue = selectedText + ' ';

                // Add a single caret
                const caret = document.createElement('b');
                caret.className = 'caret';
                dropdown.appendChild(caret);
            });
        });
    }

    // Setup each dropdown
    setupDropdown('dropdownMenu3', 'dropdownOptions3');
    setupDropdown('dropdownMenu1', 'dropdownOptions1');
    setupDropdown('dropdownMenu2', 'dropdownOptions2');
});
</script>

                                                            <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                // Function to handle dropdown selection for each dropdown
                                                                function setupDropdown(dropdownId, optionsId) {
                                                                    const dropdown = document.getElementById(dropdownId);
                                                                    const options = document.querySelectorAll(`#${optionsId} a`);

                                                                    options.forEach(option => {
                                                                        option.addEventListener('click', function(e) {
                                                                            e.preventDefault();
                                                                            const selectedText = this.getAttribute('data-value');
                                                                            
                                                                            // Remove existing caret if it exists
                                                                            const existingCaret = dropdown.querySelector('.caret');
                                                                            if (existingCaret) {
                                                                                existingCaret.remove();
                                                                            }

                                                                            // Update the button text
                                                                            dropdown.childNodes[0].nodeValue = selectedText + ' ';

                                                                            // Add a single caret
                                                                            const caret = document.createElement('b');
                                                                            caret.className = 'caret';
                                                                            dropdown.appendChild(caret);
                                                                        });
                                                                    });
                                                                }

                                                                // Setup each dropdown
                                                                setupDropdown('dropdownMenu3', 'dropdownOptions3');
                                                                setupDropdown('dropdownMenu1', 'dropdownOptions1');
                                                                setupDropdown('dropdownMenu2', 'dropdownOptions2');
                                                            });
                                                            </script> 
        <!-- End: Cart Section -->
        
        <!-- Start: Social Network -->
        <section class="social-network section-padding">
          
        </section>
        <!-- End: Social Network -->
                
        @include('user.footer')
        
    </body>


</html>