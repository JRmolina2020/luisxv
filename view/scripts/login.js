function init() {
  $("#alert_error").hide();
  validar_mensaje();
  validar();
  $("#logina").focus();
}
function validar_mensaje() {
  $("#frmAcceso").on("submit", function (e) {
    e.preventDefault();
    logina = $("#logina").val();
    clavea = $("#clavea").val();
    $.post(
      "controller/UsersControllers.php?op=login",
      { logina: logina, clavea: clavea },
      function (data) {
        data = JSON.parse(data);
        if (data != null) {
          $(location).attr("href", "view/products");
        } else {
          $("#alert_error").show();
          $("#alert_error").fadeIn(100);
          setTimeout(function () {
            $("#alert_error").fadeOut(1000);
          }, 1000);
          limpiar();
        }
      }
    );
  });
}
function limpiar() {
  $("#logina").focus();
  $("#logina").val("");
  $("#clavea").val("");
}
function validar() {
  $(document).ready(function () {
    $("#frmAcceso").bootstrapValidator({
      feedbackIcons: {
        valid: "fa  fa-redo-alt",
        invalid: "fa fa-redo-alt",
        validating: "fa fa-redo-alt",
      },
      fields: {
        logina: {
          message: "correo del usuario invalido",
          validators: {
            notEmpty: {
              message: "El correo es obligatoria",
            },
            emailAddress: {
              message: "Ingrese un correo valido",
            },
            stringLength: {
              min: 15,
              max: 50,
              message: "Minimo 15 caracteres y Maximo 50 caracteres ",
            },
          },
        },
        clavea: {
          validators: {
            notEmpty: {
              message: "El password es obligatorio y no puede estar vacio.",
            },
            stringLength: {
              min: 6,
              max: 11,
              message: "Minimo 6 caracteres minimo 11 caracteres",
            },
          },
        },
      },
    });
  });
}
init();
