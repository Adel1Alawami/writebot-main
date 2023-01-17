<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>X | Pharmacies</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="https://notion-emojis.s3-us-west-2.amazonaws.com/prod/svg-twitter/1f48a.svg" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
       
        <link rel="stylesheet" href="{{asset('backend/dist/css/home-page.css')}}">
    </head>
    <body>
        
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <div class="alert-dismissible">
                    <img src="img/pngwing.com (3).png" viewBox="0 0 36 36" width="52" height="52" class="mx-auto w-auto">
            
                </div>
                <a class="navbar-brand" href="/#">Start Creating</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                       
                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        
        <header class="bg-dark py-5">

            @if (Route::has('login'))
                                <div class="ml-12 text-center mt-4">
                                    @auth
                                       
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                    <a href="{{ url('/logout') }}" class="btn btn-outline-danger mt-3 fixed-top m-3 " style="width: 110px" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">Logout  <svg class="d-inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"></path>
<path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"></path>
</svg></a>
                                                
                                        
                                    @else
                                        
                                        @if (Route::has('register'))
                                            
                                        @endif
                                    @endauth
                                 </div>
                                 @endif
           
                                 <div class="container px-5">

                
                                    <div class="row gx-5 justify-content-center">
                                        
                                        <div class="col-lg-6">
                                            <div class="text-center">
                                                <img src="img/pngwing.com (3).png" class="w-75">
                                                      </div>
                                            <div class="text-center my-5">
                                                <h1 class="display-5 fw-bolder text-white mb-2">Lorem ipsum dolor sit amet, consectetur</h1>
                                                <p class="lead text-white-50 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                                                    magna aliqua. Ut enim ad minim veniam.</p>
                    
                                           
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                @if (Route::has('login'))
                                <div class="ml-12 text-center mt-4">
                                    @auth
                                       
                                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ url('/write') }}">CHATGPT-3</a>
                                        <a class="btn btn-outline-light btn-lg px-4" href="{{ url('/draw') }}">DALL-E</a>
                                        
                                    @else
                                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 me-sm-3" >Get Started</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-4">Login</a>
                                            <a href="/payment" class="btn btn-outline-light btn-lg px-4">PP</a>
                                        @endif
                                    @endauth
                                 </div>
                                 @endif
                             
                                {{-- <a class="btn btn-primary btn-lg px-4 me-sm-3" href="/order">Get Started</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#features">Learn More</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5 border-bottom" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <h2 class="h4 fw-bolder">Featured title</h2>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                        <a class="text-decoration-none" href="#!">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                        <h2 class="h4 fw-bolder">Featured title</h2>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                        <a class="text-decoration-none" href="#!">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">Featured title</h2>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                        <a class="text-decoration-none" href="#!">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing section-->
     
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; X | Pharmacies</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
       
       
        
      

    </body>
</html>