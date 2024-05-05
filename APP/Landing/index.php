<html data-bs-theme="dark">
  <head>
    <title> Landing Page </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset=UTF-8">

    
    <!-- jquery -->
    <script src="../../jquery-3.7.1.min.js" defer></script>

    <!-- bootstrap -->
    <link   href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-  QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--  icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    
    <!-- style -->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../cssForAll.css">

    <script src='../jsForAll.js'></script>

  </head>
  <body>
  
  <nav class="navbar navbar-dark px-5 py-3 navbar-expand-md w-100  shadow">
      <div class="container-fluid">
      <a class="navbar-brand btn2 bi bi-pc-display" href="../Landing/index.php"> Next PC</a>
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon " style="color:white"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navmiddle  navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center gap-5 ">
              <li class="nav-item">
              <a class="nav-link text-light active" aria-current="page" href="#">Store</a>
              </li>
              <li class="nav-item">
              <a class="nav-link text-light active" aria-current="page" href="#">Pieces</a>
              </li>
              <li class="nav-item">
              <a class="nav-link text-light" href="#">Contact</a>
              </li>
              <li class="nav-item" id="navAuthButton">
              <a class="btn1" href="../Login/index.php">Sign In/Up</a>
              </li>                  
              <li class="nav-item d-flex gap-3 align-items-center" id="navAuthProfile">
                <button class="Profile shadow">A</button>
                <button onclick="requestLogout()" class="btn btn-outline-danger ">Logout</button>
              </li>    
          </div >
          <a class="bi bi-basket fs-5 text-white floating" href="#"></a>
          </div>
    </nav>
    

    
  <?php 
    session_start();
    if (isset($_SESSION["account"])){
      $account = json_decode($_SESSION["account"], true);
      $username = $account['username'];
      echo "<script>UpdateNavBar(true, '".$username."')</script>";
    }else {
      echo "<script>UpdateNavBar(false, false)</script>";
    }
?>  

    <div class=" imagePattern"  >
        <section class="bg">
            <div class="px-5 backBlurlOW d-flex flex-column align-items-center justify-content-center min-vh-100">
           
              <div class="text-white  text-center d-flex flex-column  align-items-center justify-content-center" style="min-height: 100vh;">
                <h1  class="title styled shadow fw-bold bi bi-pc-display"> Next PC</h1>
                <h1  class="styled shadow fw-bold">Experience for your children</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium non libero, eum quas temporibus consectetur!</p>
                <div class="my-4">
                  <a href="../Home/index.php" class="bi bi-basket btn2"> BUY NOW</a>
                </div>
              
              </div>

              
             
              

             </div>
        </section>    


        <section class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
          <h1 class="text-center w-100 my-5" style="font-size: 4rem;">Why Us</h1>
          <div class="w-100 d-flex align-items-center justify-content-md-center gap-3" style="max-width:90vw;overflow-x:auto;overflow-y:hidden;">

            <div class="card">
                <div class="card-icon">
                <i class="bi bi-pc-display"></i>
                </div>
                <h1 class="heading">Bla Bla Bla</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat adipisci minus sint reiciendis, incidunt dolorem. Rem at amet, magni obcaecati voluptatibus saepe consectetur fugiat hic cumque dolorum numquam necessitatibus velit!</p>
            </div>
            <div class="card">
                <div class="card-icon">
                <i class="bi bi-pc-display"></i>
                </div>
                <h1 class="heading">Bla Bla Bla</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat adipisci minus sint reiciendis, incidunt dolorem. Rem at amet, magni obcaecati voluptatibus saepe consectetur fugiat hic cumque dolorum numquam necessitatibus velit!</p>
            </div>
            <div class="card">
                <div class="card-icon">
                <i class="bi bi-pc-display"></i>
                </div>
                <h1 class="heading">Bla Bla Bla</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat adipisci minus sint reiciendis, incidunt dolorem. Rem at amet, magni obcaecati voluptatibus saepe consectetur fugiat hic cumque dolorum numquam necessitatibus velit!</p>
            </div>
          </div>
        </section>




        <section class="min-vh-100 container d-flex gap-4 flex-column flex-md-row align-items-center justify-content-center ">
            <img src="../../assets/son1.jpeg" class="sonImage shadow" alt="">
            <div class="p-5" >
              <h6 class="styled my-5" style="font-size:3em">Make your PC happy again With new Pieces.</h6>

              <p class="my-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere ut, beatae labore rem distinctio placeat id minima dolore ipsum earum soluta quas quam necessitatibus at quibusdam sunt suscipit totam inventore.</p>

              <div style="margin-top:40px">
                <a href="../../APP/Home/index.php" class="btn2">UPGRADE NOW</a>
              </div>
            </div>          
        </section>



        
        <footer class="py-3 ">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-white">About</a></li>
          </ul>
          <p class="text-center text-body-white">© 2024 Company, Inc</p>
      </footer>

    </div>



  </body>

  <!--  our script-->
  <script src='./script.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>