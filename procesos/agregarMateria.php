<?php
require_once "../clases/Msteria.php";

// Recibir los datos del formulario
$datos = array(
    "materia" => $_POST['materia'],       
    
);


$materiaO = new Materia();


echo $materiaO->agregarMateria($datos);
?>