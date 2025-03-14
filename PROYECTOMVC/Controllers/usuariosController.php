<?php

include_once('./Models/UsuariosDAO.php');
include_once('Views/View.php');

class UsuariosController {
    private $usuariosDAO;

    public function __construct() {
        $this->usuariosDAO = new UsuariosDAO();
    }

    // Método para obtener usuarios y productos
    public function getUsersAndMasEdad() {
        // Obtener productos 
        include_once('Models/ProductosDAO.php');
        $productosDAO = new ProductosDAO();
        $productos = $productosDAO->getAllProducts();  

        View::show('listarProductos', $productos);
    }

    // Método para mostrar el formulario de añadir usuario
    public function showAddUserForm() {
        View::show('addProduct', null);
    }

    
    // Método login
    public function login() {
        $errores = array();
        
        if (isset($_POST['login'])) {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            
            if (empty($username) || empty($password)) {
                $errores['login'] = "Por favor, introduce usuario y contraseña.";
            } else {
                // Consultar a la base de datos
                $usuario = $this->usuariosDAO->autenticarUsuario($username, $password);
                
                if ($usuario) {
                    // Usuario autenticado
                    $_SESSION['user_id'] = $usuario->id;
                    $_SESSION['username'] = $usuario->username;
                    $_SESSION['user_role'] = $usuario->rol;
                    
                    header("Location: index.php");
                    exit;
                } else {
                    $errores['login'] = "Usuario o contraseña incorrectos.";
                }
            }
        }
        
        View::show('login', $errores);
    }
    
    // Método logout
    public function logout() {
        // Limpiar todas las variables de sesión
        $_SESSION = array();
        // Destruir la sesión
        session_destroy();
        
        header("Location: index.php");
        exit;
    }
}
?>