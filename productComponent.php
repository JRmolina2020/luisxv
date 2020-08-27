<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="products-tabs">
            <div id="tab1" class="tab-pane active">
              <div class="products-slick" data-nav="#slick-nav-1">
                <?php
                while ($row = $rcategorie->fetch_object()) {
                  $id = $row->id;
                  $name = $row->name;
                  $image = $row->image;
                ?>
                <div class="product">
                  <div class="product-img">
                    <?php echo "<img  src='files/categories/" . $image . "'/>"; ?>
                    <div class="product-label">
                      <span class="new">LUIS-XV</span>
                    </div>
                  </div>
                  <div class="product-body">
                    <h3 class="product-name"> <a href="<?php echo "brands?id=$id"; ?>"><?php echo $name ?></a></h3>
                    <a class="primary-btn cta-btn" href="<?php echo "brands/$id"; ?>">Ver más</a>
                  </div>
                </div>

                <?php } ?>
              </div>
              <div id="slick-nav-1" class="products-slick-nav"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php' ?>