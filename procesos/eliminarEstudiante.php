<?php
// ../procesos/eliminarEstudiante.php
include_once '../clases/conexion.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Crear instancia de conexión
    $conectar = new Conectar();
    $conexion = $conectar->conexion();
    
    // Verificar si la conexión fue exitosa
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
    
    try {
        // Preparar la consulta
        $sql = "DELETE FROM estudiantes WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        
        if ($stmt) {
            // Vincular parámetros
            $stmt->bind_param("i", $id);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    echo "1"; // Éxito - estudiante eliminado
                } else {
                    echo "0"; // No se encontró el estudiante
                }
            } else {
                // Verificar si es error de clave foránea
                if ($conexion->errno == 1451) { // Error de restricción de clave foránea
                    echo "2"; // Tiene registros relacionados
                } else {
                    echo "0"; // Otro error
                }
            }
            
            $stmt->close();
        } else {
            echo "0"; // Error al preparar la consulta
        }
        
    } catch (Exception $e) {
        // Manejar excepciones
        if ($conexion->errno == 1451) {
            echo "2"; // Tiene registros relacionados
        } else {
            echo "0"; // Otro error
        }
    }
    
    $conexion->close();
} else {
    echo "0"; // No se recibió ID
}
?>