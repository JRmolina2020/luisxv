<?php
require "../config/conexion.php";
class FileActivity
{
  public function __construct()
  {
  }
  public function insertar($name, $description, $file, $person, $user_id)
  {
    $sql = "INSERT INTO activity (name,description,file,person,status,user_id)
		VALUES('$name','$description','$file','$person','1','$user_id')";
    return ejecutarConsulta($sql);
  }
  public function update($id, $name, $description, $file, $person)
  {
    $sql = "UPDATE activity SET id='$id',name='$name',description='$description',file='$file',person='$person'
		WHERE id='$id'";
    return ejecutarConsulta($sql);
  }
  public function index($id)
  {
    $sql = "SELECT id,name,description,file,status,nombre,apellido,fecha,time,person
		FROM activity A
		INNER JOIN usuario U
		ON U.idusuario= A.user_id
		WHERE user_id ='$id'
		ORDER BY id desc";
    return ejecutarConsulta($sql);
  }
  public function index2()
  {
    $sql = "SELECT id,name,description,file,status,nombre,apellido,person
		FROM activity A
		INNER JOIN usuario U
		ON U.idusuario= A.user_id
		ORDER BY id desc";
    return ejecutarConsulta($sql);
  }
  public function show($id)
  {
    $sql = "SELECT id,name,file,description,person FROM activity WHERE id='$id'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function remove($id)
  {
    $sql = "DELETE FROM activity  WHERE id='$id'";
    return ejecutarConsulta($sql);
  }

  public function bloquear($id, $status)
  {
    if ($status == 1) {
      $sql = "UPDATE activity  SET status='0' WHERE id='$id'";
    } else {
      $sql = "UPDATE activity SET status='1' WHERE id='$id'";
    }
    return ejecutarConsulta($sql);
  }
}