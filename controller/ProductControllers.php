<?php
require_once "../model/Product.php";
$products = new Product();
$id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
$category_id = isset($_POST["category_id"]) ? limpiarCadena($_POST["category_id"]) : "";
$ref = isset($_POST["ref"]) ? limpiarCadena($_POST["ref"]) : "";
$name = isset($_POST["name"]) ? limpiarCadena($_POST["name"]) : "";
$brand = isset($_POST["brand"]) ? limpiarCadena($_POST["brand"]) : "";
$price = isset($_POST["price"]) ? limpiarCadena($_POST["price"]) : "";
$discount = isset($_POST["discount"]) ? limpiarCadena($_POST["discount"]) : "";
$description = isset($_POST["description"]) ? limpiarCadena($_POST["description"]) : "";
$image = isset($_POST["image"]) ? limpiarCadena($_POST["image"]) : "";
switch ($_GET["op"]) {
  case 'store':
    if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
      $image = $_POST["imagenactual"];
    } else {
      $ext = explode(".", $_FILES["image"]["name"]);
      if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
        $image = round(microtime(true)) . '.' . end($ext);
        move_uploaded_file($_FILES["image"]["tmp_name"], "../files/products/" . $image);
      }
    }
    if (empty($id)) {
      $rspta = $products->store($category_id, $ref, $name, $brand, $price, $discount, $description, $image);
      echo $rspta ? "El producto ha sido registrrado" : "El producto no se pudo registrar";
    } else {
      $rspta = $products->update($id, $category_id, $ref, $name, $brand, $price, $discount, $description, $image);
      echo $rspta ? "El producto ha sido actualizado" : "El producto no se pudo actualizar";
    }
    break;

  case 'destroy':
    $rspta = $products->destroy($id);
    echo $rspta ? "El producto ha sido eliminado" : "El producto no se pudo eliminar";
    break;

  case 'status':
    $status = $_POST["status"];
    $rspta = $products->statu($id, $status);
    echo $rspta ? "Producto desactivado" : "El producto no se pudo desactivar";
    break;
  case 'show':
    $rspta = $products->show($id);
    echo json_encode($rspta);
    break;
  case 'index':
    $rspta = $products->index();
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      $price = number_format($reg->price, 0, '', '.');
      $data[] = array(
        "0" =>
        '<button class="btn btn-success btn-xs" onclick="show(' . $reg->id . ')">
	 				<i class="fa fa-pencil"></i></button>' .
          ' <button class="btn btn-danger btn-xs"  onclick="destroy(' . $reg->id . ')">
	                <i class="fa fa-trash"></i></button>',
        "1" => $reg->categorie,
        "2" => $reg->ref,
        "3" => $reg->product,
        "4" => $reg->brand,
        "5" => $price,
        "6" => $reg->discount,
        "7" => "<img src='../files/products/" . $reg->image . "' height='50px' width='50px' >",
        "8" => ($reg->status == 1) ?
          '<span onclick="statu(' . $reg->id . ',' . $reg->status . ')"class="label label-success">Activo</span>' :
          '<span onclick="statu(' . $reg->id . ',' . $reg->status . ')"class="label label-danger">bloqueado</span>'
      );
    }
    $results = array(
      "sEcho" => 1,
      "iTotalRecords" => count($data),
      "iTotalDisplayRecords" => count($data),
      "aaData" => $data
    );
    echo json_encode($results);
    break;
  case "selectCategorie":
    require_once "../model/Categorie.php";
    $categorie = new Categorie();
    $rspta = $categorie->selectCategorie();
    while ($reg = $rspta->fetch_object()) {
      echo '<option value=' . $reg->id . '>' . $reg->name . '</option>';
    }
    break;

    exit;
}