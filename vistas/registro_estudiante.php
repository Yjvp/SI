<!DOCTYPE html>
<html>
<head>
  <title>Estudiante</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../librerias/jquery-ui-1.13.1/jquery-ui.theme.css">
  <link rel="stylesheet" type="text/css" href="../librerias/jquery-ui-1.13.1/jquery-ui.css">
  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body>
  <div class="container">
    <h1 style="text-align: center;">Registrar Estudiante</h1>
    <hr>
    
    <div class="row">
      <div class="col-sm-8 offset-sm-2">
        <form id="frmRegistro" method="POST" onsubmit="return agregarEstudianteNuevo()" autocomplete="off"> 
          <!-- Primera fila: Nombre, Apellido, Cédula -->
          <div class="row">
            <div class="col-sm-4">
              <label>Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Apellido</label>
              <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Cédula Identidad</label>
              <input type="number" name="cedula" id="cedula" class="form-control" required>
            </div>
          </div>

          <!-- Segunda fila: Dirección, Teléfono -->
          <div class="row mt-3">
            <div class="col-sm-8">
              <label>Dirección</label>
              <input type="text" name="direccion" id="direccion" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Teléfono</label>
              <input type="number" name="telefono" id="telefono" class="form-control" required>
            </div>
          </div>

          <!-- Tercera fila: Cédula Escolar, Género, Fecha de Nacimiento -->
          <div class="row mt-3">
            <div class="col-sm-4">
              <label>Cédula Escolar</label>
              <input type="text" name="cedula_escolar" id="cedula_escolar" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Género</label>
              <select name="genero" id="genero" class="form-control" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label>Fecha de Nacimiento</label>
              <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
            </div>
          </div>

          <!-- Cuarta fila: Lugar de Nacimiento, Parroquia, País de Nacimiento -->
          <div class="row mt-3">
            <div class="col-sm-4">
              <label>Lugar de Nacimiento</label>
              <input type="text" name="lugar_nacimiento" id="lugar_nacimiento" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Parroquia</label>
              <input type="text" name="parroquia" id="parroquia" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>País de Nacimiento</label>
              <input type="text" name="pais_nacimiento" id="pais_nacimiento" class="form-control" required>
            </div>
          </div>

          <!-- Quinta fila: Peso, Talla -->
          <div class="row mt-3">
            <div class="col-sm-4">
              <label>Peso (kg)</label>
              <input type="number" name="peso" id="peso" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Talla (cm)</label>
              <input type="number" name="talla" id="talla" class="form-control" required>
            </div>
          </div>

          <!-- Botones -->
          <div class="row mt-3">
            <div class="col-sm-6 text-left"> 
              <button class="btn btn-primary">Registrar</button>
            </div>
            <div class="col-sm-6 text-left"> 
              <a href="inicio.php" class="btn btn-primary">Cancelar</a>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Tabla de clientes -->
    <div class="row mt-5">
      <div class="col-sm-12">
        <h2>Lista de Estudiantes</h2>
        <table id="tablaEstudiantes" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
            <th>ID</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Cédula</th>
              <th>Teléfono</th>
              <th>Dirección</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <!-- Los datos se cargarán dinámicamente -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

   <!-- Modal para editar estudiante -->
<div class="modal fade" id="modalEditarEstudiante" tabindex="-1" aria-labelledby="modalEditarEstudianteLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarEstudiante">Editar Estudiante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="frmEditarEstudiante">
          <input type="hidden" name="id_editar" id="id_editar">
          <!-- Primera fila: Nombre, Apellido, Cédula -->
          <div class="row">
            <div class="col-sm-4">
              <label>Nombre</label>
              <input type="text" name="nombre_editar" id="nombre_editar" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Apellido</label>
              <input type="text" name="apellido_editar" id="apellido_editar" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Cédula Identidad</label>
              <input type="number" name="cedula_editar" id="cedula_editar" class="form-control" required>
            </div>
          </div>

          <!-- Segunda fila: Dirección, Teléfono -->
          <div class="row mt-3">
            <div class="col-sm-8">
              <label>Dirección</label>
              <input type="text" name="direccion_editar" id="direccion_editar" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Teléfono</label>
              <input type="number" name="telefono_editar" id="telefono_editar" class="form-control" required>
            </div>
          </div>

          <!-- Tercera fila: Cédula Escolar, Género, Fecha de Nacimiento -->
          <div class="row mt-3">
            <div class="col-sm-4">
              <label>Cédula Escolar</label>
              <input type="text" name="cedula_escolar_editar" id="cedula_escolar_editar" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Género</label>
              <select name="genero_editar" id="genero_editar" class="form-control" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label>Fecha de Nacimiento</label>
              <input type="date" name="fecha_nacimiento_editar" id="fecha_nacimiento_editar" class="form-control" required>
            </div>
          </div>

          <!-- Cuarta fila: Lugar de Nacimiento, Parroquia, País de Nacimiento -->
          <div class="row mt-3">
            <div class="col-sm-4">
              <label>Lugar de Nacimiento</label>
              <input type="text" name="lugar_nacimiento_editar" id="lugar_nacimiento_editar" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Parroquia</label>
              <input type="text" name="parroquia_editar" id="parroquia_editar" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>País de Nacimiento</label>
              <input type="text" name="pais_nacimiento_editar" id="pais_nacimiento_editar" class="form-control" required>
            </div>
          </div>

          <!-- Quinta fila: Peso, Talla -->
          <div class="row mt-3">
            <div class="col-sm-4">
              <label>Peso (kg)</label>
              <input type="number" name="peso_editar" id="peso_editar" class="form-control" required>
            </div>
            <div class="col-sm-4">
              <label>Talla (cm)</label>
              <input type="number" name="talla_editar" id="talla_editar" class="form-control" required>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarCambios">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

  <!-- jQuery -->
  <script src="../librerias/jquery-3.6.0.min.js"></script>
  <!-- jQuery UI -->
  <script src="../librerias/jquery-ui-1.13.1/jquery-ui.js"></script>
  <script src="../librerias/bootstrap5/js/bootstrap.bundle.js"></script> 
  <!-- DataTables JS -->
  <script src="../librerias/jquery.dataTables.min.js"></script>
  <script src="../librerias/dataTables.bootstrap5.min.js"></script>
  <!-- SweetAlert -->
  <script src="../librerias/sweetalert.min.js"></script>
  
  <script>
   $(document).ready(function () {
    $('#tablaEstudiantes').DataTable({
        ajax: {
            url: "../clases/cargarEstudiantes.php", // Ruta al archivo PHP
            dataSrc: "" // La fuente de datos está en el nivel raíz del JSON
        },
        columns: [
            { data: "id" },
            { data: "nombre" },
            { data: "apellido" },
            { data: "cedula" },
            { data: "telefono" },
            { data: "direccion" },
           
            {
                data: null,
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-sm btn-primary btn-actualizar" data-id="${data.id}">Actualizar</button>
                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="${data.id}">Eliminar</button>
                    `;
                }
            }
        ]
    });
});

    function agregarEstudianteNuevo() {
      $.ajax({
        method: "POST",
        data: $('#frmRegistro').serialize(),
        url: "../procesos/agregarEstudiante.php",
        success: function (respuesta) {
          respuesta = respuesta.trim();
          console.log(respuesta);

          if (respuesta == 1) {
            $("#frmRegistro")[0].reset();
            swal(":D", "Agregado con éxito", "success");
            $('#tablaEstudiantes').DataTable().ajax.reload(); // Recargar la tabla
          } else if (respuesta == 2) {
            swal("Error", "El estudiante ya existe", "error");
          } else {
            swal(":(", "Falló al agregar", "error");
          }
        },
      });

      return false; // Evitar que el formulario se envíe de forma tradicional
    }
      // Función para abrir el modal de edición
$(document).on("click", ".btn-actualizar", function () {
  var idEstudiante = $(this).data("id");

  // Obtener los datos del estudiante mediante AJAX
  $.ajax({
    url: "../clases/obtenerEstudiante.php", // Ruta al archivo PHP que obtiene los datos
    method: "POST",
    data: { id: idEstudiante },
    dataType: "json",
    success: function (data) {
      // Llenar el formulario del modal con los datos obtenidos
      $("#id_editar").val(data.id);
      $("#nombre_editar").val(data.nombre);
      $("#apellido_editar").val(data.apellido);
      $("#cedula_editar").val(data.cedula);
      $("#direccion_editar").val(data.direccion);
      $("#telefono_editar").val(data.telefono);
      $("#cedula_escolar_editar").val(data.cedula_escolar);
      $("#genero_editar").val(data.genero);
      $("#fecha_nacimiento_editar").val(data.fecha_nacimiento);
      $("#lugar_nacimiento_editar").val(data.lugar_nacimiento);
      $("#parroquia_editar").val(data.parroquia);
      $("#pais_nacimiento_editar").val(data.pais_nacimiento);
      $("#peso_editar").val(data.peso);
      $("#talla_editar").val(data.talla);

      // Mostrar el modal
      $("#modalEditarEstudiante").modal("show");
    },
    error: function () {
      swal("Error", "No se pudieron cargar los datos del estudiante", "error");
    },
  });
});

// Función para guardar los cambios
$("#btnGuardarCambios").click(function () {

  // Obtener el formulario
  var formulario = document.getElementById("frmEditarEstudiante");
  
  // Validar el formulario
  if (!formulario.checkValidity()) {
    // Si no es válido, mostrar mensajes de validación
    formulario.reportValidity();
    return false;
  }

  $.ajax({
    url: "../procesos/actualizarEstudiante.php", // Ruta al archivo PHP que actualiza los datos
    method: "POST",
    data: $("#frmEditarEstudiante").serialize(),
    success: function (respuesta) {
      respuesta = respuesta.trim();

      if (respuesta == 1) {
        swal("Éxito", "Estudiante actualizado correctamente", "success");
        $("#modalEditarEstudiante").modal("hide");
        $("#tablaEstudiantes").DataTable().ajax.reload(); // Recargar la tabla
      } else {
        swal("Error", "No se pudo actualizar el estudiante", "error");
      }
    },
  });
});

// FUNCIÓN PARA ELIMINAR ESTUDIANTE
$(document).on("click", ".btn-eliminar", function () {
    var idEstudiante = $(this).data("id");
    var boton = $(this);
    
    // Confirmar antes de eliminar
    swal({
        title: "¿Estás seguro?",
        text: "Esta acción eliminará al estudiante permanentemente",
        icon: "warning",
        buttons: ["Cancelar", "Eliminar"],
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            // Proceder con la eliminación
            $.ajax({
                url: "../procesos/eliminarEstudiante.php",
                method: "POST",
                data: { id: idEstudiante },
                success: function (respuesta) {
                    respuesta = respuesta.trim();
                    
                    if (respuesta == 1) {
                        swal("Éxito", "Estudiante eliminado correctamente", "success");
                        // Recargar la tabla DataTable
                        $('#tablaEstudiantes').DataTable().ajax.reload();
                    } else if (respuesta == 2) {
                        swal("Error", "No se puede eliminar el estudiante porque tiene registros relacionados", "error");
                    } else {
                        swal("Error", "No se pudo eliminar el estudiante", "error");
                    }
                },
                error: function () {
                    swal("Error", "Error en la conexión al servidor", "error");
                }
            });
        }
    });
});
    

  </script>
 
</body>
</html>