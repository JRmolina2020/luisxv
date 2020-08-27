<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  require_once "../model/Product.php";
  $products = new Product();
  $id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
  $category_id = isset($_POST["category_id"]) ? limpiarCadena($_POST["category_id"]) : "";
  $ref = isset($_POST["ref"]) ? limpiarCadena($_POST["ref"]) : "";
  $name = isset($_POST["name"]) ? limpiarCadena($_POST["name"]) : "";
  $brand_id = isset($_POST["brand_id"]) ? limpiarCadena($_POST["brand_id"]) : "";
  $price = isset($_POST["price"]) ? limpiarCadena($_POST["price"]) : "";
  $discount = isset($_POST["discount"]) ? limpiarCadena($_POST["discount"]) : "";
  $description = isset($_POST["description"]) ? limpiarCadena($_POST["description"]) : "";
  $specs = isset($_POST["specs"]) ? limpiarCadena($_POST["specs"]) : "";
  $embed = isset($_POST["embed"]) ? limpiarCadena($_POST["embed"]) : "";
  $image = isset($_POST["image"]) ? limpiarCadena($_POST["image"]) : "";
  $image2 = isset($_POST["image2"]) ? limpiarCadena($_POST["image2"]) : "";
  $image3 = isset($_POST["image3"]) ? limpiarCadena($_POST["image3"]) : "";
  switch ($_GET["op"]) {
    case 'store':
      include './imageProduct.php';
      if (empty($id)) {
        $rspta = $products->store($category_id, $ref, $name, $brand_id, $price, $discount, $description, $specs, $embed, $image, $image2, $image3);
        echo $rspta ? "El producto ha sido registrrado" : "El producto no se pudo registrar";
      } else {
        $rspta = $products->update($id, $category_id, $ref, $name, $brand_id, $price, $discount, $description, $specs, $embed, $image, $image2, $image3);
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
          "7" => $reg->subcategorie,
          "8" => "<img src='../files/products/" . $reg->image . "' height='50px' width='50px' >",
          "9" => ($reg->image2) ?
            "<img src='../files/products/" . $reg->image2 . "' height='50px' width='50px' >" :
            "<span class='label label-warning'>Sin imagen</span>",
          "10" => ($reg->image3) ?
            "<img src='../files/products/" . $reg->image3 . "' height='50px' width='50px' >" :
            "<span class='label label-warning'>Sin imagen</span>",
          "11" => ($reg->status == 1) ?
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
    case "selectBrands":
      require_once "../model/Brands.php";
      $brand_ids = new Brands();
      $rsptab = $brand_ids->selectBrands();
      while ($regb = $rsptab->fetch_object()) {
        echo '<option value=' . $regb->id . '>' . $regb->name . '</option>';
      }
      break;

      exit;
  }
} else {
  header("HTTP/1.0 403 Forbidden");
  exit;
}