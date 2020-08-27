<?php
require "../config/conexion.php";

function search()
{
  $search = isset($_POST["search"]) ? limpiarCadena($_POST["search"]) : "";

  $sql = "SELECT name,image FROM products WHERE name LIKE '%$search%' ";
  $res = ejecutarConsulta($sql);
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    echo "
  <div class='col-md-6 col-xs-6 col-sm-6'>
        <img src='files/products/$row[image]' height='50px' width='50px' >
          <p class='search'><a href='$row[name]' target='_blank'>$row[name]</a></p>
      </a>
  </div>
    ";
  }
}

search();