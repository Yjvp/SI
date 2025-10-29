<?php
require_once "Conexion.php"; // Asegúrate de incluir la clase de conexión

class Profesor extends Conectar {

    // Método para cargar los Profesores
    public function cargarProfesores() {
        $conexion = Conectar::conexion();

        // Consulta para obtener los Profesores con todos los campos
        $sql = "SELECT 
                    id, 
                    nombre, 
                    apellido, 
                    cedula, 
                    email,
                    telefono, 
                    direccion,
                    genero,
                    fecha_nacimiento 
                FROM profesores"; // Asegúrate de que la tabla se llama "Profesores"

        // Ejecutar la consulta
        $result = $conexion->query($sql);

        // Verificar si la consulta fue exitosa
        if (!$result) {
            echo json_encode(["error" => "Error en la consulta: " . $conexion->error]);
            exit;
        }

        // Obtener los resultados como un array asociativo
        $resultados = [];
        while ($fila = $result->fetch_assoc()) {
            $resultados[] = $fila;
        }

        // Si no hay resultados, devolver un array vacío
        if (empty($resultados)) {
            echo json_encode([]);
            exit;
        }

        // Devolver los datos en formato JSON
        echo json_encode($resultados);
    }

}
// Establecer el encabezado para indicar que la respuesta es JSON
header('Content-Type: application/json');

// Instanciar la clase y llamar al método para cargar los Profesores
$profesor = new Profesor();
$profesor->cargarProfesores();


?>
