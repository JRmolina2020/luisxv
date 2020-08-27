<?php
require "../config/conexion.php";
class Categorie
{

  public function store($name, $image, $categorie)
  {
    $sql = "INSERT INTO categories (name,image,status,categorie)
		VALUES ('$name','$image',1,'$categorie')";
    return ejecutarConsulta($sql);
  }

  public function update($id, $name, $image, $categorie)
  {
    $sql = "UPDATE categories
		SET id='$id',
    name='$name',
    image='$image',
    categorie='$categorie' 
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
    $sql = "SELECT id,name,categorie,image,status 
		FROM categories
		WHERE id='$id'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function index()
  {
    $sql = "SELECT * FROM categories 
      ORDER BY id DESC";
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