
<html data-bs-theme="dark">
  <head>
    <title> NAME OF PAGE </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset=UTF-8">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-  QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--  icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- style -->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../cssForAll.css">

  <script src='../jsForAll.js'></script>
  <script src='../../jquery-3.7.1.min.js'></script>

  </head>
  <body>

  <nav class="navbar navbar-dark px-5 py-3 navbar-expand-md w-100  shadow">
      <div class="container-fluid">
          <a class="navbar-brand btn2 bi bi-pc-display" href="../Home/index.php"> Next PC</a>
          
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
          <!-- <a class="bi bi-basket fs-5 text-white floating" href="../Basket/index.php"></a> -->
          </div>
    </nav>
    

      
    <?php 
      session_start();
      if (isset($_SESSION["account"])){
        $account = json_decode($_SESSION["account"], true);
        $username = $account['username'];
        echo "<script>UpdateNavBar(true, '".$username."')</script>";
      }else {
        echo "<script>UpdateNavBar(false)</script>";
      }
  ?>  



      <div class="container my-5 d-flex flex-column align-items-center justify-content-center gap-3">
        <h1 class="bi bi-basket styled"> My Basket</h1>
        <section  class="w-100 d-flex gap-2  flex-column align-items-center">
          <div class="w-100 flex-fill d-flex flex-column flex-md-row gap-2 align-items-center justify-content-between">
            <span class="fw-bold">Shopping Basket</span>
            <button class="btn btn-outline-danger" id="removeAll" onclick="ClearBasket();updateDisible(this);removeAll()">Remove all</button>
          </div>
         
          <!-- ord -->
          <small id="noProcuctsText" class="hidden">You have no products in your basket !</small>
          <div id="containerOrders" class="w-100 h-100"> 
            <!-- <div class="w-100 flex-fill d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                <img src="../../assets/pc1.jpg" class="productImage" alt="">
                <div class="d-flex flex-column align-items-center gap-1">
                  <h1>1</h1>
                  <span>aaf</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <button class="controlBtn bi bi-plus"></button>
                  <span>2</span>
                  <button class="controlBtn bi bi-dash"></button>
                </div>
                <div class="d-flex flex-column align-items-center gap-1">
                  <h3>99.99$</h3>
                  <button class="btn btn-outline-danger">Remove</button>
                </div>
              </div>
              <hr class='w-100'> -->
         </div>
          
          
          <a href="" onclick="toCheckout(event)" id="checkout" class="btn btn2  bi bi-bag-check" > Checkout</a>
      
        </section>
      </div>
    
  

  </body>

  <!--  our script-->
  <script src="../../shared/basket.js"></script>
  <script src='./script.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>