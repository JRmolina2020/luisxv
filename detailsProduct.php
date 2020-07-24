<?php
include 'navbar.php';
$rproduct = $index->productall($_GET["id"]);
$row = $rproduct->fetch_object();
$id = $row->id;
$ref = $row->ref;
$name = $row->product;
$brand = $row->brand;
$description = $row->description;
$pricetot = $row->price * $row->discount;
$pricetot = $row->price - $pricetot;
$pricetot = number_format($pricetot, 0, '', '.');
$price = number_format($row->price, 0, '', '.');
$discount = number_format($row->discount, 0, '', '.');
$image = $row->image;
?>

<body class="bg">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="index.php">
      <img src="public/images/logo.png" alt="logo" style="width:40px;">
    </a>
  </nav>
  <div class="container">
    <div class="row">
      <div id="img-container" class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
        <img class="card-img-top" <img class="card-img-top"
          <?php echo "<img src='files/products/" . $image . "'width='330' height='250'>"; ?> </div> </div>
      <div class="col-lg-12 col-md-8 col-xs-12 col-sm-12">
        <h5><strong class="text-danger title"><?php echo $name ?></strong></h5>
        <h4><strong>$<?php echo $pricetot ?></strong></h4>
        <div class="card bg-dark text-white">
          <div class="card-body">
            <h5 class="card-title">Descripción</h5>
            <p class="card-text text-justify"><?php echo $description ?></p>
          </div>
        </div>
      </div>
      <div class="mt-3">
      </div>
    </div>
    <?php include 'footer.php' ?>