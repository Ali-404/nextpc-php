<html data-bs-theme="dark">
  <head>
    <title> Add Product </title>
    <meta id="viewport" content="width=device-width, initial-scale=1">
    <meta charset=UTF-8">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-  QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--  icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- style -->
    <link rel="stylesheet" href="../../cssForAll.css">
    <link rel="stylesheet" href="style.css">
    <script src="../../../jquery-3.7.1.min.js"></script>


  <script src='../../jsForAll.js'></script>
  
  </head>
  <style>
    body{
      background: url(../../../assets/pattern.png);
      background-size: 20%;
    }
  </style>
  <body >

      <div class="container d-flex flex-column align-items-s-center justify-content-center min-vh-100 position-relative">

      <table class="table table-striped shadow rounded">
        <thead>
          <tr>
             <th>id</th>
             <th>name</th>
             <th>description</th>
             <th>price</th>
             <th>old price</th>
             <th>stock</th>
             <th>PC?</th>
             <th>Pc Info</th>
             <th>Cover</th>
             <th>Categorie</th>
             <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-striped" id="tbody">
          
        </tbody>
      </table>
      <div>
        <a href="../index.php" class="btn btn-danger bi bi-arrow-left"> Back</a>
      </div>
     


        <form id="updateForm" enctype="multipart/form-data" action="update.php" method="post" class="hidden position-absolute top-0 start-0  shadow p-5 w-100 text-bg-dark rounded">
          <h1>Add Product</h1>

          <label class="form-label" for="">Id</label>
          <input id="id" name="id" class="form-control" type="text" readonly>

        <label class="form-label" class="form-label" for="">Categorie</label>
          <select required class="form-select" id="categorie" name="categorie" >
            <option value="">Select Product Categorie</option>
            <option value="1">PC Gamer</option>
            <option value="2">Motherboard</option>
            <option value="3">GPU</option>
            <option value="4">CPU</option>
            <option value="5">RAM</option>
            <option value="6">Power Supply</option>
            <option value="7">Monitors</option>
            <option value="8">Accessories</option>
          </select>
          

          <label class="form-label" for="">Name</label>
          <input id="name" name="name" required class="form-control" type="text">
          

          <label class="form-label" for="">Description</label>
          <textarea id="description" name="description" required class="form-control" type="text" rows="10" maxlength="250"></textarea>

          <label  class="form-label" for="">Old Price</label>
          <input id="oldPrice" name="oldPrice" required class="form-control" type="number">

          <label class="form-label" for="">Price</label>
          <input id="price" name="price" required class="form-control" type="number">

          <label class="form-label" for="">Stock</label>
          <input id="stock" name="stock" required class="form-control" type="number">

          <label class="form-label" for="">PC?</label>  
          <input id="isPC" name="isPC"  class="form-check-input" class="btn btn-primary" type="checkbox" onchange="formPCINFO(event)">
          <br>
          <div class="hidden" id="collapseExample">
            <div class="d-flex flex-column gap-3 p-3 ">
              <label for="" class="form-label">PC Information</label>
              <input id="cpu" name="cpu" class="form-control" type="text" placeholder="Cpu">
              <input id="motherboard" name="motherboard" class="form-control" type="text" placeholder="Mothercard">
              <input id="case" name="case" class="form-control" type="text" placeholder="Case">
              <input id="psu" name="psu" class="form-control" type="text" placeholder="Psu">
              <input id="gpu" name="gpu" class="form-control" type="text" placeholder="Gpu">
              <input id="ram" name="ram" class="form-control" type="text" placeholder="Ram">
              <input id="storage" name="storage" class="form-control" type="text" placeholder="Storage">
            </div>
          </div>

          <label class="form-label" for="">Cover Image</label><br>
          <img src="" alt="" id="img" style="max-width: 200px;object-fit: contain;">
          <input class="form-control" type="file" accept="image/png,image/jpg,image/jpeg" id="cover" name="cover" >      
          
          <div class="py-3 w-100 d-flex gap-2">
            <button type="submit"  class="btn btn-success bi bi-cloud-arrow-up"> Save</button>
            <button type="button" onclick="toggleForm()" class="btn btn-danger bi bi-arrow-left"> Cancel</button>
          </div>
        </form>
      </div>


      <div class="alert-container hidden" id="alert">
        <div class="text-bg-light p-3 rounded shadow" style="max-width: 400px;min-width: 40vw;">
          <h1 class="w-100 text-center">Attention</h1>
          <h5 class="w-100 text-center">Do you want to delete ?</h5>
          <hr class="w-100">
          <div>
            <button id="alert-yes" class="btn btn-danger">Yes</button>
            <button class="btn btn-primary" onclick="toggleAlert()">Cancel</button>
          </div>
        </div>
      </div>

    </div>

  </body>

  <script src="script.js"></script>
  <!--  our script-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>