<?php
require "config/conexion.php";
class IndexAll
{
  public function categorie()
  {
    $sql = "SELECT id,name,image FROM categories 
    WHERE status=1";
    return ejecutarConsulta($sql);
  }

  public function product($id)
  {
    $sql = "SELECT p.id,ref,p.name as product,brand,price,discount,description,p.image,p.status,
    c.name as categorie
    FROM products p
    INNER JOIN categories c ON c.id = p.category_id
    WHERE p.category_id ='$id'AND p.status=1";
    return ejecutarConsulta($sql);
  }
  public function productall($id)
  {
    $sql = "SELECT p.id,ref,p.name as product,brand,price,discount,description,p.image,p.status,
    c.name as categorie
    FROM products p
    INNER JOIN categories c ON c.id = p.category_id
    WHERE p.id='$id'AND p.status=1";
    return ejecutarConsulta($sql);
  }
}