<?php
require "../config/conexion.php";
class Product
{

  public function store($category_id, $ref, $name, $brand_id, $price, $discount, $description, $specs, $embed, $image, $image2, $image3)
  {
    $sql = "INSERT INTO products (category_id,ref,name,brand_id,price,discount,description,specs,embed,image,image2,image3,status)
		VALUES ('$category_id','$ref','$name','$brand_id','$price','$discount','$description','$specs','$embed','$image','$image2','$image3',1)";
    return ejecutarConsulta($sql);
  }

  public function update($id, $category_id, $ref, $name, $brand_id, $price, $discount, $description, $specs, $embed, $image, $image2, $image3)
  {
    $sql = "UPDATE products
		SET 
    id='$id',
    category_id='$category_id', 
    ref='$ref',
    name='$name',
    brand_id='$brand_id',
    price='$price',
    discount='$discount',
    description='$description',
    specs='$specs',
    embed='$embed',
    image='$image',
    image2='$image2',
    image3='$image3'
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
    $sql = "SELECT p.id,ref,p.name as product,price,discount,description,specs,embed,p.image,p.image2,p.image3,p.status,c.categorie as subcategorie,
    c.name as categorie,b.name as brand
    FROM products p
    INNER JOIN categories c ON c.id = p.category_id
    INNER JOIN brands b ON b.id=p.brand_id
    ORDER BY p.id DESC";
    return ejecutarConsulta($sql);
  }
}