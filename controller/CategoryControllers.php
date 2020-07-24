<?php
require_once "../model/Categorie.php";
$categories = new Categorie();
$id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
$name = isset($_POST["name"]) ? limpiarCadena($_POST["name"]) : "";
$image = isset($_POST["image"]) ? limpiarCadena($_POST["image"]) : "";
switch ($_GET["op"]) {
  case 'store':
    if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
      $image = $_POST["imagenactual"];
    } else {
      $ext = explode(".", $_FILES["image"]["name"]);
      if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
        $image = round(microtime(true)) . '.' . end($ext);
        move_uploaded_file($_FILES["image"]["tmp_name"], "../files/categories/" . $image);
      }
    }
    if (empty($id)) {
      $rspta = $categories->store($name, $image);
      echo $rspta ? "La categoria ha sido registrada" : "La categoria no se pudo registrar";
    } else {
      $rspta = $categories->update($id, $name, $image);
      echo $rspta ? "La categoria ha sido actualizada" : "La categoria no se pudo actualizar";
    }
    break;

  case 'destroy':
    $rspta = $categories->destroy($id);
    echo $rspta ? "La categoria ha sido eliminada" : "La categoria no se pudo eliminar";
    break;

  case 'status':
    $status = $_POST["status"];
    $rspta = $categories->statu($id, $status);
    echo $rspta ? "Categoria desactivada" : "La categoria no se pudo desactivar";
    break;
  case 'show':
    $rspta = $categories->show($id);
    echo json_encode($rspta);
    break;
  case 'index':
    $rspta = $categories->index();
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      $data[] = array(
        "0" =>
        '<button class="btn btn-success btn-xs" onclick="show(' . $reg->id . ')">
	 				<i class="fa fa-pencil"></i></button>' .
          ' <button class="btn btn-danger btn-xs"  onclick="destroy(' . $reg->id . ')">
	                <i class="fa fa-trash"></i></button>',
        "1" => $reg->name,
        "2" => "<img src='../files/categories/" . $reg->image . "' height='50px' width='50px' >",
        "3" => ($reg->status == 1) ?
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

    exit;
}