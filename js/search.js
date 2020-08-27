$(document).ready(function () {
  $("#search").focus();
});

function search() {
  $("#myModal").modal("show");
  var search = $("#search").val();
  $.ajax({
    type: "POST",
    url: "controller/searchController.php",
    data: { search: search },
  })
    .done(function (resultado) {
      $("#result").html(resultado);
    })
    .fail(function () {
      alert("Hubo un error :(");
    });
}
