<?php
require "../config/conexion.php";
class Categorie
{

  public function store($name, $image)
  {
    $sql = "INSERT INTO categories (name,image,status)
		VALUES ('$name','$image',1)";
    return ejecutarConsulta($sql);
  }

  public function update($id, $name, $image)
  {
    $sql = "UPDATE categories
		SET id='$id',name='$name',image='$image' 
		WHERE id='$id'";
    return ejecutarConsulta($sql);
  }

  public function destroy($id)
  {
    $sql = "DELETE FROM categories  WHERE id='$id'";
    return ejecutarConsulta($sql);
  }

  public function statu($id, $status)
  {
    if ($status == 1) {
      $sql = "UPDATE categories SET status='0' WHERE id='$id'";
    } else {
      $sql = "UPDATE categories SET status='1' WHERE id='$id'";
    }
    return ejecutarConsulta($sql);
  }

  public function show($id)
  {
    $sql = "SELECT id,name,image,status 
		FROM categories
		WHERE id='$id'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function index()
  {
    $sql = "SELECT * FROM categories";
    return ejecutarConsulta($sql);
  }
  public function indexall()
  {
    $sql = "SELECT * FROM categories 
    WHERE status=1";
    return ejecutarConsulta($sql);
  }
  public function selectCategorie()
  {
    $sql = "SELECT id,name FROM categories where status=1";
    return ejecutarConsulta($sql);
  }
}