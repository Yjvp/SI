<?php
require_once "../clases/Profesor.php";

// Recibir los datos del formulario
$datos = array(
    
    "nombre" => $_POST['nombre'], 
    "apellido" => $_POST['apellido'],  
    "cedula" => $_POST['cedula'],       
    "email" => $_POST['email'],       
    "telefono" => $_POST['telefono'],  
    "direccion" => $_POST['direccion'],  
    "genero" => $_POST['genero'],  
    "fecha_nacimiento" => $_POST['fecha_nacimiento']
  
);

// Crear una instancia de la clase Profesor
$profesorO = new Profesor();

// Llamar al método para agregar el docente
echo $profesorO->agregarProfesores($datos);
?>