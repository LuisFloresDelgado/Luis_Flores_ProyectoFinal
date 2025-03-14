<?php

class Database {
    private static $host = 'mariadb';
    private static $dbname = 'database';
    private static $user = 'root';
    private static $pass = 'changepassword';
    private static $connection = null;

    // Método para abrir la conexión
    public static function open_connection() {
        if (self::$connection === null) {
            try {
                $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8mb4"; //Para poder poner tildes
                self::$connection = new PDO($dsn, self::$user, self::$pass);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$connection;
    }

    // Método para cerrar la conexión
    public static function close_connection() {
        self::$connection = null;
    }
}

?>
