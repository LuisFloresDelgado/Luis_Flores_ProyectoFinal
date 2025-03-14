<?php
include_once('./db/database.php');

class UsuariosDAO {
    private $dbh;

    public function __construct() {
        $this->dbh = Database::open_connection();
    }

    // Recuperar todos los usuarios
    public function getAllUsers() {
        try {
            $stmt = $this->dbh->prepare("
                SELECT 
                    id_usuario, 
                    nombre, 
                    email, 
                    rol, 
                    fecha_registro 
                FROM Usuarios
            ");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log("Error al recuperar usuarios: " . $e->getMessage());
            return [];
        }
    }

    // Añadir nuevo usuario
    public function addUser($nombre, $email, $password, $rol = 'cliente') {
        try {
            // Verificar si el email ya existe
            $stmt = $this->dbh->prepare("SELECT COUNT(*) FROM Usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            if ($stmt->fetchColumn() > 0) {
                return false;
            }

            // Insertar nuevo usuario
            $stmt = $this->dbh->prepare("
                INSERT INTO Usuarios (nombre, email, password, rol) 
                VALUES (:nombre, :email, :password, :rol)
            ");
            
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':rol', $rol);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al añadir usuario: " . $e->getMessage());
            return false;
        }
    }

    // Autenticar usuario
    public function autenticarUsuario($username, $password) {
        try {
            // Buscar usuario por username
            $stmt = $this->dbh->prepare("
                SELECT id, username, email, rol, password 
                FROM Usuarios 
                WHERE username = :username
            ");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            
            $usuario = $stmt->fetch(PDO::FETCH_OBJ);
            
            // Verificar la contraseña en texto plano
            if ($usuario && $usuario->password === $password) {
                return $usuario;
            }
            
            return false;
        } catch (PDOException $e) {
            error_log("Error en la autenticación: " . $e->getMessage());
            return false;
        }
    }
}
?>