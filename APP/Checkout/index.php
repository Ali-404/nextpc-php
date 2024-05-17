
<html data-bs-theme="dark">
  <head>
    <title> Checkout </title>
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

    <div class="d-flex flex-column flex-md-row" style="min-height: 100vh;">

    <section class=" p-5" style="flex:1">
      <form  method="post" onsubmit="submitPayment(event)" class="d-flex  gap-3 justify-content-center flex-column flex-md-row flex-wrap">
        <div class="" style="flex:1;">
          <h4>Contact Information</h4>
          <hr class="w-100">
          <label class="form-label" for="">Full Name</label>
          <input class="form-control" type="text" required name="fullName" id="fullName">
          <label class="form-label" for="">Email Adresse</label>
          <input class="form-control" type="email" required name="emailAdress" id="emailAdress">
      </div>
      <div class="" style="flex:1;">
         
      </div>
      <hr class="w-100">
      <div class="" style="flex:1;">
          <h4>Credit Card Details</h4>
          <hr class="w-100">
          <label class="form-label" for="">Card Name</label>
          <input class="form-control" type="text" required name="cardName" id="">
          <label class="form-label" for="">Card Number</label>
          <input class="form-control" type="number" required name="cardNumber" id="">

          <img src="../../assets/payment.png" class="my-2" style="max-width:200px;" /><br>

          <label class="form-label" for="">Expiration date</label>
          <div class="d-flex gap-2">
            <select class="form-select" required name='m' id='expireMM'>
                <option value=''>Month</option>
                <option value='1'>January</option>
                <option value='2'>February</option>
                <option value='3'>March</option>
                <option value='4'>April</option>
                <option value='5'>May</option>
                <option value='6'>June</option>
                <option value='7'>July</option>
                <option value='8'>August</option>
                <option value='9'>September</option>
                <option value='10'>October</option>
                <option value='11'>November</option>
                <option value='12'>December</option>
            </select> 
            <select class="form-select"  name='y' id='expireYY'>
                <option value=''>Year</option>
                
            </select> 
          </div>
          <label class="form-label" for="">Securite Code</label>
          <input class="form-control w-50" required type="number" name="code" id="">
          <button type="submit"  class="my-5 btn2 text-center w-100" style="cursor: pointer;">
            <a class="link link-light" href="#">Conferm Payment</a>
          </button>
        </div>
      <div style="flex:1;"></div>
    </form>
    </section>

    <section class=" p-5 " style="flex:0.4; background:rgb(46, 13, 46);max-height: 100vh;overflow-y:auto;">
      <h3 class="w-100">Orders: </h3>
      <hr class="w-100">  
      <div class="ticket  d-flex flex-column gap-1 my-3 p-5  shadow-lg rounded ">
            <span class="d-flex align-items-center justify-content-between">
              <h5>PC GAMER #1215 <strong>(x1)</strong></h5>
                <a href="" class="link link-primary">Edit cart</a>
            </span>
            <span class="d-flex align-items-center justify-content-between">
              <small>Order Price</small>
              <small><strong>199 Dhs</strong></small>
            </span>
            <span class="d-flex align-items-center justify-content-between">
              <small>Delevery</small>
              <small><strong>199 Dhs</strong></small>
            </span>
            <span class="d-flex align-items-center justify-content-between">
              <small>Tax(s)</small>
              <small><strong>199 Dhs</strong></small>
            </span>
            <hr class="w-100 align-self-center">
            <span class="d-flex align-items-center justify-content-between">
              <small><b>Total</b></small>
              <small><strong>199 Dhs</strong></small>
            </span>
        </div>
        
        
        <h5 class="w-100 text-center  mt-1 ticketTotal shadow-lg rounded p-2">Total: <b >10000 Dhs</b></h5>
    </section>
    </div>
    
          
      <footer class="my-3 ">
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