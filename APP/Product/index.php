<html data-bs-theme="dark">
  <head>
  <title> Product </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">


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
  <body >

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
      echo "<script>UpdateNavBar(false)</script>";
    }
?>  



  <section class="min-vh-100 p-5 d-flex flex-column flex-md-row text-white">
    <div class="picturesSec d-flex flex-column gap-3 justify-content-center align-items-center flex-fill">
    <div class="thePic">
    <div class="likeBtn  ">
            <div class="heart-container" title="Like">
                <input type="checkbox" class="checkbox" id="Give-It-An-Id">
                <div class="svg-container">
                    <svg viewBox="0 0 24 24" class="svg-outline" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z">
                        </path>
                    </svg>
                    <svg viewBox="0 0 24 24" class="svg-filled" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z">
                        </path>
                    </svg>
                    <svg class="svg-celebrate" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="10,10 20,20"></polygon>
                        <polygon points="10,50 20,50"></polygon>
                        <polygon points="20,80 30,70"></polygon>
                        <polygon points="90,10 80,20"></polygon>
                        <polygon points="90,50 80,50"></polygon>
                        <polygon points="80,80 70,70"></polygon>
                    </svg>
                </div>
                
            </div>
            <span class="bi bi-heart-fill" id="likes" style="color:plum"> 0 Likes</span>
        </div>
      <img id="cover" src="../../UPLOAD/PC/1.png" class="" />
    </div>
      <div class="btns">
        <!-- <button>
          <img src="../../UPLOAD/PC/1.png" alt="">
        </button>
        <button>
          <img src="../../UPLOAD/PC/1.png" alt="">
        </button>
        <button>
          <img src="../../UPLOAD/PC/1.png" alt="">
        </button> -->
      </div>
    </div>
    <div class="flex-fill text-start w-100 px-5 py-3 d-flex flex-column ">
      <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
        <h1 id="titleH1">Lorem ipsum dolor sit.</h1>
        <spa class="d-flex gap-2 align-items-center">
          <span class="oldPrice">9999 Dhs</span>
          <h4 class="price fs-5">  7999 Dhs</h4>
        </spa>
      </div>

      <div class="d-flex p-5 flex-wrap gap-5 hidden" id="infos"  >
          <div class="part">
            <i class="bi bi-cpu" style="font-size: 3em;" ></i>
            <div>
              <span>PROCESSEUR (CPU)</span>
              <h4 id="data-cpu">Intel Core i7 12'th Gen</h4>
            </div>
          </div>
          <div class="part">
            <i class="bi bi-motherboard" style="font-size: 3em;" ></i>
            <div>
              <span>MOTHER BOARD</span>
              <h4 id="data-mothercard">Intel Core i7 12'th Gen</h4>
            </div>
          </div>
          <div class="part">
            <i class="bi bi-pc" style="font-size: 3em;" ></i>
            <div>
              <span>CASE</span>
              <h4 id="data-case">Intel Core i7 12'th Gen</h4>
            </div>
          </div>
          <div class="part">
            <i class="bi bi-cpu" style="font-size: 3em;" ></i>
            <div>
              <span>Power Supply Unit (PSU)</span>
              <h4 id="data-psu">Intel Core i7 12'th Gen</h4>
            </div>
          </div>
          <div class="part">
            <i class="bi bi-gpu-card" style="font-size: 3em;" ></i>
            <div>
              <span>GRAPHIQUE CARD (GPU)</span>
              <h4 id="data-gpu">Intel Core i7 12'th Gen</h4>
            </div>
          </div>
          <div class="part">
            <i class="bi bi-memory" style="font-size: 3em;" ></i>
            <div>
              <span>RAM</span>
              <h4 id="data-ram">Intel Core i7 12'th Gen</h4>
            </div>
          </div>
          <div class="part">
            <i class="bi bi-floppy" style="font-size: 3em;" ></i>
            <div>
              <span>STORAGE</span>
              <h4 id="data-storage">Intel Core i7 12'th Gen</h4>
            </div>
          </div>
        </div> 
        <button class="btn2 bi bi-basket align-self-center w-100" style="max-width:250px"> Add to Cart <span class="text-warning">(1)</span></button>
        
        <div class="description" id="discreption">
          <h1>Description</h1>
          <hr>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla ratione eum odit sequi veritatis minima, expedita ullam saepe nobis porro facere deserunt reiciendis corporis, mollitia iste quidem fugit labore enim.</p>
        </div>
        </div>
      </div>

    </div>

  </section>
    

    <!-- footer -->
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

    <?php 
      include 'product.php';

    ?>
  </body>

  <!--  our script-->
  <script src='./script.js'></script>
  <script src='../jsForAll.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>