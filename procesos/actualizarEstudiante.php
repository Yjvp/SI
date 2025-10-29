<?php
require_once "../clases/Actualizar.php";

// Recoger los datos del formulario
$datos = array(
    "id" => $_POST["id_editar"],
    "nombre" => $_POST["nombre_editar"],
    "apellido" => $_POST["apellido_editar"],
    "cedula" => $_POST["cedula_editar"],
    "direccion" => $_POST["direccion_editar"],
    "telefono" => $_POST["telefono_editar"],
    "cedula_escolar" => $_POST["cedula_escolar_editar"],
    "genero" => $_POST["genero_editar"],
    "fecha_nacimiento" => $_POST["fecha_nacimiento_editar"],
    "lugar_nacimiento" => $_POST["lugar_nacimiento_editar"],
    "parroquia" => $_POST["parroquia_editar"],
    "pais_nacimiento" => $_POST["pais_nacimiento_editar"],
    "peso" => $_POST["peso_editar"],
    "talla" => $_POST["talla_editar"]
);

// Crear una instancia de la clase Actualizar
$actestudianteO = new Actualizar();

// Llamar al método para actualizar el estudiante
echo $actestudianteO->actualizarEstudiante($datos);
?>