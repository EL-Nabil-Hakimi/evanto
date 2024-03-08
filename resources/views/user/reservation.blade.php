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

    <div class="row mt-4">
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Event Name</th>
                        <th scope="col">Date Event</th>
                        <th scope="col">Status</th>
                        <th scope="col">Teckets PDF</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reservations as $res)
                    <tr>
                        <td>{{ $res->title }}</td>
                        <td>{{ $res->date }}</td>
                        <td>
                            @if($res->status == 1)
                            <span class="badge bg-success  p-2 ">Complete</span>
                            @elseif($res->status == 0)
                                <span class="badge bg-warning p-2">Pending</span>
                            @else 
                                <span class="badge bg-danger p-2">Reject</span>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if($res->status == 1)
                                <a href="/ticket/{{$res->id}}/{{$res->user_id}}" class="btn btn-primary" style="display: inline-block; padding: 8px 16px; border-radius: 4px; background-color: #007bff; color: #fff; text-decoration: none;">
                                    <i class="bi bi-download" style="font-size: 1.2rem;"></i> 
                            @endif
                            </a>
                        </td>
                        
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">You don't have any reservations</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
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