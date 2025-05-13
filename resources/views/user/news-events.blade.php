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
                                                <!-- <div class="col-md-4 col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <select name="startdate" id="startdate" class="form-control">
                                                                    <option>Start Date</option>
                                                                    <option>Start Date 01</option>
                                                                    <option>Start Date 02</option>
                                                                    <option>Start Date 03</option>
                                                                    <option>Start Date 04</option>
                                                                    <option>Start Date 05</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <select name="enddate" id="enddate" class="form-control">
                                                                    <option>End Date</option>
                                                                    <option>End Date 01</option>
                                                                    <option>End Date 02</option>
                                                                    <option>End Date 03</option>
                                                                    <option>End Date 04</option>
                                                                    <option>End Date 05</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div> -->
                                                <div class="col-md-4 col-sm-3">
                                                    <!-- <div class="form-group">
                                                        <select name="agegroup" id="agegroup" class="form-control">
                                                            <option>Age Group</option>
                                                            <option>Age Group 01</option>
                                                            <option>Age Group 02</option>
                                                            <option>Age Group 03</option>
                                                            <option>Age Group 04</option>
                                                            <option>Age Group 05</option>
                                                        </select>
                                                    </div> -->
                                                </div>
                                                <!-- <div class="col-md-4 col-sm-3">
                                                    <div class="form-group">
                                                        <select name="language" id="language" class="form-control">
                                                            <option>Language</option>
                                                            <option>Language 01</option>
                                                            <option>Language 02</option>
                                                            <option>Language 03</option>
                                                            <option>Language 04</option>
                                                            <option>Language 05</option>
                                                        </select>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-6">
                                                    <!-- <div class="form-group">
                                                        <input class="form-control btn-clearform" type="submit" value="Clear Form">
                                                    </div> -->
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
                                            <div class="social-content">
                                                <div class="social-share">
                                                   
                                                </div>
                                                <div class="social-media">
                                                  
                                                </div>
                                            </div>
                                            <figure>
                                                <a href="news-events-detail.html"><img src="/assets/images/news-event/news-listing-01.jpg" alt="News &amp; Event"></a>
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
                                                                July 25, 2016
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-clock-o"></i>
                                                                10:15 AM - 10:15 PM 
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-map-marker"></i>
                                                                New York, USA
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <h3><a href="news-events-detail.html">The Future of Digital Libraries                                                    </a></h3>
<p>Step into the next generation of knowledge sharing!
Discover how digital libraries are evolving with cutting-edge technologies like AI, cloud storage, and mobile access. Learn how these innovations are making information more accessible, breaking barriers of distance, and creating new opportunities for learning and collaboration. Whether you’re a student, researcher, or casual reader, find out how digital libraries are shaping the future of education and empowering communities worldwide.

</p>                                                    <a class="btn btn-primary" href="news-events-detail.html">Read More</a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="news-list-box">
                                        <div class="single-news-list">
                                            <div class="social-content">
                                                <div class="social-share">
                                                   
                                                </div>
                                                <div class="social-media">
                                                  
                                                </div>
                                            </div>
                                            <figure>
                                                <a href="news-events-detail.html"><img src="/assets/images/news-event/news-listing-02.jpg" alt="News &amp; Event"></a>
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
                                                                July 25, 2016
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-clock-o"></i>
                                                                10:15 AM - 10:15 PM 
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-map-marker"></i>
                                                                New York, USA
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <h3><a href="news-events-detail.html">Kids' Adventure Reading Challenge
                                                    </a></h3>
<p>Get ready for a magical day of reading and adventure!
Bring your young readers to our Kids' Adventure Reading Challenge, where imagination knows no bounds. Children will dive into worlds filled with dragons, superheroes, explorers, and mysteries. Fun activities, interactive storytelling, and special prizes await! Let’s spark a lifelong love for reading through excitement, creativity, and discovery.

</p>                                                    <a class="btn btn-primary" href="news-events-detail.html">Read More</a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="news-list-box">
                                        <div class="single-news-list">
                                            <div class="social-content">
                                                <div class="social-share">
                                                   
                                                </div>
                                                <div class="social-media">
                                                  
                                                </div>
                                            </div>
                                            <figure>
                                                <a href="news-events-detail.html"><img src="/assets/images/news-event/news-listing-03.jpg" alt="News &amp; Event"></a>
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
                                                                July 25, 2016
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-clock-o"></i>
                                                                10:15 AM - 10:15 PM 
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-map-marker"></i>
                                                                New York, USA
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <h3><a href="news-events-detail.html">Sustainability in Libraries: Green Initiatives</a></h3>
<p>Join us for an inspiring session on how libraries are embracing sustainability!
Learn about eco-friendly library designs, green practices, and how digital resources are helping reduce the environmental impact. Explore the innovative steps libraries are taking to promote a greener, more responsible future for communities worldwide.

</p>                                                    <a class="btn btn-primary" href="news-events-detail.html">Read More</a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="news-list-box">
                                        <div class="single-news-list">
                                            <div class="social-content">
                                                <div class="social-share">
                                                   
                                                </div>
                                                <div class="social-media">
                                                   
                                                </div>
                                            </div>
                                            <figure>
                                                <a href="news-events-detail.html"><img src="/assets/images/news-event/news-listing-04.jpg" alt="News &amp; Event"></a>
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
                                                                July 25, 2016
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-clock-o"></i>
                                                                10:15 AM - 10:15 PM 
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">
                                                                <i class="fa fa-map-marker"></i>
                                                                New York, USA
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <h3><a href="news-events-detail.html">It uses a dictionary of over 200 Latin</a></h3>
                                                    <p>Morbi in erat laoreet, eleifend mi sit amet, eleifend mauris. Duis magna turpis, semper ac ligula id, elementum hendrerit augue. Aliquam euismod sem ut justo ultrices, in eleifend sapien hendrerit. Vestibulum sollicitudin dapibus aliquet. Suspendisse a commodo ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque bibendum est turpis, at tristique velit. Quisque bibendum est turpis, at tristique velit.</p>
                                                    <a class="btn btn-primary" href="news-events-detail.html">Read More</a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
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
                                <div class="col-md-3 col-md-pull-9">
                                    <aside id="secondary" class="sidebar widget-area">
                                        <div class="widget widget_search">
                                            <h4 class="widget-title" data-control>Search Events</h4>
                                            <form method="get" action="#." class="form-horizontal search-form">
                                                <input class="form-control" id="inputEmail" placeholder="Search Here" value="" name="s" type="text">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                        
                                        <div class="widget widget_recent_entries">
                                            <h4 class="widget-title" data-control>Recent Events</h4>
                                            <ul>
                                                <li>
                                                    <figure>
                                                        <img src="/assets/images/order-item-04.jpg" alt="product" />
                                                    </figure>
                                                    <a href="#">The Future of Digital Libraries                                                    </a>
                                                    <span><i class="fa fa-calendar"></i> &nbsp; 1 May, 2025</span>
                                                    <span><i class="fa fa-clock-o"></i> &nbsp; 10:00 AM - 5:00 PM</span>
                                                    <span><i class="fa fa-map-marker"></i> &nbsp; Kurunegala, SriLanka</span>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="/assets/images/order-item-05.jpg" alt="product" />
                                                    </figure>
                                                    <a href="#">Kids' Adventure Reading Challenge</a>
                                                    <span><i class="fa fa-calendar"></i> &nbsp; April 28, 2025</span>
                                                    <span><i class="fa fa-clock-o"></i> &nbsp; 10:00 AM - 5:00 PM</span>
                                                    <span><i class="fa fa-map-marker"></i> &nbsp; Kurunegala, SriLanka</span>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="/assets/images/order-item-06.jpg" alt="product" />
                                                    </figure>
                                                    <a href="#">Sustainability in Libraries</a>
                                                    <span><i class="fa fa-calendar"></i> &nbsp; April 29, 2025</span>
                                                    <span><i class="fa fa-clock-o"></i> &nbsp; 10:00 AM - 5:00</span>
                                                    <span><i class="fa fa-map-marker"></i> &nbsp; Kurunegala, SriLanka</span>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </ul>
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
            <!-- <div class="container">
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
            </div> -->
        </section>
        <!-- End: Social Network -->
        @include('user.footer')

    </body>


</html>