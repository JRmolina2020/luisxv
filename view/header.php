<?php include '../config/conexion.php';
if (!isset($_SESSION['email'])) {
  header('location:../');
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Catalogo digital</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <script src="https://cdn.tiny.cloud/1/t2vzn4hoayxti0mhnnnulr0p5og56jylpoc6sksvpzcso5kq/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
  <link rel="stylesheet" href="../public/css/font-awesome.css">
  <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../public/css/_all-skins.min.css">
  <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
  <link rel="shortcut icon" href="../public/img/favicon.ico">
  <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">
  <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet" />
  <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
  <link rel="stylesheet"
    href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" />
  <link rel="stylesheet" type="text/css" href="../public/css/sweetalert2.min.css">
</head>


<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="products" class="logo">
        <span class="logo-mini"><b>L</b>XV</span>
        <img src="../public/images/logo.png" alt="">
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../files/users/<?php echo $_SESSION['image'] ?>" width="20px" height="20px" class="img-circle"
              alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['name'] ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i>Enlinea</a>
          </div>
          <br><br>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">LUISXV</li>
          <?php if ($_SESSION['role'] == "1") { ?>
          <li class="treeview">
            <a href="users">
              <i class="fa fa-home"></i> <span>Usuario</span>
            </a>
          </li>
          <li class="treeview">
            <a href="category">
              <i class="fa fa-home"></i> <span>Categorias</span>
            </a>
          </li>
          <li class="treeview">
            <a href="brands">
              <i class="fa fa-home"></i> <span>Marcas</span>
            </a>
          </li>
          <li class="treeview">
            <a href="products">
              <i class="fa fa-home"></i> <span>Productos</span>
            </a>
          </li>
          <?php } ?>
          <?php if ($_SESSION['role'] != "1") { ?>
          <li class="treeview">
            <a href="category">
              <i class="fa fa-home"></i> <span>Categorias</span>
            </a>
          </li>
          <li class="treeview">
            <a href="brands">
              <i class="fa fa-home"></i> <span>Marcas</span>
            </a>
          </li>
          <li class="treeview">
            <a href="products">
              <i class="fa fa-home"></i> <span>Productos</span>
            </a>
          </li>
          <?php } ?> <li class="treeview">
            <a href="../controller/UsersControllers.php?op=exit">
              <i class="fa fa-times"></i> <span>Salir</span>
            </a>
          </li>
        </ul>
      </section>
    </aside>