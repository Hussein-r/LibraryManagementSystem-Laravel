
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">



        
    <title>



<!-- add default value to title -->
   
</title>



       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>
      

            <div class="container">


            <nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   

   <!-- we can add another argument next to nav and use it in nav page for example : ['username'=>'hajaaaar'] -->
   @include('managers.navbar')

  </div>
</nav>
 </div>



<!-- add another views in this place -->
 <div  class="container">
     @yield('content')
 </div>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>




















