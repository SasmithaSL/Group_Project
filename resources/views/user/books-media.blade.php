<!DOCTYPE html>
<html lang="zxx">
    

@include('user.head')
        
 @include('user.header')

    <body>

        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Books & Media Listing</h2>
                    <span class="underline center"></span>
                    <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
                </div>
                
            </div>
        </section>
        <!-- End: Page Banner -->

        <!-- Start: Products Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="books-media-gird">
                        <div class="container">
                            <div class="row">
                                <!-- Start: Search Section -->
                                <section class="search-filters">
                                    <div class="container">
                                        <div class="filter-box">
                                            <h3>What are you looking for at the library?</h3>
                                            <form action="http://libraria.demo.presstigers.com/index.html" method="get">
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="keywords">Search by Keyword</label>
                                                        <input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <select name="catalog" id="catalog" class="form-control">
                                                            <option>Search the Catalog</option>
                                                            <option>Catalog 01</option>
                                                            <option>Catalog 02</option>
                                                            <option>Catalog 03</option>
                                                            <option>Catalog 04</option>
                                                            <option>Catalog 05</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <select name="category" id="category" class="form-control">
                                                            <option>All Categories</option>
                                                            <option>Category 01</option>
                                                            <option>Category 02</option>
                                                            <option>Category 03</option>
                                                            <option>Category 04</option>
                                                            <option>Category 05</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="submit" value="Search">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                                <!-- End: Search Section -->
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-md-push-3">
                                    <div class="filter-options margin-list">
                                        <div class="row">                                            
                                            <div class="col-md-4 col-sm-4">
                                                <select name="orderby">
                                                    <option selected="selected">Default sorting</option>
                                                    <option>Sort by popularity</option>
                                                    <option>Sort by rating</option>
                                                    <option>Sort by newness</option>
                                                    <option>Sort by price</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="filter-result">Showing items 1 to 9 of 19 total</div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="books-gird">
                                        <ul>
                                            @foreach($books as $book)
                                            <li>
                                                <figure>
                                                    <img src="{{ $book->image ? asset('storage/' . $book->image) : '/assets/images/books-media/gird-view/book-media-grid-12.jpg' }}" alt="Book" class="book-image">
                                                    <figcaption>
                                                        <p><strong>{{ $book->title }}</strong></p>
                                                        <p><strong>Author:</strong> {{ $book->author }}</p>
                                                    </figcaption>
                                                </figure>
                                                <div class="book-list-icon red-icon"></div>
                                                <div class="single-book-box">
                                                    <div class="post-detail">
                                                        <div class="books-social-sharing">
                                                            <ul>
                                                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                                                <li><a href="#" target="_blank"><i class="fa fa-rss"></i></a></li>
                                                                <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="optional-links">
                                                            <ul>
                                                                <li><a href="#" data-toggle="blog-tags" data-placement="top" title="Add TO CART"><i class="fa fa-shopping-cart"></i></a></li>
                                                                <li><a href="#" data-toggle="blog-tags" data-placement="top" title="Like"><i class="fa fa-heart"></i></a></li>
                                                                <li><a href="#" data-toggle="blog-tags" data-placement="top" title="Mail"><i class="fa fa-envelope"></i></a></li>
                                                                <li><a href="#" data-toggle="blog-tags" data-placement="top" title="Search"><i class="fa fa-search"></i></a></li>
                                                                <li><a href="#" data-toggle="blog-tags" data-placement="top" title="Print"><i class="fa fa-print"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <header class="entry-header">
                                                            <h3 class="entry-title"><a href="#">{{ $book->title }}</a></h3>
                                                            <ul>
                                                                <li><strong>Author:</strong> {{ $book->author }}</li>
                                                                <li><strong>ISBN:</strong> {{ $book->isbn }}</li>
                                                            </ul>
                                                        </header>
                                                        <div class="entry-content">
                                                            <p>{{ Str::limit($book->description, 100) }}</p>
                                                        </div>
                                                        <footer class="entry-footer">
                                                            <a class="btn btn-primary" href="#">Read More</a>
                                                        </footer>
                                                    </div>
                                                </div>                                                                                                
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                <!-- Custom Pagination -->
                                <nav class="navigation pagination text-center">
                                    <h2 class="screen-reader-text">Posts navigation</h2>
                                    <div class="nav-links">
                                        {{-- Previous Link --}}
                                        @if($books->onFirstPage())
                                            <span class="prev page-numbers disabled"><i class="fa fa-long-arrow-left"></i> Previous</span>
                                        @else
                                            <a class="prev page-numbers" href="{{ $books->previousPageUrl() }}"><i class="fa fa-long-arrow-left"></i> Previous</a>
                                        @endif

                                        {{-- Page Links --}}
                                        @foreach($books->getUrlRange(1, $books->lastPage()) as $page => $url)
                                            @if ($page == $books->currentPage())
                                                <span class="page-numbers current">{{ $page }}</span>
                                            @else
                                                <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                                            @endif
                                        @endforeach

                                        {{-- Next Link --}}
                                        @if($books->hasMorePages())
                                            <a class="next page-numbers" href="{{ $books->nextPageUrl() }}">Next <i class="fa fa-long-arrow-right"></i></a>
                                        @else
                                            <span class="next page-numbers disabled">Next <i class="fa fa-long-arrow-right"></i></span>
                                        @endif
                                    </div>
                                </nav>

                                    
                                </div>
                                <div class="col-md-3 col-md-pull-9">
                                    <aside id="secondary" class="sidebar widget-area" data-accordion-group>
                                        <div class="widget widget_related_search open" data-accordion>
                                            <h4 class="widget-title" data-control>Related Searches</h4>
                                            <div data-content>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Subject</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            <li><a href="#">Love stories <span>(18)</span></a></li>
                                                            <li><a href="#">Texas <span>(04)</span></a></li>
                                                            <li><a href="#">Rich people <span>(03)</span></a></li>
                                                            <li><a href="#">Humorous stories <span>(02)</span></a></li>
                                                            <li><a href="#">Widows <span>(02)</span></a></li>
                                                            <li><a href="#">Women <span>(11)</span></a></li>
                                                            <li><a href="#">Babysitters <span>(25)</span></a></li>
                                                            <li><a href="#">Law firms <span>(09)</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Authors</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            <li><a href="#">Love stories <span>(18)</span></a></li>
                                                            <li><a href="#">Texas <span>(04)</span></a></li>
                                                            <li><a href="#">Rich people <span>(03)</span></a></li>
                                                            <li><a href="#">Humorous stories <span>(02)</span></a></li>
                                                            <li><a href="#">Widows <span>(02)</span></a></li>
                                                            <li><a href="#">Women <span>(11)</span></a></li>
                                                            <li><a href="#">Babysitters <span>(25)</span></a></li>
                                                            <li><a href="#">Law firms <span>(09)</span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Series</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            <li><a href="#">Love stories <span>(18)</span></a></li>
                                                            <li><a href="#">Texas <span>(04)</span></a></li>
                                                            <li><a href="#">Rich people <span>(03)</span></a></li>
                                                            <li><a href="#">Humorous stories <span>(02)</span></a></li>
                                                            <li><a href="#">Widows <span>(02)</span></a></li>
                                                            <li><a href="#">Women <span>(11)</span></a></li>
                                                            <li><a href="#">Babysitters <span>(25)</span></a></li>
                                                            <li><a href="#">Law firms <span>(09)</span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Other Searches</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            <li><a href="#">Love stories <span>(18)</span></a></li>
                                                            <li><a href="#">Texas <span>(04)</span></a></li>
                                                            <li><a href="#">Rich people <span>(03)</span></a></li>
                                                            <li><a href="#">Humorous stories <span>(02)</span></a></li>
                                                            <li><a href="#">Widows <span>(02)</span></a></li>
                                                            <li><a href="#">Women <span>(11)</span></a></li>
                                                            <li><a href="#">Babysitters <span>(25)</span></a></li>
                                                            <li><a href="#">Law firms <span>(09)</span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="widget widget_narrow_search" data-accordion>
                                            <h4 class="widget-title" data-control>Narrow your search</h4>
                                            <div data-content>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Type of Material</h5>
                                                    <div class="widget_material" data-content>
                                                        <form action="#">
                                                            <label><input type="checkbox" name="material" value="books"> Books</label>
                                                            <label><input type="checkbox" name="material" value="electronic" checked> Electronic Resources</label>
                                                            <label><input type="checkbox" name="material" value="ebooks"> ebooks</label>
                                                            <label><input type="checkbox" name="material" value="soundrecording" checked> Sound Recording</label>
                                                            <label><input type="checkbox" name="material" value="largeprint"> Large Print</label>
                                                            <label><input type="checkbox" name="material" value="audioebooks" checked> Audio eBooks</label>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Publishing Date </h5>
                                                    <div class="widget widget_material" data-content>
                                                        <form action="#">
                                                            <label><input type="checkbox" name="material" value="books"> Books</label>
                                                            <label><input type="checkbox" name="material" value="electronic" checked> Electronic Resources</label>
                                                            <label><input type="checkbox" name="material" value="ebooks"> ebooks</label>
                                                            <label><input type="checkbox" name="material" value="soundrecording" checked> Sound Recording</label>
                                                            <label><input type="checkbox" name="material" value="largeprint"> Large Print</label>
                                                            <label><input type="checkbox" name="material" value="audioebooks" checked> Audio eBooks</label>
                                                        </form>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Popularity </h5>
                                                    <div class="widget widget_material" data-content>
                                                        <form action="#">
                                                            <label><input type="checkbox" name="material" value="books"> Books</label>
                                                            <label><input type="checkbox" name="material" value="electronic" checked> Electronic Resources</label>
                                                            <label><input type="checkbox" name="material" value="ebooks"> ebooks</label>
                                                            <label><input type="checkbox" name="material" value="soundrecording" checked> Sound Recording</label>
                                                            <label><input type="checkbox" name="material" value="largeprint"> Large Print</label>
                                                            <label><input type="checkbox" name="material" value="audioebooks" checked> Audio eBooks</label>
                                                        </form>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>Language </h5>
                                                    <div class="widget widget_material" data-content>
                                                        <form action="#">
                                                            <label><input type="checkbox" name="material" value="books"> Books</label>
                                                            <label><input type="checkbox" name="material" value="electronic" checked> Electronic Resources</label>
                                                            <label><input type="checkbox" name="material" value="ebooks"> ebooks</label>
                                                            <label><input type="checkbox" name="material" value="soundrecording" checked> Sound Recording</label>
                                                            <label><input type="checkbox" name="material" value="largeprint"> Large Print</label>
                                                            <label><input type="checkbox" name="material" value="audioebooks" checked> Audio eBooks</label>
                                                        </form>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="widget widget_recent_releases">
                                            <h4 class="widget-title">New Releases</h4>
                                            <ul>
                                                <li><a href="#">Books</a></li>
                                                <li><a href="#">eBooks</a></li>
                                                <li><a href="#">DVDS</a></li>
                                                <li><a href="#">Magazines</a></li>
                                                <li><a href="#">Audio</a></li>
                                                <li><a href="#">eAudio</a></li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="widget widget_recent_entries">
                                            <h4 class="widget-title">On-Order Items</h4>
                                            <ul>
                                                <li>
                                                    <figure>
                                                        <img src="/assets/images/order-item-01.jpg" alt="product" />
                                                    </figure>
                                                    <a href="#">The Sonic Boom</a>
                                                    <span class="price"><strong>Author:</strong> F. Scott Fitzgerald</span>
                                                    <span><strong>ISBN:</strong> 978158157</span>
                                                    <div class="rating">
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="/assets/images/order-item-02.jpg" alt="product" />
                                                    </figure>
                                                    <a href="#">The Sonic Boom</a>
                                                    <span class="price"><strong>Author:</strong> F. Scott Fitzgerald</span>
                                                    <span><strong>ISBN:</strong> 978158157</span>
                                                    <div class="rating">
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="/assets/images/order-item-03.jpg" alt="product" />
                                                    </figure>
                                                    <a href="#">The Sonic Boom</a>
                                                    <span class="price"><strong>Author:</strong> F. Scott Fitzgerald</span>
                                                    <span><strong>ISBN:</strong> 978158157</span>
                                                    <div class="rating">
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                        </div>

                        <!-- Start: Staff Picks -->
                        <section class="team staff-picks">
                            <div class="container">
                                <div class="center-content">
                                    <h2 class="section-title">Staff Picks</h2>
                                    <span class="underline center"></span>
                                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                                <div class="team-list">
                                    <div class="team-member">
                                        <figure>
                                            <img src="/assets/images/books-media/staff-pick/staff-picks-01.jpg" alt="Staff Pick" />
                                        </figure>
                                        <div class="content-block">
                                            <div class="member-info">
                                                <div class="member-thumb">
                                                    <img src="/assets/images/books-media/staff-pick/gail.jpg" alt="Katherine">
                                                </div>
                                                <div class="member-content">
                                                    <span class="designation">Downtown & Business</span>
                                                    <h4>The Collector</h4>
                                                    <ul class="social">
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-linkedin"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-facebook-f"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-skype"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here...</p>
                                                <a class="btn btn-primary" href="#">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="team-member">
                                        <figure>
                                            <img src="/assets/images/books-media/staff-pick/staff-picks-02.jpg" alt="Staff Pick" />
                                        </figure>
                                        <div class="content-block">
                                            <div class="member-info">
                                                <div class="member-thumb">
                                                    <img src="/assets/images/books-media/staff-pick/katherine.jpg" alt="Katherine">
                                                </div>
                                                <div class="member-content">
                                                    <span class="designation">Katherine, West End</span>
                                                    <h4>Mongolia</h4>
                                                    <ul class="social">
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-linkedin"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-facebook-f"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-skype"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here...</p>
                                                <a class="btn btn-primary" href="#">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="team-member">
                                        <figure>
                                            <img src="/assets/images/books-media/staff-pick/staff-picks-03.jpg" alt="Staff Pick" />
                                        </figure>
                                        <div class="content-block">
                                            <div class="member-info">
                                                <div class="member-thumb">
                                                    <img src="/assets/images/books-media/staff-pick/chris.jpg" alt="Katherine">
                                                </div>
                                                <div class="member-content">
                                                    <span class="designation">Chris, East Liberty</span>
                                                    <h4>The Revolution</h4>
                                                    <ul class="social">
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-linkedin"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-facebook-f"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-skype"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here...</p>
                                                <a class="btn btn-primary" href="#">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End: Staff Picks -->
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Products Section -->

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