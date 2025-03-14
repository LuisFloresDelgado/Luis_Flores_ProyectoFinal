<?php
include_once('Models/ProductosDAO.php');
include_once('Views/View.php');

class ProductController {
    private $productoDAO;
    
    public function __construct() {
        $this->productoDAO = new ProductosDAO();
    }
    
    // Método para listar todos los productos
    public function listAll() {
        $productos = $this->productoDAO->getAllProducts();
        
        View::show('listProducts', $productos);
    }
    
    // Método para ver un producto específico
    public function viewProduct() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = $this->productoDAO->getProductById($id);
            
            if($producto) {
                View::show('viewProduct', $producto);
            } else {
                header('Location: index.php');
            }
        } else {
            header('Location: index.php');
        }
    }
    
    // Método para buscar productos
    public function searchProducts() {
        if(isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $productos = $this->productoDAO->searchProducts($keyword);
            
            View::show('listProducts', $productos);
        } else {
            header('Location: index.php');
        }
    }
    
    // Método para mostrar el formulario de añadir producto
    public function showAddProductForm() {
        // Verificar si el usuario es administrador
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
            View::show('addProducto', null); // Asegúrate de que este archivo exista en la carpeta Views
        } else {
            // Redirigir si no es admin
            header('Location: index.php');
            exit;
        }
    }
    
    // Método para guardar el nuevo producto
    public function saveProduct() {
        // Verificar si el usuario es administrador
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: index.php');
            exit;
        }
        
        $errores = array();
        
        if (isset($_POST['guardar'])) {
            // Validación de campos
            if (empty($_POST['nombre'])) {
                $errores['nombre'] = "El nombre es obligatorio";
            }
            
            if (empty($_POST['precio']) || !is_numeric($_POST['precio']) || $_POST['precio'] <= 0) {
                $errores['precio'] = "El precio debe ser un número mayor que cero";
            }
            
            if (empty($_POST['descripcion'])) {
                $errores['descripcion'] = "La descripción es obligatoria";
            }
            
            // Si no hay errores, guardar el producto
            if (empty($errores)) {
                $productoData = array(
                    'nombre' => $_POST['nombre'],
                    'descripcion' => $_POST['descripcion'],
                    'precio' => $_POST['precio'],
                    'categoria' => $_POST['categoria'],
                    'stock' => $_POST['stock'],
                    'imagen' => 'rm.png' 
                );
                
                $resultado = $this->productoDAO->insertarProducto($productoData);
                
                if ($resultado) {
                    // Producto guardado, redirigir a la lista de productos
                    header('Location: index.php?controller=ProductController&action=listAll');
                    exit;
                } else {
                    $errores['general'] = "Error al guardar el producto";
                }
            }
            
            // Si hay errores, volver a mostrar el formulario
            View::show('addProducto', $errores);
        } else {
            // Si no se ha enviado el formulario, mostrar formulario vacío
            View::show('addProducto', null);
        }
    }
}
?>