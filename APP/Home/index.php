

<html data-bs-theme="dark">
  <head>
    <title> Home </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset=UTF-8">


    <!-- jquery -->
    <script src="../../jquery-3.7.1.min.js"></script>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-  QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    include "home.php";
    session_start();
    if (isset($_SESSION["account"])){
      $account = json_decode($_SESSION["account"], true);
      $username = $account['username'];
      echo "<script>UpdateNavBar(true, '".$username."')</script>";
    }else {
      echo "<script>UpdateNavBar(false)</script>";
    }
?>  


    <div id="categoriesContainer" class="list shadow d-flex align-items-center justify-content-md-center gap-5 text-center p-3 my-1" >
      <button class="bi bi-pc link link-light link-active"> Pc Gamer </button>
      <button class="bi bi-motherboard link link-light"> Mother Card</button>
      <button class="bi bi-gpu-card link link-light"> GPU</button>
      <button class="bi bi-cpu link link-light"> CPU</button>
      <button class="bi bi-memory link link-light"> RAM</button>
      <button class="bi bi-plug link link-light"> Power Supply</button>
      <button class="bi bi-display link link-light"> Monitors</button>
      <button class="bi bi-keyboard link link-light"> Accessories</button>
    </div>


    <section class="container d-flex flex-column flex-md-row flex-wrap w-100">
      <article class="headerInfos" >
        <img src="../../assets/pc1.jpg" />
        <b>
          <h3>Title Of product</h3>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam, soluta.</p>
          <a href="" class="btn2">Buy Now</a>
        </b>
      </article>
      <div class="headersInfo2" >
        <button class="shadow" id="ad1">
          <h1>SALE</h1>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure, sapiente?</p>
        </button>
        <button class="shadow" id="ad2">
          <h1>SALE</h1>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure, sapiente?</p>
        </button>
        <button class="shadow" id="ad3">
          <h1>SALE</h1>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure, sapiente?</p>
        </button>
      </div>
  
    </section>


    <section id="productsContainer" class="container py-1 d-flex flex-wrap align-items-center justify-content-center justify-content-md-start gap-4 min-vh-100">

      
    </section>

    <button class="btn1 w-100 my-3 hidden" id="loadMoreBtn">Load More ..</button>
    </div>
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

    
  </body>

  <!--  our script-->
  <script src='./script.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</html>


