var tabla;

function init() {
  store();
  index();
  $("#imagenmuestra").hide();
  $("#div-muestra").hide();
  $.post("../controller/ProductControllers.php?op=selectCategorie", function (
    r
  ) {
    $("#category_id").html(r);
  });
}
function limpiar() {
  $("#id").val("");
  $("#name").val("");
  $("#price").val("");
  $("#discount").val("");
  $("#ref").val("");
  $("#description").val("");
  $("#imagenmuestra").attr("src", "");
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
        url: "../controller/ProductControllers.php?op=index",
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
        ref: {
          message: "Referencia invalida",
          validators: {
            notEmpty: {
              message: "La refencia es obligatoria",
            },
          },
        },
        brand: {
          message: "Marca invalida",
          validators: {
            notEmpty: {
              message: "La marca es obligatoria",
            },
          },
        },
        name: {
          message: "Nombre invalido",
          validators: {
            notEmpty: {
              message: "El nombre  es obligatorio.",
            },
          },
        },
        price: {
          message: "Precio invalido",
          validators: {
            notEmpty: {
              message: "El precio es obligatorio.",
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
      tinymce.get("description").setContent("");
      $.ajax({
        url: "../controller/ProductControllers.php?op=store",
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
  $.post("../controller/ProductControllers.php?op=show", { id: id }, function (
    data
  ) {
    data = JSON.parse(data);
    $("#id").val(data.id);
    $("#category_id").val(data.category_id);
    $("#ref").val(data.ref);
    $("#name").val(data.name);
    $("#brand").val(data.brand);
    $("#price").val(data.price);
    $("#discount").val(data.discount);
    $("#description").val(data.description);
    $("#imagenactual").val(data.image);
    $("#modal").modal("show");
  });
}
function destroy(id) {
  swal({
    title:
      "Desea eliminar este producto?, Recuerde una vez eliminado no se podrá recuperar la información!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.value) {
      $.post(
        "../controller/ProductControllers.php?op=destroy",
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
    title: "Desea Bloqueaa ha este producto?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Acepto!",
  }).then((result) => {
    if (result.value) {
      $.post(
        "../controller/ProductControllers.php?op=status",
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
