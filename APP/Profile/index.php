<html data-bs-theme="dark">
  <head>
    <title> Profile </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-  QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--  icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- style -->
    <link rel="stylesheet" href="./style.css">
    <script src="../../jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="../cssForAll.css">
  </head>
  <body class="d-flex flex-column gap-3">

   

    <section class="p-5">
      <div class="head d-flex align-items-center">
        <div class="profilePic">A</div>

        <div class="info">
          <h1>Username</h1>
          <p class="text-secondary-emphasis">0612345678</p>
          <p class="text-secondary-emphasis">username12@gmail.com</p>
        </div>
      </div>

      <div class="d-flex align-items-center">

        

        <div id="fav" class="ordFav" >
          <span class=" bi bi-heart-fill"></span>
          <span class="">Favorites</span>
        </div>
        
      </div>
      <div class="pagesContainer">
         
 
         <div id="page2"  class="page  d-flex flex-column align-items-center gap-3">
            <h1>Favorites</h1>
            <div class="w-100 d-flex align-items-center flex-wrap gap-3 justify-content-start favContainer" style="max-height: 100vh;">
            
           
             
              
            </div>
         </div>
      </div>

      
    </section>
   


    <div class="w-100 d-flex align-items-center justify-content-center gap-3 py-3">
      <a href="../home/" class="btn btn-primary bi bi-arrow-left "> BACK</a>
      <a href="" onclick="requestLogout()" class="btn btn-danger bi bi-door-closed "> Logout</a>
    </div>
  </body>

  <!--  our script-->
  <script src='./script.js'></script>
  <script src='../jsForAll.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>