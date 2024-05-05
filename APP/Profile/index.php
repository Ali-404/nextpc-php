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
    <link rel="stylesheet" href="../cssForAll.css">
  </head>
  <body>

    <section class="p-5">
      <div class="head d-flex align-items-center">
        <div class="profilePic">A</div>

        <div class="info">
          <h1>Username</h1>
          <p class="text-secondary-emphasis">0612345678</p>
          <p class="text-secondary-emphasis">username12@gmail.com</p>
          <button class="editBtn">Edit</button>
        </div>
      </div>

      <div class="d-flex align-items-center">

        <div id="orders" class="ordFav">
          <span class="text-secondary bi bi-bag-fill"></span>
          <span class="text-secondary">Orders</span>
        </div>

        <div id="fav" class="ordFav">
          <span class="text-secondary bi bi-heart-fill"></span>
          <span class="text-secondary">Favorites</span>
        </div>

      </div>

      <div class="border border-bottom-0 min-vh-100">

        <h>
          <span class="bi bi-border-width"></span>
          <h3>Send </h3>
        </h>

      </div>

    </section>

    <p class="joined text-secondary">Joined May,2023</p>

  </body>

  <!--  our script-->
  <script src='./script.js'></script>
  <script src='../jsForAll.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>