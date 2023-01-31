<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 , shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bg.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
   
    
    
    
    <script type="text/javascript" src="{{ URL::asset ('js/bg.js') }}"></script>
  
     <title>Open AI | iAdel</title>

</head>

<style>
  body {
      font-family: 'Space Grotesk', sans-serif;
  }
  .title:empty:before {
      content:attr(data-placeholder);
      color:gray
  }
</style>
<body> 


  
  
    
    <header>
     

      <div class="background-container">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1231630/moon2.png" alt="">
        <div class="stars"></div>
        <div class="twinkling"></div>
        <div class="clouds"></div>
        
      </header>

        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container">
          
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                  </ul>
              </div>
          </div>
      </nav>
        
     

    <main>
      <section class="showcase form-check mt-lg-5">
        <form action="/draw/generate" method="post">
          @csrf
          <h1 class="mt-lg-5">Describe An Image</h1>
          <div class="selectpicker">
            <input name="title" />
          </div>


          

          
          {{-- <!--Theme-->
         <div>
            <select class="selectpicker" name="theme" id="theme">
              <option selected>No Theme</option>
              <option value="cyperpunk">cyperpunk</option>
              <option value="artisticportrait">artistic portrait</option>
              <option value="medevil">medevil</option>
            </select>
          </div>
          
          <!-- size -->
          <div >
            <select class="selectpicker" name="size" id="size">
              <option value="small">Low Quality</option>
              <option value="medium" selected>Medium Quality</option>
              <option value="large">High Quality</option>
            </select>
          </div> --}}
          <button type="submit" class="btn" style="background-color: transparent; background-color:midnightblue; color: aliceblue;">Generate</button>
        </form>

        
       
       

      </section>

      
      <section class="mt-3" >
        <div class="card-columns mb-md-5 image-container">
          <h2 class="msg"></h2>
          <img src=" {{$content}}"  id="image" class="h-auto />
          


        

          
        </div>

       
        <a class="bi-arrow-down-square-fill alert centered" href="{{$content}}" >Download Image  </a>
      </section>
      
    </main>

    <div class="spinner"></div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
  </body>
</html>
