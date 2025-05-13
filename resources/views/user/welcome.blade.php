<!DOCTYPE html>
<html lang="zxx">
    


    
    <body>
    @include('user.head')
        
    @include('user.header')
        <!-- Start: Slider Section -->
        <div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">
            
            <!-- Carousel slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <figure>
                        <img src="{{ asset('assets/images/header-slider/home-v1/header-slide.jpg') }}" alt="Home Slide">
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Explore Knowledge Anytime, Anywhere!</h3>
                            <h2>Unlock a World of Resources</h2>
                                <p>Our library system provides you with access to a vast collection of books, journals, and multimedia available online, whenever and wherever you need it. Whether you're researching, learning, or simply enjoying a good read, we make it easy to connect with the knowledge you seek.</p>                            <div class="slide-buttons hidden-sm hidden-xs">    
                                <a href="#" class="btn btn-primary">Read More</a>
                                <!-- <a href="#" class="btn btn-default">Purchase</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            
         
        </div>
        <!-- End: Slider Section -->
        
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
        
        <!-- Start: Welcome Section -->
        <section class="welcome-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="welcome-wrap">
                            <div class="welcome-text">
                                <h2 class="section-title">Welcome to the BookHaven</h2>
                                <span class="underline left"></span>
                                <p>At BookHaven, we believe that knowledge is the key to growth. Our library system offers easy access to a wide range of resources, from books to journals, multimedia, and research materials all at your fingertips. Whether you're an avid reader, a student, or just curious, we’re here to help you explore new worlds, discover new ideas, and fuel your passion for learning. Join us and unlock a world of knowledge!</p>                                <a class="btn btn-primary" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="welcome-image"></div>
        </section>
        <!-- End: Welcome Section -->
        

       
        <!-- Start: Meet Staff -->
        <section class="team section-padding">
            <div class="container">
                <div class="center-content">
                    <h2 class="section-title">Meet Our Staff</h2>
                    <span class="underline center"></span>
                </div>
                <div class="team-list">

                    <div class="team-member">
                        <figure>
                            <img src="{{ asset('assets/images/team-img-01.jpg') }}" alt="team">
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <h4>Sampath Kumara</h4>
                                <span class="designation">Executive Director</span>
                              
                            <p>Sampath brings over 20 years of leadership experience to Libraria, shaping the strategic direction of our library system</p>  
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <figure>
                            <img src="{{ asset('assets/images/team-img-02.jpg') }}" alt="team">
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <h4>Danushka Sampath</h4>
                                <span class="designation">Deputy Director</span>
                               
                            <p>With over 15 years of experience in library management, Robert Simmons leads our team with a deep passion for fostering a love of reading and learning</p>           
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <figure>
                            <img src="{{ asset('assets/images/team-img-03.jpg') }}" alt="team">

                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <h4>Niluka Silva</h4>
                                <span class="designation">Librarian</span>
                              
                                <p>Niluka Delpan is a dedicated librarian with a passion for helping others discover the joy of reading.</p>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Meet Staff -->
          <!-- Start: Category Filter -->
          <section class="category-filter section-padding">
            <div class="container">
                <div class="center-content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h2 class="section-title">Check Out The New Releases</h2>
                            <span class="underline center"></span>
                        </div>
                    </div>
                </div>
                <div class="filter-buttons">
                    <div class="filter btn" data-filter="all">Books</div>
                    <div class="filter btn" data-filter=".adults">Magazines</div>
                    <div class="filter btn" data-filter=".kids-teens">Kids &amp; Teens</div>
                    <div class="filter btn" data-filter=".video">Adults</div>
                    
                </div>
            </div>
            <div id="category-filter">
                <ul class="category-list">
                    <li class="category-item adults">
                        <figure>
                        <img src="{{ asset('assets/images/category-filter/home-v1/category-filter-img-01.jpg') }}" alt="New Releaase">

                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>The Great Gatsby</h4>
                                    <span class="author"><strong>Author:</strong> F. Scott Fitzgerald</span>
                                    <span class="author"><strong>ISBN:</strong> 9781581573268</span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                    <ol>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="category-item kids-teens">
                        <figure>
                            <img src="{{ asset('assets/images/category-filter/home-v1/category-filter-img-02.jpg') }}" alt="New Releaase">
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>The Great Gatsby</h4>
                                    <span class="author"><strong>Author:</strong> F. Scott Fitzgerald</span>
                                    <span class="author"><strong>ISBN:</strong> 9781581573268</span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                    <ol>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                  
                    <li class="category-item books">
                        <figure>
                            <img src="{{ asset('assets/images/category-filter/home-v1/category-filter-img-05.jpg') }}" alt="New Releaase">

                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>The Great Gatsby</h4>
                                    <span class="author"><strong>Author:</strong> F. Scott Fitzgerald</span>
                                    <span class="author"><strong>ISBN:</strong> 9781581573268</span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                    <ol>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="category-item magazines">
                        <figure>
                            <img src="{{ asset('assets/images/category-filter/home-v1/category-filter-img-06.jpg') }}" alt="New Releaase">

                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>The Great Gatsby</h4>
                                    <span class="author"><strong>Author:</strong> F. Scott Fitzgerald</span>
                                    <span class="author"><strong>ISBN:</strong> 9781581573268</span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                    <ol>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                 
                </ul>
                <div class="center-content">
                    <a href="#" class="btn btn-primary">View More</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>
        <!-- Start: Category Filter -->
        
     
      

        <!-- Start: News & Event -->
        <section class="news-events section-padding banner">
            <div class="container">
                <div class="center-content">
                    <h2 class="section-title c-light">News &amp; Events</h2>
                    <span class="underline center"></span>
                </div>
                <div class="news-events-list">
                    <div class="single-news-event">
                        <figure>
                            <img src="{{ asset('assets/images/news-event/news-event-01.jpg') }}" alt="News & Event">
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <div class="content_meta_category">
                                    <span class="arrow-right"></span>
                                    <a href="#." rel="category tag">EVENT</a>
                                </div>
                                <ul class="news-event-info">
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-calendar"></i>
                                            April 28, 2025
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-clock-o"></i>
                                            10:15 AM - 06:00 PM 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-map-marker"></i>
                                            Kurunegala, SriLanka
                                        </a>
                                    </li>
                                </ul>
                                <h3><a href=".html#">Kids' Adventure Reading Challenge</a></h3>
<p>Join us for an exciting day of adventure and discovery! Our Kids' Adventure Reading Challenge will inspire young minds to explore thrilling tales and embark on imaginative journeys through books. From dragons to superheroes, this event promises endless excitement for kids of all ages.</p>                                <a class="btn btn-primary" href="#">Read More</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-news-event">
                        <figure>
                            <img src="{{ asset('assets/images/news-event/news-event-02.jpg') }}" alt="News & Event">

                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <div class="content_meta_category">
                                    <span class="arrow-right"></span>
                                    <a href="#." rel="category tag">EVENT</a>
                                </div>
                                <ul class="news-event-info">
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-calendar"></i>
                                            May 1, 2025
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-map-marker"></i>
                                            Kurunegala, SriLanka
                                        </a>
                                    </li>
                                </ul>
                                <h3><a href=".html#">The Future of Digital Libraries</a></h3>
                                <p>Explore the evolution of digital libraries and how technology is transforming the way we access and share knowledge. </p><a class="btn btn-primary" href="#">Read More</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-news-event">
                        <figure>
                        <img src="{{ asset('assets/images/news-event/news-event-03.jpg') }}" alt="News & Event">
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <div class="content_meta_category">
                                    <span class="arrow-right"></span>
                                    <a href="#." rel="category tag">EVENT</a>
                                </div>
                                <ul class="news-event-info">
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-calendar"></i>
                                            May 2, 2025
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-map-marker"></i>
                                            Kurunegala, SriLanka
                                        </a>
                                    </li>
                                </ul>
                                <h3><a href=".html#">Sustainability in Libraries: Green Initiatives</a></h3>
<p>Discover how libraries are going green with eco-friendly buildings and digital resources, reducing their carbon footprint and promoting sustainability.</p>                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
        <!-- End: News & Event -->
        
       
        <!-- Start: Newsletter -->
        <section class="newsletter section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="center-content">
                            <h2 class="section-title">Subscribe to our Newsletters</h2>
                            <span class="underline center"></span>
                            <p class="lead">Subscribe to our newsletter and get the latest updates on library events, new book releases, and exciting programs directly in your inbox..</p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Enter your Email!" id="newsletter" name="newsletter" type="email">
                            <input class="form-control" value="Subscribe" type="submit">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Newsletter -->
        
         @include('user.footer')



        
    </body>


</html>