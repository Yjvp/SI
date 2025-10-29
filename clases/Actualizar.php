<?php
require_once "Conexion.php";

class Actualizar extends Conectar {

    // Método para actualizar un estudiante
    public function actualizarEstudiante($datos) {
        $conexion = Conectar::conexion();
        
        $query = "UPDATE estudiantes SET 
            nombre = '{$datos['nombre']}', 
            apellido = '{$datos['apellido']}', 
            cedula = '{$datos['cedula']}', 
            direccion = '{$datos['direccion']}', 
            telefono = '{$datos['telefono']}', 
            cedula_escolar = '{$datos['cedula_escolar']}', 
            genero = '{$datos['genero']}', 
            fecha_nacimiento = '{$datos['fecha_nacimiento']}', 
            lugar_nacimiento = '{$datos['lugar_nacimiento']}', 
            parroquia = '{$datos['parroquia']}', 
            pais_nacimiento = '{$datos['pais_nacimiento']}', 
            peso = '{$datos['peso']}', 
            talla = '{$datos['talla']}' 
            WHERE id = {$datos['id']}";

        if (mysqli_query($conexion, $query)) {
            return 1; // Éxito
        } else {
            return 0; // Error
        }
    }
}
?>