<!DOCTYPE html>
<html>
<head>
  <title>Profesor</title>
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
    <h1 style="text-align: center;">Registrar Profesor</h1>
    <hr>
    
    <div class="row">
      <div class="col-sm-8 offset-sm-2">
        <form id="frmRegistroProfesor" method="POST" onsubmit="return agregarProfesorNuevo()" autocomplete="off"> 
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
            <div class="col-sm-6">
              <label>Correo eléctronico</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
        
            <div class="col-sm-6">
              <label>Dirección</label>
              <input type="text" name="direccion" id="direccion" class="form-control" required>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-sm-4">
              <label>Teléfono</label>
              <input type="number" name="telefono" id="telefono" class="form-control" required>
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

       

          <!-- Botones -->
          <div class="row mt-3">
            <div class="col-sm-6 text-left"> 
              <button class="btn btn-primary">Registrar</button>
            </div>
            <div class="col-sm-6 text-left"> 
              <a href="inicio.php" class="btn btn-success">Cancelar</a>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Tabla de clientes -->
    <div class="row mt-5">
      <div class="col-sm-12">
        <h2>Lista de Profesores</h2>
        <table id="tablaProfesores" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
            <th>ID</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Cédula</th>
              <th>email</th>
              <th>Teléfono</th>
              <th>Dirección</th>
              <th>Genero</th>
              <th>Fecha Nacimiento</th>
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

  <!-- jQuery -->
  <script src="../librerias/jquery-3.6.0.min.js"></script>
  <!-- jQuery UI -->
  <script src="../librerias/jquery-ui-1.13.1/jquery-ui.js"></script>
  <!-- SweetAlert -->
  <script src="../librerias/sweetalert.min.js"></script>
  <!-- DataTables JS -->
  <script src="../librerias/jquery.dataTables.min.js"></script>
  <script src="../librerias/dataTables.bootstrap5.min.js"></script>

  <script>
   $(document).ready(function () {
    $('#tablaProfesores').DataTable({
        ajax: {
            url: "../clases/cargarProfesores.php", // Ruta al archivo PHP
            dataSrc: "" // La fuente de datos está en el nivel raíz del JSON
        },
        columns: [
            { data: "id" },
            { data: "nombre" },
            { data: "apellido" },
            { data: "cedula" },
            { data: "email" },
            { data: "telefono" },
            { data: "direccion" },
            { data: "genero" },
            { data: "fecha_nacimiento" },
           
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

    function agregarProfesorNuevo() {
      $.ajax({
        method: "POST",
        data: $('#frmRegistroProfesor').serialize(),
        url: "../procesos/agregarProfesor.php",
        success: function (respuesta) {
          respuesta = respuesta.trim();
          console.log(respuesta);

          if (respuesta == 1) {
            $("#frmRegistroProfesor")[0].reset();
            swal(":D", "Agregado con éxito", "success");
            $('#tablaProfesores').DataTable().ajax.reload(); // Recargar la tabla
          } else if (respuesta == 2) {
            swal("Error", "El profesor ya existe", "error");
          } else {
            swal(":(", "Falló al agregar", "error");
          }
        },
      });

      return false; // Evitar que el formulario se envíe de forma tradicional
    }
  </script>
</body>
</html>