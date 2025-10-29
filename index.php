<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css"  href="librerias/cdnjs/bootstrap.min.css.map">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script src="librerias/bootstrap5/js/bootstrap.min.js"></script>
  <script src="librerias/bootstrap5/js/bootstrap.min.js.map"></script>
  <script src="librerias/popper.min.js"></script>
 </head>
<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="img/ISAAC_NEWTON.jpg" id="icon" alt="User Icon" />
        <h1>ISAAC NEWTON</h1>
      </div>

      <!-- Login Form -->
      <form method="POST" id="frmlogin" onsubmit="return logear()">
        <input type="text" id="login" class="fadeIn second" name="login" placeholder="usuario">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="contraseña">
        <input type="submit" class="fadeIn fourth" value="Iniciar Sesión">
        <a href="vistas/registro.php" class="btn btn-success">Registrar</a>
      </form>

    </div>
    <script src="librerias/jquery-3.6.0.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>

    <script type="text/javascript">
      function logear(){
        $.ajax({
          type: "POST",
          data: $('#frmlogin').serialize(), 
          url: "procesos/usuario/login/login.php", 
          success: function(respuesta){
           
            respuesta = respuesta.trim();
           
            if (respuesta == 1){
              window.location = "vistas/inicio.php";
            }else{
              swal(":(", "Fallo al tratar de ingresar", "error");
            }
          } 
        }); 
        return false;
      }
    </script>

  </body>
  </html>