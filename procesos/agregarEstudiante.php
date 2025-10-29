<?php
require_once "../clases/Estudiante.php";

// Recibir los datos del formulario
$datos = array(
    "cedula" => $_POST['cedula'],       
    "nombre" => $_POST['nombre'], 
    "apellido" => $_POST['apellido'],  
    "telefono" => $_POST['telefono'],  
    "direccion" => $_POST['direccion'],  
    "cedula_escolar" => $_POST['cedula_escolar'],  
    "genero" => $_POST['genero'],  
    "fecha_nacimiento" => $_POST['fecha_nacimiento'],  
    "lugar_nacimiento" => $_POST['lugar_nacimiento'],  
    "parroquia" => $_POST['parroquia'],  
    "pais_nacimiento" => $_POST['pais_nacimiento'],  
    "peso" => $_POST['peso'],  
    "talla" => $_POST['talla']  
);

// Crear una instancia de la clase Cliente
$estudianteO = new Estudiante();

// Llamar al método para agregar el cliente (o estudiante)
echo $estudianteO->agregarEstudiante($datos);
?>