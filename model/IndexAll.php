<?php
require "config/conexion.php";
class IndexAll
{
  public function categorie($categorie)
  {
    $sql = "SELECT id,name,image as image,categorie   
    FROM categories 
    WHERE categorie='$categorie' AND status=1";
    return ejecutarConsulta($sql);
  }

  public function brands($id)
  {
    $sql = " SELECT  DISTINCT b.id ,b.name,b.image,b.id as brand_id
    FROM products p
    INNER JOIN categories c ON c.id = p.category_id
    INNER JOIN brands b ON b.id =p.brand_id
    WHERE p.category_id = '$id' AND b.status=1
    ORDER BY b.id DESC";
    return ejecutarConsulta($sql);
  }

  public function product($id)
  {
    $sql = "SELECT p.id,ref,p.name as product,brand_id,price,discount,description,p.image,p.status,
    c.name as categorie,b.name as brand
    FROM products p
    INNER JOIN categories c ON c.id = p.category_id
    INNER JOIN brands b ON b.id = p.brand_id
    WHERE p.brand_id ='$id'AND p.status=1
    ORDER BY p.id DESC";
    return ejecutarConsulta($sql);
  }
  public function productall($id)
  {
    $sql = "SELECT p.id,ref,p.name as product,brand_id,price,discount,description,specs,embed,p.image,p.image2,p.image3,p.status,
    c.name as categorie
    FROM products p
    INNER JOIN categories c ON c.id = p.category_id
    WHERE p.id='$id'AND p.status=1";
    return ejecutarConsulta($sql);
  }
}