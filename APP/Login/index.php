<html data-bs-theme="dark">
  <head>
    <title> Login </title>
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

  </head>
  <body class="d-flex align-items-center justify-content-center text-light" >

    <div class="shadow-lg rounded-3 d-flex align-items-center gap-5 flex-row divCenter">
      <div class="picture d-none d-md-block">
      </div>

      <form method="post" action="" class="login d-flex flex-column align-items gap-4">

        <div>
          <h1 style="font-size: 3rem;" class="py-2">welcome back!</h1>
          <p>To keep connected with us please login with <br> your personal info</p>
        </div>

        <div class="d-flex flex-column gap-3">
          <div class="input-group mb-3">
            <span class="input-group-text bi bi-person" id="basic-addon1"></span>
              <input type="text" class="form-control" placeholder="Username"
              name="username"
               aria-label="Username" aria-describedby="basic-addon1">
          </div>
  
          <div class="input-group mb-3">
               <span class="input-group-text bi bi-lock" id="basic-addon1"></span>
              <input type="password"
              name="password"
              class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
          </div>
        </div>



        <div>
          <a class="links" href="#">forgot password!</a>
        </div>
        
        <div>
          <button type="submit" class="btn2 rounded-3 w-100">Login</button>
        </div>

        <div class="d-flex align-items-center gap-2 py-2">
          <span>Don't have an account?</span>
          <div>
          <a class="btn1" href="../Signup/index.php">Sign up now</a>
          </div>
        </div>

      </form>

    </div>


    <?php include "login.php" ?>

  </body>

  <!--  our script-->
  <script src='./script.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>