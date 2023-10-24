<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS PROPIO -->

  <link rel="stylesheet" type="text/css" href="css/estilos.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

  <!-- Bootstrap CSS Datatable js -->

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">



  <title>CRUD PHP, AJAX, DATATABLES Y PDO</title>

</head>

<body>

  <div class="container fondo">

    <h1 class="text-center">CRUD PHP, AJAX, DATATABLES.js Y PDO</h1>
    <h1 class="text-center">www.isaias-martinez-ingpr.com</h1>
    <div class="row">
      <div class="col-2 offset-10">
        <div class="text-center">
          <!--BOTON MODAL-->
          <!--Agregar id al boton para hacer uso de AJAX-->
          <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="botonCrear">
            <i class="bi bi-plus-circle-fill"></i> Crear
          </button>

        </div>
      </div>
    </div>
    <br>
    <br>

    <div class="table-responsive">
      <table id="datos_usuario" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Imagen</th>
            <th>Fecha Creación</th>
            <th>Editar</th>
            <th>Borrar</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

  <!--MODAL-->
  <!--Se agrega al primer div el id que le dimos al boton para que abra el modal-->
  <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form method="POST" id="formulario" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-body">
              <label for="nombre">Ingrese su nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control">
              <br>

              <label for="apellidos">Ingrese sus apellidos</label>
              <input type="text" name="apellidos" id="apellidos" class="form-control">
              <br>

              <label for="telefono">Ingrese su telefono</label>
              <input type="text" name="telefono" id="telefono" class="form-control">
              <br>

              <label for="email">Ingrese su Correo</label>
              <input type="text" name="email" id="email" class="form-control">
              <br>

              <label for="imagen">Seleccione una Imagen</label>
              <input type="file" name="imagen_usuario" id="imagen_usuario" class="form-control">
              <span id="imagen_subida"></span>
              <br>

            </div>
            <div class="modal-footer">

              <input type="hidden" name="id_usuario" id="id_usuario">

              <!--Con este sabemos que operacion se va a realizar-->
              <input type="hidden" name="operacion" id="operacion">
              <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <!--Realizacion de la funcionalidad del datatable-->
  <script type="text/javascript">
    $(document).ready(function() {

          $("#botonCrear").click(function() {
            $("#formulario")[0].reset();
            $(".modal-title").text("Crear Usuario");
            $("#action").val("Crear");
            $("#operacion").val("Crear");
            $("#imagen_subida").html("");
          });

          var dataTable = $("#datos_usuario").DataTable({
              "processing": true,
              "serverSide": true,
              "order": [],
              "ajax": {
                url: "registros/obtener_registros.php",
                type: "POST"
              },
              "columnDefs": [{
                "targets": [0, 3, 4],
                "orderable": false,
              }],
              //Traduccion para datatable
              "language": {
                "decimal": "",
                "emptyTable": "No hay registros",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
                }
              }
              });

            $(document).on('submit', '#formulario', function(event) {

              event.preventDefault();
              var nombres = $("#nombre").val();
              var apellidos = $("#apellidos").val();
              var telefono = $("#telefono").val();
              var email = $("#email").val();
              var extension = $("#imagen_usuario").val().split('.').pop().toLowerCase();

              if (extension !== '') {
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {

                  alert("Formato de imagen inválido");
                  $("#imagen_usuario").val('');
                  return false;
                }
              }

              if (nombres !== '' && apellidos !== '' && email !== '') {
                $.ajax({
                  url: "php/crear.php",
                  method: "POST",
                  data: new FormData(this),
                  contentType: false,
                  processData: false,

                  success: function(data) {
                    alert(data);
                    $('#formulario')[0].reset();
                    $('#modalUsuario').modal('hide');
                    dataTable.ajax.reload();
                  }
                });
              } else {
                alert("Algunos campos son obligatorios");
              }
            });

            //Funcionalidad de editar
            $(document).on('click', '.editar', function() {

              var id_usuario = $(this).attr("id");
              $.ajax({
                url: "registros/obtener_registro.php",
                method: "POST",
                data: {
                  id_usuario: id_usuario
                },
                dataType: "json",
                success: function(data) {

                  //console.log(data);
                  $('#modalUsuario').modal('show');
                  $('#nombre').val(data.nombre);
                  $('#apellidos').val(data.apellidos);
                  $('#telefono').val(data.telefono);
                  $('#email').val(data.email);
                  $('.modal-title').text("Editar Usuario");
                  $('#action').val("Editar");
                  $('#operacion').val("Editar");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  console.log(textStatus, errorThrown);
                }
              })
            });

            //Funcionalidad BORRAR

            $(document).on('click', '.borrar', function() {
              var id_usuario = $(this).attr("id");
              if (confirm("Esta seguro de borrar este registro: " + id_usuario)) {
                $.ajax({
                  url: "php/borrar.php",
                  method: "POST",
                  data: {
                    id_usuario: id_usuario
                  },
                  success: function(data) {
                    alert(data);
                    dataTable.ajax.reload();
                  }
                });

              } else {
                return false;
              }
            });

          });
  </script>
</body>

</html>