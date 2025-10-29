<?php
include("Conexion.php"); // Incluir la conexión a la base de datos

class Obtener extends Conectar {
    public function obtenerEstudiante() {
        $conexion = Conectar::conexion();
        $id = $_POST["id"];
        $query = "SELECT * FROM estudiantes WHERE id = $id";
        $result = mysqli_query($conexion, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            echo json_encode($data); // Devuelve los datos en formato JSON
        } else {
            echo json_encode(["error" => "No se encontró el estudiante"]); // Mensaje de error
        }
    }
}

// Instanciar la clase y llamar al método
$obtener = new Obtener();
$obtener->obtenerEstudiante();
?>