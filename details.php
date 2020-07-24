<?php
include 'navbar.php';
$rproduct = $index->product($_GET["id"]);
?>

<body class="bg">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="index.php">
      <img src="public/images/logo.png" alt="logo" style="width:40px;">
    </a>
  </nav>
  <div class="container">
    <div class="row mt-5">
      <?php
      while ($row = $rproduct->fetch_object()) {
        $id = $row->id;
        $ref = $row->ref;
        $name = $row->product;
        $brand = $row->brand;
        $description = $row->description;
        $price = number_format($row->price, 0, '', '.');
        $discount = number_format($row->discount, 0, '', '.');
        $image = $row->image;
      ?>
      <div class="col-lg-3 col-md-4 col-xs-12 col-sm-6">
        <div class="card text-center" style="width: 14rem;">
          <img class="card-img-top" <?php echo "<img src='files/products/" . $image . "'width='330' height='250'>"; ?>
            <div class="card-body">
          <p><strong><?php echo $name ?></strong></p>
          <p><span class="badge badge-pill badge-light"><?php echo $brand; ?></span></p>
          <a href="<?php echo "detailsProduct.php?id=$id"; ?>" class="btn btn-danger btn-sm">Especificaciones</a>
        </div>
      </div>
      <div class="mt-3"></div>
    </div>
    <?php } ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>