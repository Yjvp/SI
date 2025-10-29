<!DOCTYPE html>
<html>
<head>
  <title>Materias</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../librerias/jquery-ui-1.13.1/jquery-ui.theme.css">
  <link rel="stylesheet" type="text/css" href="../librerias/jquery-ui-1.13.1/jquery-ui.css">
</head>
<body>
  <div class="container">
    <h1 style="text-align: center;">Registro de Materias</h1>
    <hr>
    
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <form id="frmRegistroMateria" method="POST" onsubmit="return agregarMateriaNueva()" autocomplete="off"> 
          <label>Nombre</label>
          <input type="text" name="materia" id="materia" class="form-control" required="">
          <div class="row">
            <div class="col-sm-6 text-left"> 
              <button class="btn btn-primary">Registrar</button>
            </div>
            <div class="col-sm-6  text-right">
              <a href="inicio.php" class="btn btn-success">Cancelar</a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>

  <script src="../librerias/jquery-3.6.0.min.js"></script>
  <script src="../librerias/jquery-ui-1.13.1/jquery-ui.js"></script>
  <script src="../librerias/sweetalert.min.js"></script>

  <script>
    function agregarMateiaNueva() {
    

      // Si las contraseñas coinciden, enviar el formulario
      $.ajax({
        method: "POST",
        data: $('#frmRegistroMateia').serialize(),
        url: "../procesos/usuario/registro/agregarMateria.php",
        success: function (respuesta) {
          respuesta = respuesta.trim();
          
          if (respuesta == 1) {
            $("#frmRegistro")[0].reset();
            swal(":D", "Agregado con éxito", "success");
          } else if (respuesta == 2) {
            swal("Error", "La materia ya existe", "error");
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