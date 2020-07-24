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
                    Registrar usuarios
                  </button>
                  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Registrar usuarios</h5>
                        </div>
                        <div class="modal-body">
                          <form autocomplete="off" name="form" id="form" method="POST">
                            <input type="hidden" id="id" name="id">
                            <div class="row">
                              <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Nombre</label>
                                  <input type="text" class="form-control" name="name" id="name">
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Apellido</label>
                                  <input type="text" class="form-control" name="surname" id="surname">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Email</label>
                                  <input type="email" name="email" id='email' class="form-control"></input>
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Password</label>
                                  <input type="text" name="password" id="password" class="form-control"></input>
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">confirmar</label>
                                  <input type="text" name="confirmPassword" id="confirmPassword"
                                    placeholder="Confirmar password" class="form-control"></input>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Rango</label>
                                  <select name="role" id="role" class="form-control">
                                    <option value="1">Administrador</option>
                                    <option value="2">Visitante</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Imagen perfil</label>
                                  <input type="file" class="form-control" name="image" id="image">
                                </div>
                              </div>
                            </div>
                            <input type="hidden" name="imagenactual" id="imagenactual">
                        </div>
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
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Email</th>
                      <th>Rol</th>
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
  </section>
</div>
<?php
require 'footer.php';
?>
</body>

</html>
<script type="text/javascript" src="scripts/users.js"></script>
</body>

</html>