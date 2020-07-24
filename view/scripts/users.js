var tabla;

function init() {
  store();
  index();
}
function limpiar() {
  $("#id").val("");
  $("#name").val("");
  $("#surname").val("");
  $("#email").val("");
  $("#password").val("");
  $("#confirmPassword").val("");
  $("#cargo").val(1);
  $("#imagenactual").val("");
  $("#form").bootstrapValidator("resetForm", true);
}
function index() {
  tabla = $("#listado")
    .dataTable({
      aProcessing: true,
      aServerSide: true,
      dom: "Bfrtip",
      buttons: [],
      ajax: {
        url: "../controller/UsersControllers.php?op=index",
        type: "GET",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      iDisplayLength: 5,
      order: [[0, "desc"]],
    })
    .DataTable();
}

function store(e) {
  $("#form")
    .bootstrapValidator({
      message: "This value is not valid",
      fields: {
        name: {
          message: "Nombre invalido",
          validators: {
            notEmpty: {
              message: "El nombre  es obligatorio,no puede estar vacio.",
            },

            regexp: {
              regexp: /^[a-zA-Z\s]+$/,
              message:
                "Ingrese un nombre correcto,no se aceptan valores númericos",
            },

            stringLength: {
              min: 3,
              max: 25,
              message: "Minimo 3 carácteres y Máximo 25 carácteres ",
            },
          },
        },
        surname: {
          message: "Apellido del vendedor invalido",
          validators: {
            notEmpty: {
              message: "El Apellido  es obligatorio,no puede estar vacio.",
            },
            regexp: {
              regexp: /^[a-zA-Z\s]+$/,
              message:
                "Ingrese un apellido correcto,no se aceptan valores númericos",
            },
            stringLength: {
              min: 3,
              max: 30,
              message: "Minimo 3 caracteres y Máximo 30 carácteres ",
            },
          },
        },
        email: {
          message: "EL correo del usuario es invalido",
          validators: {
            notEmpty: {
              message: "El correo del usuario es obligatorio",
            },
            emailAddress: {
              message: "Ingrese un correo valido",
            },

            stringLength: {
              min: 15,
              max: 50,
              message: "Minimo 15 cáracteres y Máximo 50 cáracteres ",
            },
          },
        },

        password: {
          validators: {
            notEmpty: {
              message: "El password es obligatorio y no puede estar vacio.",
            },
            stringLength: {
              min: 6,
              max: 11,
              message: "Minimo 6 carácteres máximo 11 caracteres",
            },
            identical: {
              field: "confirmPassword",
              message: "Deberá confirmar el Password",
            },
          },
        },
        confirmPassword: {
          validators: {
            identical: {
              field: "password",
              message:
                "El password no coincide,verificar por favor que sean iguales",
            },
          },
        },
        image: {
          validators: {
            file: {
              extension: "jpeg,jpg,png",
              type: "image/jpeg,image/png",
              maxSize: 2097152,
              message: "Archivo denegado,Inserte una imagen valida",
            },
          },
        },
      },
    })
    .on("success.form.bv", function (e) {
      e.preventDefault();
      $("#btnsave").prop("disabled", false);
      var formData = new FormData($("#form")[0]);
      $.ajax({
        url: "../controller/UsersControllers.php?op=store",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
          swal({
            position: "top-end",
            type: "success",
            title: datos,
            showConfirmButton: false,
            timer: 1500,
          });
          limpiar();
          $("#form").bootstrapValidator("resetForm", true);
          tabla.ajax.reload();
          $("#modal").modal("hide");
        },
      });
    });
}
function show(id) {
  $.post("../controller/UsersControllers.php?op=show", { id: id }, function (
    data
  ) {
    data = JSON.parse(data);
    $("#id").val(data.id);
    $("#name").val(data.name);
    $("#surname").val(data.surname);
    $("#email").val(data.email);
    $("#role").val(data.role).change();
    $("#imagenactual").val(data.image);
    $("#modal").modal("show");
  });
}
function destroy(id) {
  swal({
    title:
      "Desea eliminar este Usuario?, Recuerde una vez eliminado no se podrá recuperar la información!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.value) {
      $.post(
        "../controller/UsersControllers.php?op=destroy",
        { id: id },
        function (e) {
          swal(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}
function statu(id, status) {
  swal({
    title:
      "Desea Bloquear ha  este usuario, Recuerde una vez bloqueado no tendra acceso!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Acepto!",
  }).then((result) => {
    if (result.value) {
      $.post(
        "../controller/UsersControllers.php?op=status",
        { id: id, status: status },
        function (e) {
          swal(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}

init();
