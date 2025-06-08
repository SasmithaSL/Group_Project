<!DOCTYPE html>
<html lang="en">
   <head>        
      @include('user.head')
      @include('user.header')
   <body>
      <section class="page-banner news-listing-banner services-banner">
         <div class="container">
            <div class="banner-header">
               <h2>News Listing and Events</h2>
               <span class="underline center"></span>
            </div>
         </div>
      </section>
      <div id="content" class="site-content">
      <div id="primary" class="content-area">
      <main id="main" class="site-main">
         <div class="main-news-list">
            <div class="container">
               <section class="search-filters">
                  <div class="container">
                     <div class="filter-box">
                        <h3 style="text-align: center !important;">Find the library events</h3>
                        <form method="GET" action="{{ route('events.index') }}" style="display: flex !important; justify-content: center !important; align-items: center !important; gap: 10px !important;">
                           <input class="form-control"
                              placeholder="Search by topic, description, or venue"
                              id="keywords"
                              name="keywords"
                              type="text"
                              value="{{ request('keywords') }}"
                              style="width: 400px !important; display: inline-block !important;">
                           <input class="btn btn-primary" type="submit" value="Search" style="display: inline-block !important;">
                           @if(request('keywords'))
                           <a href="{{ route('events.index') }}" class="btn btn-secondary" style="display: inline-block !important;">Clear</a>
                           @endif
                        </form>
                     </div>
                  </div>
                  <div class="clear"></div>
               </section>
               <div class="row">
                  <div class="col-md-9 col-md-push-3 news-events-list-view">
                     <div class="news-list-box">
                        <div class="single-news-list">
                           @foreach($events as $index => $event)
                           <div class="event-card {{ $index % 2 == 0 ? 'image-left' : 'image-right' }}">
                              @if($index % 2 == 0)
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
                           @if($events->hasPages())
                           <nav class="navigation pagination text-center">
                              <h2 class="screen-reader-text">Posts navigation</h2>
                              <div class="nav-links" style="margin-bottom: 35px;">
                                 {{-- Previous Page Link --}}
                                 @if($events->onFirstPage())
                                 <span class="prev page-numbers disabled">
                                 <i class="fa fa-long-arrow-left"></i> Previous
                                 </span>
                                 @else
                                 <a class="prev page-numbers" href="{{ $events->previousPageUrl() }}">
                                 <i class="fa fa-long-arrow-left"></i> Previous
                                 </a>
                                 @endif
                                 @foreach($events->getUrlRange(1, $events->lastPage()) as $page => $url)
                                 @if ($page == $events->currentPage())
                                 <span class="page-numbers current">{{ $page }}</span>
                                 @else
                                 <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                                 @endif
                                 @endforeach
                                 @if($events->hasMorePages())
                                 <a class="next page-numbers" href="{{ $events->nextPageUrl() }}">
                                 Next <i class="fa fa-long-arrow-right"></i>
                                 </a>
                                 @else
                                 <span class="next page-numbers disabled">
                                 Next <i class="fa fa-long-arrow-right"></i>
                                 </span>
                                 @endif
                              </div>
                           </nav>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
      </main>
      <style>
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
      </style>
      </div>
      </div>
      @include('user.footer')
   </body>
</html>