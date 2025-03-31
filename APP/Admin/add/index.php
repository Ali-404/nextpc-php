<html data-bs-theme="dark">
  <head>
    <title> Add Product </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset=UTF-8">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-  QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--  icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- style -->
    <link rel="stylesheet" href="../../cssForAll.css">

  <script src='../../jsForAll.js'></script>
  
  </head>
  <style>
    body{
      background: url(../../../assets/pattern.png);
      background-size: 20%;
    }
  </style>
  <body >

      <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <form enctype="multipart/form-data" action="ajouter.php" method="post" class="shadow p-5 w-100 text-bg-dark rounded">
          <h1>Add Product</h1>

        <label class="form-label" class="form-label" for="">Categorie</label>
          <select required class="form-select" name="categorie" id="">
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
          <input name="name" required class="form-control" type="text">

          <label class="form-label" for="">Description</label>
          <textarea name="description" required class="form-control" type="text" rows="10" maxlength="250"></textarea>

          <label  class="form-label" for="">Old Price</label>
          <input name="oldPrice" required class="form-control" type="number">

          <label class="form-label" for="">Price</label>
          <input name="price" required class="form-control" type="number">

          <label class="form-label" for="">Stock</label>
          <input name="stock" required class="form-control" type="number">

          <label class="form-label" for="">PC?</label>  
          <input name="isPC" class="form-check-input" class="btn btn-primary" type="checkbox" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          <br>
          <div class="collapse" id="collapseExample">
            <div class="d-flex flex-column gap-3 p-3 ">
              <label for="" class="form-label">PC Information</label>
              <input name="cpu" class="form-control" type="text" placeholder="Cpu">
              <input name="motherboard" class="form-control" type="text" placeholder="Mothercard">
              <input name="case" class="form-control" type="text" placeholder="Case">
              <input name="psu" class="form-control" type="text" placeholder="Psu">
              <input name="gpu" class="form-control" type="text" placeholder="Gpu">
              <input name="ram" class="form-control" type="text" placeholder="Ram">
              <input name="storage" class="form-control" type="text" placeholder="Storage">
            </div>
          </div>

          <label class="form-label" for="">Cover Image</label>
          <input  required class="form-control" type="file" accept="image/png,image/jpg,image/jpeg" name="cover" >      
          
          <div class="py-3 w-100 d-flex gap-2">
            <button type="submit"  class="btn btn-success bi bi-plus"> Add Product</button>
            <button type="reset" class="btn btn-warning bi bi-x-lg"> Reset</button>
            <a href="../index.php" class="btn btn-danger bi bi-arrow-left"> Cancel</a>
          </div>
        </form>
      </div>
  
    </div>

  </body>

  <!--  our script-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>