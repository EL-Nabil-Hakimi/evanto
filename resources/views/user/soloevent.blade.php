<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hello World</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="events-news-page">


    <style>
   .entry-content ul {
    list-style-type: none;
    padding: 0;
}

.entry-content ul li {
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    background-color: #d5d5d5; /* Couleur de fond */
    padding: 10px; /* Espacement intérieur */
    border-radius: 5px; /* Coins arrondis */
}

.entry-content ul li:hover{
    background-color: #f0f0f0; /* Couleur de fond */

}

.entry-content ul li i {
    margin-right: 10px;
    color: #007bff; /* Couleur de l'icône */
}

.entry-content ul li span.bi {
    font-size: 1.2rem;
    margin-right: 5px;
    color: #28a745; /* Couleur de l'icône de nombre de places */
}

/* Couleur de texte */
.entry-content ul li p {
    color: #333;
}


    </style>
<header class="site-header">
    <div class="header-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-10 col-lg-2 order-lg-1">
                    <div class="site-branding">
                        <div class="site-title">
                            <a href="#"><img src="images/logo.png" alt="logo"></a>
                        </div><!-- .site-title -->
                    </div><!-- .site-branding -->
                </div><!-- .col -->

                <div class="col-2 col-lg-7 order-3 order-lg-2">
                    <nav class="site-navigation">
                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->

                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav><!-- .site-navigation -->
                </div><!-- .col -->

                <div class="col-lg-3 d-none d-lg-block order-2 order-lg-3">
                    <div class="buy-tickets">
                        <a class="btn gradient-bg" href="#">Buy Tickets</a>
                    </div><!-- .buy-tickets -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </div><!-- .header-bar -->

    <div class="page-header events-news-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Events news.</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
</header><!-- .site-header -->

<div class="container">
    <div class="row">
        <div class="col-12">
            <article class="events-news-post">
                <header class="entry-header">
                    <h2 class="entry-title"><a>{{$event->title}}</a></h2>

                    <div class="entry-meta flex align-items-center">
                        <div class="posted-author"><a href="#">{{$user->name}}</a></div>

                        <div class="post-comments"><a href="#">{{$ctgr->name}}</a></div>
                    </div>
                </header>

                <figure>
                    <a href="#"><img src="assets/images/{{ $event->image }}" alt=""></a>

                    <div class="posted-date" >
                        <span>{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                        <span>{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                    </div>
                    
                </figure>

                <div class="entry-content">
                    <h4 style="color: rgb(106, 56, 214)">Description</h4>
                    <p style="color: black">{{ $event->description }}</p>
                </div>
                <div class="entry-content">
                    <ul class="list-unstyled">
                        <li><i class="bi bi-geo-alt"></i> Location: {{ $event->location }}.</li>
                        <li><i class="bi bi-calendar"></i> Date: {{ \Carbon\Carbon::parse($event->date)->format('l') }} {{ $event->date }}.</li>
                        <li><i class="bi bi-clock"></i> Time: {{ date('H:i', strtotime($event->time)) }}</li>
                        <li><i class="bi bi-hourglass-split"></i> Duration: {{ $event->duration }}</li>
                        @if($event->price == 0)
                            <li><i class="bi bi-currency-dollar"></i> Price: Free</li>
                        @else 
                            <li><i class="bi bi-currency-dollar"></i> Price: {{ $event->price }}</li>
                        @endif

                        <li><i class="bi bi-people"></i> Number of Places: {{ $event->total_places }}</li>
                        <li><i class="bi bi-people"></i> Number of Places Remaining: <span class="bi bi-person-badge"></span>{{ $event->total_places - $event->total_reservations }}</li>
                        
                    </ul>
                </div>  
                
                
            </article>


            <div class="col-md-12 col-lg-3">
                <input class="btn gradient-bg" type="submit" value="Reservation">
            </div>


            
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="blog-pagination">
                <ul class="flex align-items-center">
                  
                </ul>
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

</body>
</html>