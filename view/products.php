<?php
require 'header.php';
if ($_SESSION['role'] != "1") {
  header("Location: ../login.php");
}
?>
<style>
.principal {
  float: none;
  margin: 0 auto;
}
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-lg-10 principal">
        <div class="panel-body">
          <div class="nav-tabs-custom">
            <div class="tab-content no-padding">
              <div class="chart tab-pane active" id="listax" style="position: relative;height: 100%;">
                <div class="panel-body table-responsive" id="divlistado">
                  <button type="button" onclick="limpiar()" class="btn btn-primary btn-md btn-flat" data-toggle="modal"
                    data-target="#modal">
                    Nuevo producto
                  </button>
                  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog modal-md"" role=" document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Registrar producto</h5>
                        </div>
                        <div class="modal-body">
                          <form autocomplete="off" name="form" id="form" method="POST">
                            <input type="hidden" id="id" name="id">
                            <div class="row">
                              <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Categoria</label>
                                  <select id="category_id" name='category_id' class="form-control">
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Referencia</label>
                                  <input type="text" class="form-control" name="ref" id="ref">
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Nombre</label>
                                  <input type="text" class="form-control" name="name" id="name">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Marca</label>
                                  <input type="text" class="form-control" name="brand" id="brand">
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Precio</label>
                                  <input type="number" class="form-control" name="price" id="price">
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Descuento</label>
                                  <input type="text" class="form-control" name="discount" id="discount">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Especificaciones</label>
                                  <textarea class="form-control" rows="5" name="description"
                                    id="description"></textarea>
                                </div>
                              </div>
                              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Imagen del producto</label>
                                  <input type="file" class="form-control" name="image" id="image">
                                </div>
                              </div>
                            </div>
                        </div>
                        <input type="hidden" name="imagenactual" id="imagenactual">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                          <button type="submit" class="btn btn-success pull-right">Guardar</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <table id="listado" class="table  table-bordered">
                    <thead>
                      <th>Opciones</th>
                      <th>Categoria</th>
                      <th>Ref</th>
                      <th>Nombre</th>
                      <th>Marca</th>
                      <th>Precio</th>
                      <td>Descuento</td>
                      <th>Imagen</th>
                      <th>Estado</th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/products.js"></script>

</body>

</html>