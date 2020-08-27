<?php
require_once "../model/User.php";
$users = new User();
$id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
$name = isset($_POST["name"]) ? limpiarCadena($_POST["name"]) : "";
$surname = isset($_POST["surname"]) ? limpiarCadena($_POST["surname"]) : "";
$email = isset($_POST["email"]) ? limpiarCadena($_POST["email"]) : "";
$password = isset($_POST["password"]) ? limpiarCadena($_POST["password"]) : "";
$role = isset($_POST["role"]) ? limpiarCadena($_POST["role"]) : "";
$image = isset($_POST["image"]) ? limpiarCadena($_POST["image"]) : "";
switch ($_GET["op"]) {
	case 'store':
		if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
			$image = $_POST["imagenactual"];
		} else {
			$ext = explode(".", $_FILES["image"]["name"]);
			if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
				$image = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["image"]["tmp_name"], "../files/users/" . $image);
			}
		}
		$passwordsha = md5(sha1($password));
		if (empty($id)) {
			$rspta = $users->store($name, $surname, $email, $passwordsha, $role, $image);
			echo $rspta ? "El usuario ha sido registrado" : "El usuario no se pudo registrar";
		} else {
			$rspta = $users->update($id, $name, $surname, $email, $passwordsha, $role, $image);
			echo $rspta ? "El usuario ha sido actualizado" : "El usuario no se pudo actualizar";
		}
		break;

	case 'destroy':
		$rspta = $users->destroy($id);
		echo $rspta ? "El usuario ha sido eliminado" : "El usuario no se pudo eliminar";
		break;

	case 'status':
		$status = $_POST["status"];
		$rspta = $users->statu($id, $status);
		echo $rspta ? "Usuario desactivado" : "El usuario no se pudo desactivar";
		break;

	case 'show':
		$rspta = $users->show($id);
		echo json_encode($rspta);
		break;
	case 'index':
		$rspta = $users->index();
		$data = array();
		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0" =>
				'<button class="btn btn-success btn-xs" onclick="show(' . $reg->id . ')">
	 				<i class="fa fa-pencil"></i></button>' .
					' <button class="btn btn-danger btn-xs"  onclick="destroy(' . $reg->id . ')">
	                <i class="fa fa-trash"></i></button>',
				"1" => $reg->name,
				"2" => $reg->surname,
				"3" => $reg->email,
				"11" => ($reg->status == 1) ?
					'<span  class="label label-success">Administrador</span>' :
					'<span  class="label label-danger">Asistente</span>',
				"5" => "<img src='../files/users/" . $reg->image . "' height='50px' width='50px' >",
				"6" => ($reg->status == 1) ?
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
	case 'login':
		$logina = $_POST['logina'];
		$clavea = $_POST['clavea'];
		$clavehash = md5(sha1($clavea));
		$rspta = $users->login($logina, $clavehash);
		$fetch = $rspta->fetch_object();
		if (isset($fetch)) {
			$_SESSION['id'] = $fetch->id;
			$_SESSION['name'] = $fetch->name;
			$_SESSION['surname'] = $fetch->surname;
			$_SESSION['email'] = $fetch->email;
			$_SESSION['role'] = $fetch->role;
			$_SESSION['image'] = $fetch->image;
		}
		echo json_encode($fetch);
		break;
	case 'exit':
		session_unset();
		session_destroy();
		header("Location: ../");
		break;
		exit;
}