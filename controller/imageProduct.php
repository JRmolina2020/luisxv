<?php
if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
  $image = $_POST["imagenactual"];
} else {
  $ext = explode(".", $_FILES["image"]["name"]);
  if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
    $image = round(microtime(true)) . '.' . end($ext);
    move_uploaded_file($_FILES["image"]["tmp_name"], "../files/products/" . $image);
  }
}
if (!file_exists($_FILES['image2']['tmp_name']) || !is_uploaded_file($_FILES['image2']['tmp_name'])) {
  $image2 = $_POST["imagenactual2"];
} else {
  $ext = explode(".", $_FILES["image2"]["name"]);
  if ($_FILES['image2']['type'] == "image/jpg" || $_FILES['image2']['type'] == "image/jpeg" || $_FILES['image2']['type'] == "image/png") {
    $image2 = round(microtime(true) * 2) . '.' . end($ext);
    move_uploaded_file($_FILES["image2"]["tmp_name"], "../files/products/" . $image2);
  }
}

if (!file_exists($_FILES['image3']['tmp_name']) || !is_uploaded_file($_FILES['image3']['tmp_name'])) {
  $image3 = $_POST["imagenactual3"];
} else {
  $ext = explode(".", $_FILES["image3"]["name"]);
  if ($_FILES['image3']['type'] == "image/jpg" || $_FILES['image3']['type'] == "image/jpeg" || $_FILES['image3']['type'] == "image/png") {
    $image3 = round(microtime(true) * 3) . '.' . end($ext);
    move_uploaded_file($_FILES["image3"]["tmp_name"], "../files/products/" . $image3);
  }
}