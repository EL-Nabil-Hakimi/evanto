<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hello World</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                background-color: #ececec; /* Couleur de fond */
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


@include('user.layout.header')






<div class="container">

    @if(Session::has('success'))
    <div class="alert alert-success text-center" role="alert" style="width: 50%; margin: 0 auto;">
        {{ Session::get('success') }}
        <a href="/reservation">Show my reservation</a>
        </div>
    @elseif(Session::has('error'))  
        <div class="alert alert-danger text-center" role="alert" style="width: 50%; margin: 0 auto;">
            {{ Session::get('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <article class="events-news-post">
                <header class="entry-header">
                    <h2 class="entry-title"><a>{{$event->title}}</a></h2>

                    <div class="entry-meta flex align-items-center">
                        <div class="posted-author"><a href="#">{{$admin->name}}</a></div>

                        <div class="post-comments"><a href="#">{{$ctgr->name}}</a></div>
                    </div>
                </header>

                <figure>
                    <a href="#" ><img src="assets/images/{{ $event->image }}" alt=""></a>

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
                        <li><i class="bi bi-hourglass-split"></i> Duration: {{ $event->duration }} min</li>
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

            @if($event->total_places - $event->total_reservations > 0)
            <div class="col-md-12 col-lg-3">
                <input class="btn gradient-bg" type="submit" value="Reservation" data-bs-toggle="modal"
                data-bs-target="#AddEmail">
            </div>
            @else
                <p class="text-danger">No Places Remaining</p>
            @endif


            
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

@include('user.layout.footer')

<div class="back-to-top flex justify-content-center align-items-center">
    <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1395 1184q0 13-10 23l-50 50q-10 10-23 10t-23-10l-393-393-393 393q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
</div>

{{-- Modal Reservation $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ --}}
<div class="modal fade" id="AddEmail" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Reservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">    
                @if($user != null)

                <form action="/create" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" value="{{$event->id}}" name="event_id">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter first name" required>
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter last name" required>
                    </div>
                    <label for="lname" class="form-label">Email for ticket</label>
                    <div class="mb-3 form-check">
                        <input type="radio" class="form-check-input" id="existingEmail" name="email" value="{{$user->email}}" required>
                        <label class="form-check-label" for="existingEmail">{{$user->email}}</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="radio" class="form-check-input" id="newEmail" name="email" value="new" required>
                        <label class="form-check-label" for="newEmail">Add New Email</label>
                    </div>
                    <div class="mb-3" id="newEmailSection" style="display: none;">
                        <label for="new_email" class="form-label">New Email</label>
                        <input type="email" class="form-control" name="new_email" id="new_email" placeholder="Enter new email" >
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Reservation</button>
                    </div>
                </form>              
                
                

                @else
                 
                <h3>You mest be to Register before resirving</h3>
                <style>
                    .modal-footer .btn {
                        font-size: 0.875em; /* Adjust the font size */
                        padding: 1em 1.5em; /* Adjust the padding */
                    }
                </style>                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="/" type="submit" class="btn btn-primary">Register</a>
                </div>
            @endif
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.js"></script>

<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='js/circle-progress.min.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/custom.js'></script>


<script>    document.addEventListener("DOMContentLoaded", function() {
    var existingEmailRadio = document.getElementById("existingEmail");
    var newEmailRadio = document.getElementById("newEmail");
    var newEmailSection = document.getElementById("newEmailSection");

    existingEmailRadio.addEventListener("change", function() {
        newEmailSection.style.display = "none";
    });

    newEmailRadio.addEventListener("change", function() {
        newEmailSection.style.display = "block";
    });
});
</script>


</body>
</html>