<?php
require_once "Conexion.php";

class Estudiante extends Conectar {

    // Método para agregar un estudiante
    public function agregarEstudiante($datos) {
        $conexion = Conectar::conexion();

        // Verificar si el estudiante ya existe
        if (self::buscarEstudianteRepetido($datos['cedula'])) {
            return 2; // Estudiante repetido
        } else {
            // Insertar el nuevo estudiante
            $sql = "INSERT INTO estudiantes (
                        cedula, 
                        nombre, 
                        apellido, 
                        telefono, 
                        direccion, 
                        cedula_escolar, 
                        genero, 
                        fecha_nacimiento, 
                        lugar_nacimiento, 
                        parroquia, 
                        pais_nacimiento, 
                        peso, 
                        talla
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $query = $conexion->prepare($sql);
            $query->bind_param(
                'sssssssssssss', // Tipos de datos: s = string, d = double/float
                $datos['cedula'],
                $datos['nombre'],
                $datos['apellido'],
                $datos['telefono'],
                $datos['direccion'],
                $datos['cedula_escolar'],
                $datos['genero'],
                $datos['fecha_nacimiento'],
                $datos['lugar_nacimiento'],
                $datos['parroquia'],
                $datos['pais_nacimiento'],
                $datos['peso'],
                $datos['talla']
            );

            $exito = $query->execute();
            $query->close();
            return $exito;
        }
    }

    // Método para buscar si un estudiante ya está registrado
    public function buscarEstudianteRepetido($cedula) {
        $conexion = Conectar::conexion();

        $sql = "SELECT cedula
                FROM estudiantes 
                WHERE cedula = '$cedula'";
        $result = mysqli_query($conexion, $sql);

        // Verificar si se encontró algún registro
        if ($datos = mysqli_fetch_array($result)) {
            // Si el estudiante existe, devolver 1
            return 1;
        } else {
            // Si no existe, devolver 0
            return 0;
        }
    }
}
?>