<?php
require "../config/conexion.php";
class Product
{

  public function store($category_id, $ref, $name, $brand, $price, $discount, $description, $image)
  {
    $sql = "INSERT INTO products (category_id,ref,name,brand,price,discount,description,image,status)
		VALUES ('$category_id','$ref','$name','$brand','$price','$discount','$description','$image',1)";
    return ejecutarConsulta($sql);
  }

  public function update($id, $category_id, $ref, $name, $brand, $price, $discount, $description, $image)
  {
    $sql = "UPDATE products
		SET 
    id='$id',
    category_id='$category_id', 
    ref='$ref',
    name='$name',
    brand='$brand',
    price='$price',
    discount='$discount',
    description='$description',
    image='$image' 
		WHERE id='$id'";
    return ejecutarConsulta($sql);
  }

  public function destroy($id)
  {
    $sql = "DELETE FROM products  WHERE id='$id'";
    return ejecutarConsulta($sql);
  }

  public function statu($id, $status)
  {
    if ($status == 1) {
      $sql = "UPDATE products SET status='0' WHERE id='$id'";
    } else {
      $sql = "UPDATE products SET status='1' WHERE id='$id'";
    }
    return ejecutarConsulta($sql);
  }

  public function show($id)
  {
    $sql = "SELECT * FROM products
		WHERE id='$id'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function index()
  {
    $sql = "SELECT p.id,ref,p.name as product,brand,price,discount,description,p.image,p.status,
    c.name as categorie
    FROM products p
    INNER JOIN categories c ON c.id = p.category_id";
    return ejecutarConsulta($sql);
  }
}