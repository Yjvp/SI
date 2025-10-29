<?php
require_once "Conexion.php";

class Profesor extends Conectar {

    // Método para agregar un Profesor
    public function agregarProfesores($datos) {
        $conexion = Conectar::conexion();

        // Verificar si el Profesor ya existe
        if (self::buscarProfesorRepetido($datos['cedula'])) {
            return 2; // Profesor repetido
        } else {
            // Insertar el nuevo Profesor
            $sql = "INSERT INTO profesores (
                        nombre, 
                        apellido, 
                        cedula, 
                        email,
                        telefono, 
                        direccion, 
                        genero, 
                        fecha_nacimiento 
                        
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $query = $conexion->prepare($sql);
            $query->bind_param(
                'ssssssss', // Tipos de datos: s = string, d = double/float
              
                $datos['nombre'],
                $datos['apellido'],
                $datos['cedula'],
                $datos['email'],
                $datos['telefono'],
                $datos['direccion'],
                $datos['genero'],
                $datos['fecha_nacimiento']
                
            );

            $exito = $query->execute();
            $query->close();
            return $exito;
        }
    }

    // Método para buscar si un profesor  ya está registrado
    public function buscarProfesorRepetido($cedula) {
        $conexion = Conectar::conexion();

        $sql = "SELECT cedula
                FROM profesores 
                WHERE cedula = '$cedula'";
        $result = mysqli_query($conexion, $sql);

        // Verificar si se encontró algún registro
        if ($datos = mysqli_fetch_array($result)) {
            // Si el profesor existe, devolver 1
            return 1;
        } else {
            // Si no existe, devolver 0
            return 0;
        }
    }
}
?>