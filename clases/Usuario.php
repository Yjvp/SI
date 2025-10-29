<?php

require_once "Conexion.php";

class Usuario extends Conectar {

    public function agregarUsuario($datos) {
        $conexion = Conectar::conexion();

        // Verificar si el usuario ya existe
        if (self::buscarUsuarioRepetido($datos['usuario'])) {
            return 2; // Usuario repetido
        } else {
            // Insertar el nuevo usuario
            $sql = "INSERT INTO usuarios (nombre, apellido, usuario, contrasena)
                    VALUES (?, ?, ?, ?)";

            $query = $conexion->prepare($sql);
            $query->bind_param('ssss', $datos['nombre'],
                $datos['apellido'],
                $datos['usuario'],
                $datos['password']);

            $exito = $query->execute();
            $query->close();
            return $exito;
        }
    }

    public function buscarUsuarioRepetido($usuario) {
        $conexion = Conectar::conexion();

        $sql = "SELECT usuario 
                FROM usuarios 
                WHERE usuario = '$usuario'";
        $result = mysqli_query($conexion, $sql);

        // Verificar si se encontró algún registro
        if ($datos = mysqli_fetch_array($result)) {
            // Si el usuario existe, devolver 1
            return 1;
        } else {
            // Si no existe, devolver 0
            return 0;
        }
    }

    public function login($usuario, $password) {
        $conexion = Conectar::conexion();

        $sql = "SELECT count(*) as existeUsuario 
                FROM usuarios 
                WHERE usuario = '$usuario'
                AND contrasena = '$password'";
        $result = mysqli_query($conexion, $sql);

        $respuesta = mysqli_fetch_array($result)['existeUsuario'];

        if ($respuesta > 0) {
            $_SESSION['usuario'] = $usuario;

            $sql = "SELECT id
                    FROM usuarios
                    WHERE usuario = '$usuario'
                    AND contrasena = '$password'";
            $result = mysqli_query($conexion, $sql);
            $id_reg = mysqli_fetch_row($result)[0];

            $_SESSION['id_reg'] = $id_reg;

            return 1; // Login exitoso
        } else {
            return 0; // Login fallido
        }
    }
}
?>