<?php
include 'header.php';
$rproduct = $index->productall($_GET["id"]);
if (empty($_GET["id"])) {
  header("Location: index.php");
  die();
}
?>

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-md-push-2">
        <?php
        $row = $rproduct->fetch_object();
        $id = $row->id;
        $ref = $row->ref;
        $name = $row->product;
        $description = $row->description;
        $specs = $row->specs;
        $embed = $row->embed;
        $price = number_format($row->price, 0, '', '.');
        $price_ac = $row->price * $row->discount;
        $price_ac = $row->price - $price_ac;
        $price_ac = number_format($price_ac, 0, '', '.');
        $image = $row->image;
        $image2 = $row->image2;
        $image3 = $row->image3;
        ?>
        <div id="product-main-img">
          <div class="product-preview">
            <?php echo "<img  src='/app/files/products/" . $image . "'/>"; ?>
          </div>
          <?php if ($image2) { ?>
          <div class="product-preview">
            <?php echo "<img  src='/app/files/products/" . $image2 . "'/>"; ?>
          </div>
          <?php } ?>
          <?php if ($image3) { ?>
          <div class="product-preview">
            <?php echo "<img  src='/app/files/products/" . $image3 . "'/>"; ?>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-md-2 col-md-pull-5">
        <div id="product-imgs">
          <div class="product-preview">
            <?php echo "<img  src='/app/files/products/" . $image . "'/>"; ?>
          </div>
          <?php if ($image2) { ?>
          <div class="product-preview">
            <?php echo "<img  src='/app/files/products/" . $image2 . "'/>"; ?>
          </div>
          <?php } ?>
          <?php if ($image3) { ?>
          <div class="product-preview">
            <?php echo "<img  src='/app/files/products/" . $image3 . "'/>"; ?>
          </div>
          <?php } ?>
        </div>
        <br>
      </div>
      <div class="col-md-5">
        <div class="product-details">
          <h2 class="product-name"><?php echo $name ?></h2>
          <span>REF:<?php echo $ref ?></span>
          <div>
            <h3 class="product-price">
              $<?php echo $price_ac ?> <?php if ($row->discount > 0) { ?><del
                class="product-old-price">$<?php echo $price ?><?php } ?></del>
            </h3>
            <div class="section-nav">
              <ul class="section-tab-nav tab-nav">
                <li class="active"><a data-toggle="tab" href="#tab1">Información</a></li>
                <li><a data-toggle="tab" href="#tab2">Especificaciones</a></li>
                <li><a data-toggle="tab" href="#tab3">Video</a></li>
              </ul>
            </div>
            <div class="products-tabs">
              <div id="tab1" class="tab-pane active">
                <br>
                <div id="float-cta">
                  <span>Envianos un whatsapp!</span>
                  <a href="javascript:void(0);">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </a>
                  <div class="whatsapp-msg-container">
                    <div class="whatsapp-msg-header">
                      <h6>WhatsApp Chat</h6>
                    </div>
                    <div class="whatsapp-msg-body">
                      <textarea name="whatsapp-msg" class="whatsapp-msg-textarea"
                        placeholder="Hola, puedes consultar vía whatsapp..."></textarea>
                    </div>
                    <div class="whatsapp-msg-footer">
                      <button type="button" class="btn-whatsapp-send">Enviar</button>
                    </div>
                  </div>
                </div>
                <p class="product-description">
                  <?php
                  echo nl2br($description);
                  ?>
                </p>
              </div>
              <div id="tab2" class="tab-pane">
                <br>
                <p class="product-description">
                  <?php echo nl2br($specs) ?>
                </p>
              </div>
              <div id="tab3" class="tab-pane">
                <br>
                <?php if ($embed) { ?>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $embed ?>?rel=0"
                    allowfullscreen></iframe>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>