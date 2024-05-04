<html data-bs-theme="dark">
  <head>
    <title> Sign Up </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset=UTF-8">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-  QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--  icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- style -->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../cssForAll.css">
  </head>
  <body class="d-flex align-items-center justify-content-center text-light" >

    <div class="shadow-lg rounded-3 d-flex align-items-center gap-5 flex-row divCenter">
      <div class="picture d-none d-md-block">
      </div>

      <div class="login d-flex flex-column align-items gap-4">

        <div>
          <h1 style="font-size: 3rem;" class="py-2">Hello, Friend!</h1>
          <p>Enter your personal details and start journey <br> with us</p>
        </div>

        <div class="d-flex flex-column gap-2">
          <div class="input-group mb-3">
              <span class="input-group-text bs bi bi-person" id="basic-addon1"></span>
              <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
          </div>

          <div class="input-group mb-3">
              <span class="input-group-text bs bi bi-envelope" id="basic-addon1"></span>
              <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
          </div>

          <div class="input-group mb-3">
              <span class="input-group-text bs bi bi-telephone" id="basic-addon1"></span>
              <input type="tel" class="form-control" placeholder="+212" aria-label="Phone" aria-describedby="basic-addon1">
          </div>
  
          <div class="input-group mb-3">
              <span class="input-group-text bi bi-lock" id="basic-addon1"></span>
              <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
          </div>

          <div class="input-group mb-3">
              <span class="input-group-text bi bi-lock" id="basic-addon1"></span>
              <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Password" aria-describedby="basic-addon1">
          </div>

        </div>

        <div class="wrapper d-flex align-items-center justify-content-center gap-3">
          <li class="icon facebook">
            <span class="tooltip">Facebook</span>
            <span class="bi bi-facebook"></span>
          </li>
          <li class="icon google">
            <span class="tooltip">Google</span>
            <span class="bi bi-google"></span>
          </li>
          <li class="icon github">
            <span class="tooltip">github</span>    
            <span class="bi bi-github"></span>
          </li>
        </div>
        
        <div>
          <a class="btn2 rounded-3">Sign Up</a>
        </div>

        <div class="d-flex align-items-center gap-2 py-2">
          <span>You are already member</span>
          <div>
          <a class="btn1" href="#">Log In</a>
          </div>
        </div>

      </div>

    </div>

  </body>

  <!--  our script-->
  <script src='./script.js'></script>
  <script src='../jsForAll.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>