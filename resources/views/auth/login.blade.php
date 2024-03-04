<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="auth/fonts/icomoon/style.css">

    <link rel="stylesheet" href="auth/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="auth/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="auth/css/style.css">

    <title>Login #5</title>
  </head>
  <body >
  
    

  <div class="d-md-flex half" >
    <div class="bg" style="background-image: url('auth/images/bg_1.jpg');"></div>
    <div class="contents">

      <div class="container" >
        <div class="position-absolute" style="z-index: 999 ; width:100% ; margin-top:5vh">
          <div id="toast-container" aria-live="polite" aria-atomic="true" class="d-flex flex-column">
              @if(session('msg'))
                  <div class="toast bg-warning" role="alert" aria-live="assertive" aria-atomic="true" data-delay="15000">
                      <div class="toast-header">
                          <strong class="mr-auto">Error</strong>
                          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="toast-body" style="color: black"> 
                          {{ session('msg') }}
                      </div>
                  </div>
              @endif
      
              @if($errors->any())
                  @foreach($errors->all() as $error)
                      <div class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-delay="15000">
                          <div class="toast-header">
                              <strong class="mr-auto" style="color: rgb(0, 0, 0)">Error</strong>
                              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="toast-body" style="color: white">
                              {{ $error }}
                          </div>
                      </div>
                  @endforeach
              @endif
          </div>
      </div>
      
      
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h3 class="text-uppercase">Login to <strong>Event</strong></h3>
              </div>
              <form action="/signin" method="post">

                @csrf
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" placeholder="your-email@gmail.com" id="username">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" id="password">
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                </div>

                <input type="submit" value="Log In" class="btn btn-block py-2 btn-primary">
                <a href="register" class="btn btn-block py-2 btn-secondary" style="color: white">Register</a>

                <span class="text-center my-3 d-block">or</span>
                
                
                <div class="">
                <a href="#" class="btn btn-block py-2 btn-facebook">
                  <span class="icon-facebook mr-3"></span> Login with facebook
                </a>
                <a href="#" class="btn btn-block py-2 btn-google"><span class="icon-google mr-3"></span> Login with Google</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DEpEJyZkgAe5wS7iOTV5n9Tu5omN4tXtM/9dGGDtLHLrKhj+ZPz9w0xuGveQCq1Q" crossorigin="anonymous">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-VoPFnP+ARbL2WP4LTO3zvei+sLbq+ZRb/2XkA34BTKZI+1+21Q3tB1zzQ3O4XvG/" crossorigin="anonymous"></script>

    
  <script>
    $(document).ready(function(){
        $('.toast').toast('show');
    });
</script>
    

    <script src="auth/js/jquery-3.3.1.min.js"></script>
    <script src="auth/js/popper.min.js"></script>
    <script src="auth/js/bootstrap.min.js"></script>
    <script src="auth/js/main.js"></script>
  </body>
</html>