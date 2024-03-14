<!DOCTYPE html>
<html lang="en">
<head>
    <title>Evento</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
    <script src="js/custom.js"></script>
</head>

<style></style>
<body>
@include('user.layout.header')

<div class="homepage-info-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-5">
                <figure>
                    <img src="images/logo-2.png" alt="logo">
                </figure>
            </div>

            <div class="col-12 col-md-8 col-lg-7">
                <header class="entry-header">
                    <h2 class="entry-title">Welcome to Evento - Your Ultimate Event Planning Platform</h2>
                </header>

                <div class="entry-content">
                    <p>Welcome to Evento, your one-stop destination for all your event planning needs. Whether you're organizing a conference, wedding, concert, or any other special occasion, Evento is here to make your event planning journey smooth and stress-free.</p>
                    <p>Our platform offers a range of features to streamline the planning process, from venue selection and vendor management to guest RSVP tracking and budget management. With Evento, you can focus on creating unforgettable experiences while we take care of the details.</p>
                </div>

                <footer class="entry-footer">
                    <a href="/" class="btn gradient-bg">Discover More</a>
                    <a href="/" class="btn dark">Sign Up Now</a>
                </footer>
            </div>
        </div>
    </div>
</div>




<div class="homepage-next-events">
    <div class="container">
        <div class="row justify-content-center">
            <div class="next-events-section-header">
                <h2 class="entry-title">Our next events</h2>
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="textsearch" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" style="cursor: pointer"><i class="bi bi-search"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group" >
                                <select id="category-select" class="form-control" style="cursor: pointer">
                                    <option value="0" selected>Select category</option>

                                    @foreach ($ctrgs as $ctgr)
                                        <option value="{{$ctgr->id}}">{{$ctgr->name}}</option>   
                                    @endforeach
                                 
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>

          
        </div>
        

        {{-- events $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ --}}

        <div  id="events-container" class="row" >
            @foreach ($events as $event)
                    <div class="col-12 col-sm-6 col-md-4" >
                        <div class="next-event-wrap" >
                            <span style="color: rgb(33, 56, 233)"><i class="bi bi-hourglass-split"></i>{{ $event->created_at->diffForHumans() }}</span>
                            <figure>
                                <a href="/soloevent?id={{$event->id}}"><img src="assets/images/{{ $event->image }}" alt="1"></a>
                                @if($event->price == 0)
                                        <div class="event-rating">Free</div>
                                
                                @else 
                                        <div class="event-rating">{{$event->price}} DH</div>
                                @endif
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">{{$event->title}}</h3>

                                <div class="posted-date"> {{ \Carbon\Carbon::parse($event->date)->format('l') }} <span>{{$event->date}}</span></div>
                            </header>

                            <div class="entry-content">
                                <p>{{Str::Limit($event->description ,  90 , '...')}}.</p>
                            </div>

                        </div>
                    </div>
                    
            @endforeach
            

            
        </div>
        <div style="padding: 20px ; ">{{ $events->links('pagination::bootstrap-5') }}</div>

    </div>
</div>



<div class="homepage-regional-events">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="regional-events-heading entry-header flex flex-wrap justify-content-between align-items-center">
                    <h2 class="entry-title">Events in New York</h2>

                    <div class="select-location">
                        <select>
                            <option>New York</option>
                            <option>California</option>
                            <option>South Carolina</option>
                        </select>
                    </div>
                </header>

                <div class="swiper-container homepage-regional-events-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <figure>
                                <img src="images/event-slider-1.jpg" alt="">

                                <a class="event-overlay-link flex justify-content-center align-items-center" href="#">+</a>
                            </figure><!-- .hero-image -->

                            <div class="entry-header">
                                <h2 class="entry-title">U2 Concert </h2>
                            </div><!--- .entry-header -->

                            <div class="entry-footer">
                                <div class="posted-date">Saturday <span>Jan 27, 2018</span></div>
                            </div><!-- .entry-footer" -->
                        </div><!-- .swiper-slide -->

                        <div class="swiper-slide">
                            <figure>
                                <img src="images/event-slider-2.jpg" alt="">

                                <a class="event-overlay-link flex justify-content-center align-items-center" href="#">+</a>
                            </figure><!-- .hero-image -->

                            <div class="entry-header">
                                <h2 class="entry-title">Broadway Hit </h2>
                            </div><!--- .entry-header -->

                            <div class="entry-footer">
                                <div class="posted-date">Saturday <span>Jan 27, 2018</span></div>
                            </div><!-- .entry-footer" -->
                        </div><!-- .swiper-slide -->

                        <div class="swiper-slide">
                            <figure>
                                <img src="images/event-slider-3.jpg" alt="">

                                <a class="event-overlay-link flex justify-content-center align-items-center" href="#">+</a>
                            </figure><!-- .hero-image -->

                            <div class="entry-header">
                                <h2 class="entry-title">Gallery Exibition</h2>
                            </div><!--- .entry-header -->

                            <div class="entry-footer">
                                <div class="posted-date">Saturday <span>Jan 27, 2018</span></div>
                            </div><!-- .entry-footer" -->
                        </div><!-- .swiper-slide -->

                        <div class="swiper-slide">
                            <figure>
                                <img src="images/event-slider-4.jpg" alt="">

                                <a class="event-overlay-link flex justify-content-center align-items-center" href="#">+</a>
                            </figure><!-- .hero-image -->

                            <div class="entry-header">
                                <h2 class="entry-title">Art Gallery</h2>
                            </div><!--- .entry-header -->

                            <div class="entry-footer">
                                <div class="posted-date">Saturday <span>Jan 27, 2018</span></div>
                            </div><!-- .entry-footer" -->
                        </div><!-- .swiper-slide -->

                        <div class="swiper-slide">
                            <figure>
                                <img src="images/event-slider-5.jpg" alt="">

                                <a class="event-overlay-link flex justify-content-center align-items-center" href="#">+</a>
                            </figure><!-- .hero-image -->

                            <div class="entry-header">
                                <h2 class="entry-title">Music Concert</h2>
                            </div><!--- .entry-header -->

                            <div class="entry-footer">
                                <div class="posted-date">Saturday <span>Jan 27, 2018</span></div>
                            </div><!-- .entry-footer" -->
                        </div><!-- .swiper-slide -->

                        <div class="swiper-slide">
                            <figure>
                                <img src="images/event-slider-6.jpg" alt="">

                                <a class="event-overlay-link flex justify-content-center align-items-center" href="#">+</a>
                            </figure><!-- .hero-image -->

                            <div class="entry-header">
                                <h2 class="entry-title">EDM Festival</h2>
                            </div><!--- .entry-header -->

                            <div class="entry-footer">
                                <div class="posted-date">Saturday <span>Jan 27, 2018</span></div>
                            </div><!-- .entry-footer" -->
                        </div><!-- .swiper-slide -->

                        <div class="swiper-slide">
                            <figure>
                                <img src="images/event-slider-1.jpg" alt="">

                                <a class="event-overlay-link flex justify-content-center align-items-center" href="#">+</a>
                            </figure><!-- .hero-image -->

                            <div class="entry-header">
                                <h2 class="entry-title">U2 Concert </h2>
                            </div><!--- .entry-header -->

                            <div class="entry-footer">
                                <div class="posted-date">Saturday <span>Jan 27, 2018</span></div>
                            </div><!-- .entry-footer" -->
                        </div><!-- .swiper-slide -->
                    </div><!-- .swiper-wrapper -->

                    <!-- Add Arrows -->
                    <div class="swiper-button-next flex justify-content-center align-items-center">
                        <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
                    </div>

                    <div class="swiper-button-prev flex justify-content-center align-items-center">
                        <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg></span>
                    </div>
                </div><!-- .swiper-container -->

                <div class="events-partners">
                    <header class="entry-header">
                        <h2 class="entry-title">Partners</h2>
                    </header>

                    <div class="events-partners-logos flex flex-wrap justify-content-between align-items-center">
                        <div class="event-partner-logo">
                            <a href="#"><img src="images/pixar.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/the-pirate.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/himalayas.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/sa.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/south-porth.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/himalayas.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/sa.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/south-porth.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/pixar.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/the-pirate.png" alt=""></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="newsletter-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h2 class="entry-title">Subscribe to our newsletter to get the latest trends & news</h2>
                    <p>Join our database NOW!</p>
                </header>

                <div class="newsletter-form">
                    <form class="flex flex-wrap justify-content-center align-items-center">
                        <div class="col-md-12 col-lg-3">
                            <input type="text" placeholder="Name">
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <input type="email" placeholder="Your e-mail">
                        </div>

                        <div class="col-md-12 col-lg-3">
                            <input class="btn gradient-bg" type="submit" value="Subscribe">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <figure class="footer-logo">
                    <a href="#"><img src="images/logo.png" alt="logo"></a>
                </figure>

                <nav class="footer-navigation">
                    <ul class="flex flex-wrap justify-content-center align-items-center">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>

                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                <div class="footer-social">
                    <ul class="flex flex-wrap justify-content-center align-items-center">
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="back-to-top flex justify-content-center align-items-center">
    <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1395 1184q0 13-10 23l-50 50q-10 10-23 10t-23-10l-393-393-393 393q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
</div>

<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='js/circle-progress.min.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/custom.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXxZ8SCZFbbFI1vUB4=" crossorigin="anonymous"></script>

<script>
    jQuery(document).ready(function($) {
    function handleSearch() {
        var categoryId = $('#category-select').val();
        var textsearch = $('#textsearch').val();

        if (textsearch == "") {
            textsearch = 0;
        }

        console.log(textsearch);

        if (categoryId) {
            $.ajax({
                url: '/categories/' + categoryId + '/events/' + textsearch,
                type: 'GET',
                dataType: 'html',
                success: function(eventsHtml) {
                    $('#events-container').html(eventsHtml);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            console.error('No category data found');
        }
    }

    $('#category-select').change(handleSearch);
    $('#textsearch').on('input', handleSearch);
});


</script>



</body>
</html>