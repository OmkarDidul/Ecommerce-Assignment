<?php include("header2.php");
// session_start();
// session_destroy();
?>

<!doctype html>
<html lang="en">
  <head>

    <title>Home!</title>
  </head>
  <body>
   
  <div class="container mt-5 px-0">
  <div class="row ">
    <div class="col-lg-3">
      <form action="managecart.php" method="POST">
      <div class="card" style="width: 18rem;">
        <img src="https://www.sathya.store/img/product/84z58e3rAR70t1ZG.png" class="card-img-top" alt="...">
            <div class="card-body text-center">
            <h5 class="card-title">Vivo Y22</h5>
              <p class="card-text">Price: Rs.7500</p>
              
              <button type="submit" name="ADD_TO_CART"class="btn btn-info">Add To Cart </button>
              <input type="hidden" name="no" value="1">
            <input type="hidden" name="Item_name" value="Vivo Y22">
            <input type="hidden" name="price" value="7500">
      </div>
     
      </div>
      </form>
    </div>


    <div class="col-lg-3">
      <form action="managecart.php" method="POST">
      <div class="card" style="width: 18rem;">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSml3B5gxnXs564p5IOZzqSVpT5UE6sjlhlLQ&usqp=CAU" class="card-img-top" alt="...">
            <div class="card-body text-center">
            <h5 class="card-title">OPPO A77</h5>
              <p class="card-text">Price: Rs.12000</p>
              
              <button type="submit" name="ADD_TO_CART" class="btn btn-info">Add To Cart </button>
              <input type="hidden" name="no" value="2">
            <input type="hidden" name="Item_name" value="OPPO A77">
            <input type="hidden" name="price" value="12000">
      </div>
     
      </div>
      </form>
    </div>

    <div class="col-lg-3">
      <form action="managecart.php" method="POST">
      <div class="card" style="width: 18rem;">
        <img src="https://www.sathya.store/img/product/DOmSEgDUctNjiWAX.png" class="card-img-top" alt="...">
            <div class="card-body text-center">
            <h5 class="card-title">Redmi Note12</h5>
              <p class="card-text">Price: Rs.13500</p>
              
              <button type="submit" name="ADD_TO_CART" class="btn btn-info">Add To Cart </button>
              <input type="hidden" name="no" value="3">
            <input type="hidden" name="Item_name" value="Redmi Note12">
            <input type="hidden" name="price" value="13500">
      </div>
     
      </div>
      </form>
    </div>


  </div>
  </div>

</body>
</html>