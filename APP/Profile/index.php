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

        <div id="orders" class="ordFav active" onclick="changePage()">
          <span class=" bi bi-bag-fill"></span>
          <span class="">Orders</span>
        </div>

        <div id="fav" class="ordFav" onclick="changePage()">
          <span class=" bi bi-heart-fill"></span>
          <span class="">Favorites</span>
        </div>
        
      </div>
      <div class="pagesContainer">
         <div id="page1" class="page ">
           <div class="ordersContainer gap-3">
            <h1>Orders</h1>
              <div class="order shadow text-bg-light p-5 rounded" >
                <h3>BLA BLA BLA (x1)</h3>
                <div class="w-100 d-flex align-items-center justify-content-between">
                  <div class="info">
                    <span>1</span>
                    <span>2</span> 
                    <span>3</span>
                  </div>
                  <div class="info">
                    <span>1</span>
                    <span>2</span>
                    <span>3</span>
                  </div>
                </div>
                <hr class="w-100">
                <span class="w-100 text-center">Total : 400Dhs</span>
                <h4 class="status shadow">On Route</h4>
              </div>
              
              
              
              
           </div>
           
 
         </div>
 
         <div id="page2"  class="page hidden d-flex flex-column align-items-center gap-3">
            <h1>Favorites</h1>
            <div class="w-100 d-flex align-items-center flex-wrap gap-3 justify-content-start favContainer" style="max-height: 100vh;">
            
           
             
              
            </div>
         </div>
      </div>

      
    </section>
   


    <div class="w-100 d-flex align-items-center justify-content-center gap-3 py-3">
      <a href="../home/" class="btn btn-primary bi bi-arrow-left "> BACK</a>
      <a href="" onclick="requestLogout()" class="btn btn-danger bi bi-door-closed "> Logout</a>
      <a href="../home/" class="btn btn-outline-danger bi bi-trash "> Delete Account</a>
    </div>
  </body>

  <!--  our script-->
  <script src='./script.js'></script>
  <script src='../jsForAll.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>