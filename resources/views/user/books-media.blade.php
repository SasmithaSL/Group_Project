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
                                                    <input class="form-control" placeholder="Search by Keyword"
                                                        id="keywords" name="keywords" type="text">
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
                                                <img src="data:image/jpeg;base64,{{ $book->image }}"
                                                    alt="{{ $book->title }}" />
                                                <figcaption>
                                                    <p><strong>{{ $book->title }}</strong></p>
                                                    <p><strong>Author:</strong> {{ $book->author }}</p>
                                                </figcaption>
                                            </figure>
                                            <div class="single-book-box">
                                                <div class="post-detail">
                                                    <div class="books-social-sharing">
                                                    </div>
                                                    <div class="optional-links">
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
                                                        <a class="btn btn-primary" href="#">Add to cart</a>
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
                                        <span class="prev page-numbers disabled"><i class="fa fa-long-arrow-left"></i>
                                            Previous</span>
                                        @else
                                        <a class="prev page-numbers" href="{{ $books->previousPageUrl() }}"><i
                                                class="fa fa-long-arrow-left"></i> Previous</a>
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
                                        <a class="next page-numbers" href="{{ $books->nextPageUrl() }}">Next <i
                                                class="fa fa-long-arrow-right"></i></a>
                                        @else
                                        <span class="next page-numbers disabled">Next <i
                                                class="fa fa-long-arrow-right"></i></span>
                                        @endif
                                    </div>
                                </nav>


                            </div>
                            <div class="col-md-3 col-md-pull-9">
                                <aside id="secondary" class="sidebar widget-area" data-accordion-group>
                                 
                                    <div class="widget widget_recent_releases">
                                        <h4 class="widget-title">Narrow your search</h4>
                                        <ul>
                                            <li><a href="#">Books</a></li>
                                            <li><a href="#">Magazines</a></li>
                                            <li><a href="#">Kids & Teens</a></li>
                                            <li><a href="#">Adults</a></li>
                                            <!-- <li><a href="#">Audio</a></li>
                                                <li><a href="#">eAudio</a></li> -->
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                 
                                               
                                                <div class="clearfix"></div>
                                            </div> 
                                </aside>
                            </div>
                        </div>
                    </div>

                 
                </div>
            </main>
        </div>
    </div>
    <!-- End: Products Section -->

    <!-- Start: Social Network -->
    <section class="social-network section-padding">
      
    </section>
    <!-- End: Social Network -->

    @include('user.footer')






</body>


</html>