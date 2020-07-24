<?php include 'navbar.php' ?>

<body class="bg">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="index.php">
      <img src="public/images/logo.png" alt="logo" style="width:40px;">
    </a>
  </nav>
  <div class="container">
    <div class="row mt-5">
      <?php
      while ($row = $rcategorie->fetch_object()) {
        $id = $row->id;
        $name = $row->name;
        $image = $row->image;
      ?>
      <div class="col-lg-3 col-md-4 col-xs-12 col-sm-6">
        <div class="card text-center" style="width: 14rem;">
          <img class="card-img-top" <?php echo "<img src='files/categories/" . $image . "'width='330' height='250'>"; ?>
            <div class="card-body">
          <a href="<?php echo "details.php?id=$id"; ?>" class="btn btn-danger btn-sm"><?php echo $name ?></a>
        </div>
      </div>
      <div class="mt-3"></div>
    </div>
    <?php } ?>
  </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>