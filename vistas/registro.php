<!DOCTYPE html>
<html>
<head>
  <title>Registro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../librerias/jquery-ui-1.13.1/jquery-ui.theme.css">
  <link rel="stylesheet" type="text/css" href="../librerias/jquery-ui-1.13.1/jquery-ui.css">
</head>
<body>
  <div class="container">
    <h1 style="text-align: center;">Registro de usuario</h1>
    <hr>
    
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <form id="frmRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()" autocomplete="off"> 
          <label>Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control" required="">
          <label>Apellido</label>
          <input type="text" name="apellido" id="apellido" class="form-control" required="">
          <label>Usuario</label>
          <input type="usuario" name="usuario" id="usuario" class="form-control" required="">
          <label>Contraseña</label>
          <input type="password" name="password" id="password" class="form-control" required="">
          <br>
          <label>Repetir Contraseña</label>
          <input type="password" name="repetir_password" id="repetir_password" class="form-control" required="">
          <br>
          <div class="row">
            <div class="col-sm-6 text-left"> 
              <button class="btn btn-primary">Registrar</button>
            </div>
            <div class="col-sm-6  text-right">
              <a href="../index.php" class="btn btn-success">Ingresar</a>
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
    function agregarUsuarioNuevo() {
      // Obtener los valores de los campos de contraseña
      const password = document.getElementById("password").value;
      const repetirPassword = document.getElementById("repetir_password").value;

      // Validar que las contraseñas coincidan
      if (password !== repetirPassword) {
        swal("Error", "Las contraseñas no coinciden", "error");
        return false; // Detener el envío del formulario
      }

      // Si las contraseñas coinciden, enviar el formulario
      $.ajax({
        method: "POST",
        data: $('#frmRegistro').serialize(),
        url: "../procesos/usuario/registro/agregarUsuario.php",
        success: function (respuesta) {
          respuesta = respuesta.trim();
          
          if (respuesta == 1) {
            $("#frmRegistro")[0].reset();
            swal(":D", "Agregado con éxito", "success");
          } else if (respuesta == 2) {
            swal("Error", "El usuario ya existe", "error");
          } else {
            swal(":(", "Falló al agregar", "error");
          }
        },
      });

      return false; // Evitar que el formulario se envíe de forma tradicional
    }

    // Validación en tiempo real
    document.getElementById("repetir_password").addEventListener("input", function () {
      const password = document.getElementById("password").value;
      const repetirPassword = this.value;

      if (password !== repetirPassword) {
        this.setCustomValidity("Las contraseñas no coinciden");
      } else {
        this.setCustomValidity("");
      }
    });
  </script>
</body>
</html>