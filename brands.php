<?php include 'header.php';
$rbrands = $index->brands($_GET["id"]);
if (empty($_GET["id"])) {
  header("Location: index.php");
  die();
}
?>

<div class="container">
  <div class="row">
    <?php
    while ($row = $rbrands->fetch_object()) {
      $id = $row->brand_id;
      $name = $row->name;
      $image = $row->image;
    ?>
    <div class="col-lg-3 col-md-4 col-xs-6">
      <div class="shop">
        <div class="shop-img">
          <?php echo "<img width='230' height='160' src='/app/files/brands/" . $image . "'/>"; ?>
        </div>
        <div class="shop-body">
          <h3><?php echo $name ?></h3>
          <a href="<?php echo "/app/details/$id"; ?>" class="cta-btn">Ver más <i
              class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<?php include 'footer.php' ?>