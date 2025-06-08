<!DOCTYPE html>
<html lang="zxx">
   @include('user.head')
   @include('user.header')
   <body>
      <!-- Start: Page Banner -->
      <section class="page-banner services-banner">
         <div class="container">
            <div class="banner-header">
               <h2 style="padding-top: 10px;">Books & Media Listing</h2>
               <span class="underline center"></span>
            </div>
         </div>
      </section>
      <!-- End: Page Banner -->
      <div id="content" class="site-content">
         <div id="primary" class="content-area">
            <main id="main" class="site-main">
               <div class="books-media-gird">
                  <div class="container">
                     <div class="row">
                        <section class="search-filters">
                           <div class="container">
                              <div class="filter-box">
                                 <h3 style="text-align: center !important;">What are you looking for at the library?</h3>
                                 <form method="GET" action="{{ route('books.index') }}" style="display: flex !important; justify-content: center !important; align-items: center !important; gap: 10px !important;">
                                    <input class="form-control"
                                       placeholder="Search by title, author, ISBN, or description"
                                       id="keywords"
                                       name="keywords"
                                       type="text"
                                       value="{{ request('keywords') }}"
                                       style="width: 400px !important; display: inline-block !important;">
                                    <input class="btn btn-primary" type="submit" value="SEARCH" style="display: inline-block !important;">
                                    @if(request('keywords'))
                                    <a href="{{ route('books.index') }}" class="btn btn-secondary" style="display: inline-block !important;">Clear</a>
                                    @endif
                                 </form>
                              </div>
                           </div>
                        </section>
                     </div>
                     <div class="row">
                        <div class="col-md-9 col-md-push-3">
                           @if(session('success'))
                           <div id="success-popup" class="alert alert-success">
                              {{ session('success') }}
                           </div>
                           @endif
                           <div class="books-gird">
                              @if($books->count() > 0)
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
                                             <a class="btn btn-primary" href="{{ route('cart.add', $book->id) }}">Add to cart</a>
                                          </footer>
                                       </div>
                                    </div>
                                 </li>
                                 @endforeach
                              </ul>
                              @else
                              <div class="no-results" style="text-align: center; padding: 40px;">
                                 <h4>No books found</h4>
                                 @if(request('keywords'))
                                 <p>No books match your search criteria for "{{ request('keywords') }}"</p>
                                 <a href="{{ route('books.index') }}" class="btn btn-primary">View All Books</a>
                                 @else
                                 <p>No books are currently available.</p>
                                 @endif
                              </div>
                              @endif
                           </div>
                           @if($books->hasPages())
                           <nav class="navigation pagination text-center">
                              <h2 class="screen-reader-text">Posts navigation</h2>
                              <div class="nav-links" style="margin-bottom: 35px;">
                                 @if($books->onFirstPage())
                                 <span class="prev page-numbers disabled"><i class="fa fa-long-arrow-left"></i>
                                 Previous</span>
                                 @else
                                 <a class="prev page-numbers" href="{{ $books->previousPageUrl() }}"><i
                                    class="fa fa-long-arrow-left"></i> Previous</a>
                                 @endif
                                 @foreach($books->getUrlRange(1, $books->lastPage()) as $page => $url)
                                 @if ($page == $books->currentPage())
                                 <span class="page-numbers current">{{ $page }}</span>
                                 @else
                                 <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                                 @endif
                                 @endforeach
                                 @if($books->hasMorePages())
                                 <a class="next page-numbers" href="{{ $books->nextPageUrl() }}">Next <i
                                    class="fa fa-long-arrow-right"></i></a>
                                 @else
                                 <span class="next page-numbers disabled">Next <i
                                    class="fa fa-long-arrow-right"></i></span>
                                 @endif
                              </div>
                           </nav>
                           @endif
                        </div>
                        </aside>
                     </div>
                  </div>
               </div>
         </div>
         </main>
      </div>
      </div>
      <style>
         .search-filters {
         text-align: center !important;
         }
         .search-filters .container {
         display: flex !important;
         justify-content: center !important;
         }
         .filter-box {
         width: 100% !important;
         max-width: 800px !important;
         }
         .filter-box form {
         display: flex !important;
         justify-content: center !important;
         align-items: center !important;
         gap: 10px !important;
         flex-wrap: wrap !important;
         }
         @media (max-width: 768px) {
         .filter-box form {
         flex-direction: column !important;
         gap: 15px !important;
         }
         .form-control {
         width: 100% !important;
         max-width: 300px !important;
         }
         }
      </style>
      @include('user.footer')
   </body>
</html>