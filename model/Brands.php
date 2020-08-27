<?php
require "../config/conexion.php";
class Brands
{

  public function store($name, $image)
  {
    $sql = "INSERT INTO brands (name,image,status)
		VALUES ('$name','$image',1)";
    return ejecutarConsulta($sql);
  }

  public function update($id, $name, $image)
  {
    $sql = "UPDATE brands
		SET id='$id',name='$name',image='$image' 
		WHERE id='$id'";
    return ejecutarConsulta($sql);
  }

  public function destroy($id)
  {
    $sql = "DELETE FROM brands  WHERE id='$id'";
    return ejecutarConsulta($sql);
  }

  public function statu($id, $status)
  {
    if ($status == 1) {
      $sql = "UPDATE brands SET status='0' WHERE id='$id'";
    } else {
      $sql = "UPDATE brands SET status='1' WHERE id='$id'";
    }
    return ejecutarConsulta($sql);
  }

  public function show($id)
  {
    $sql = "SELECT id,name,image,status 
		FROM brands
		WHERE id='$id'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function index()
  {
    $sql = "SELECT * FROM brands";
    return ejecutarConsulta($sql);
  }
  public function indexall()
  {
    $sql = "SELECT * FROM brands 
    WHERE status=1";
    return ejecutarConsulta($sql);
  }
  public function selectBrands()
  {
    $sql = "SELECT id,name FROM brands where status=1";
    return ejecutarConsulta($sql);
  }
}