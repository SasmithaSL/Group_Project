<!DOCTYPE html>
<html lang="zxx">
   <head>        
      @include('user.head')
      @include('user.header')
   <body>
      <!-- Start: Page Banner -->
      <section class="page-banner news-listing-banner services-banner">
         <div class="container">
            <div class="banner-header">
               <h2>News Listing and Events</h2>
               <span class="underline center"></span>
               <!-- <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p> -->
            </div>
         </div>
      </section>
      <!-- End: Page Banner -->
      <!-- Start: Products Section -->
      <div id="content" class="site-content">
      <div id="primary" class="content-area">
      <main id="main" class="site-main">
         <div class="main-news-list">
            <div class="container">
               <!-- Start: Search Section -->
               <section class="search-filters">
                  <div class="filter-box">
                     <h3>Find the library events  </h3>
                     <form action="http://libraria.demo.presstigers.com/news-events-detail.html" method="get">
                        <div class="col-md-10">
                           <div class="row">
                              <div class="col-md-4 col-sm-6">
                                 <div class="form-group">
                                    <label class="sr-only" for="keywords">Search by Keyword</label>
                                    <input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text">
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-3">
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
                              <div class="col-md-4 col-sm-3">
                                 <div class="form-group">
                                    <select name="locations" id="locations" class="form-control">
                                       <option>All Locations</option>
                                       <option>Location 01</option>
                                       <option>Location 02</option>
                                       <option>Location 03</option>
                                       <option>Location 04</option>
                                       <option>Location 05</option>
                                    </select>
                                 </div>
                              </div>
                              
                              <div class="col-md-4 col-sm-3">
                                
                              </div>
                             
                           </div>
                        </div>
                         
                        <div class="col-md-2">
                           <div class="row">
                              <div class="col-md-12 col-sm-6">
                               
                              </div>
                              <div class="col-md-12 col-sm-6">
                                 <div class="form-group">
                                    <input class="form-control" type="submit" value="Find Event">
                                    
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                     </form>
                     
                  </div>
                  
                  <div class="clear"></div>
               </section>
               <!-- End: Search Section -->
               <div class="row">
                
                  <div class="col-md-9 col-md-push-3 news-events-list-view">
                     <div class="news-list-box">
                        <div class="single-news-list">
                         
                         
                         
                           @foreach($events as $index => $event)
                           <div class="event-card {{ $index % 2 == 0 ? 'image-left' : 'image-right' }}">
                              @if($index % 2 == 0)
                              <!-- Left image layout -->
                              <div class="event-image">
                                 <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" style="width: 385px; height: 444px; object-fit: cover;">
                              </div>
                              <div class="event-content">
                                 <div class="event-category">
                                    <span class="arrow-right"></span>
                                    <span class="event-label">EVENT</span>
                                 </div>
                                 <div class="event-meta">
                                    <ul>
                                       <li>
                                          <i class="fa fa-calendar"></i>
                                          {{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}
                                       </li>
                                       <li>
                                          <i class="fa fa-clock-o"></i>
                                          {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - 
                                          {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                                       </li>
                                       <li>
                                          <i class="fa fa-map-marker"></i>
                                          {{ $event->venue }}
                                       </li>
                                    </ul>
                                 </div>
                                 <h2 class="event-title">{{ $event->topic }}</h2>
                                 <div class="event-description">
                                    <p>{{ $event->description }}</p>
                                 </div>
                                 <div class="event-action">
                                    <a href="#" class="read-more-btn">READ MORE</a>
                                 </div>
                              </div>
                              @else
                              <!-- Right image layout -->
                              <div class="event-content">
                                 <div class="event-category">
                                    <span class="arrow-right"></span>
                                    <span class="event-label">EVENT</span>
                                 </div>
                                 <div class="event-meta">
                                    <ul>
                                       <li>
                                          <i class="fa fa-calendar"></i>
                                          {{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}
                                       </li>
                                       <li>
                                          <i class="fa fa-clock-o"></i>
                                          {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - 
                                          {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                                       </li>
                                       <li>
                                          <i class="fa fa-map-marker"></i>
                                          {{ $event->venue }}
                                       </li>
                                    </ul>
                                 </div>
                                 <h2 class="event-title">{{ $event->topic }}</h2>
                                 <div class="event-description">
                                    <p>{{ $event->description }}</p>
                                 </div>
                                 <div class="event-action">
                                    <a href="#" class="read-more-btn">READ MORE</a>
                                 </div>
                              </div>
                              <div class="event-image">
                                 <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" style="width: 385px; height: 444px; object-fit: cover;">
                              </div>
                              @endif
                           </div>
                           @endforeach

                           
                           <nav class="navigation pagination text-center">
                              <h2 class="screen-reader-text">Posts navigation</h2>
                              <div class="nav-links">
                                 <a class="prev page-numbers" href="#."><i class="fa fa-long-arrow-left"></i> Previous</a>
                                 <span class="page-numbers current">1</span>
                                 <a class="page-numbers" href="#.">2</a>
                                 <a class="page-numbers" href="#.">3</a>
                                 <a class="next page-numbers" href="#.">Next <i class="fa fa-long-arrow-right"></i></a>
                              </div>
                           </nav>
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