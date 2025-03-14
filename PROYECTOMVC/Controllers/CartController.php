<?php
include_once('Models/ProductosDAO.php');
include_once('Views/View.php');

class CartController {
    private $productoDAO;
    
    public function __construct() {
        // Inicializar el carrito si no existe
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $this->productoDAO = new ProductosDAO();
    }
    
    // Ver el contenido del carrito
    public function viewCart() {
        $cartItems = array();
        $total = 0;
        
        foreach ($_SESSION['cart'] as $id => $cantidad) {
            $producto = $this->productoDAO->getProductById($id);
            if ($producto) {
                $producto['cantidad'] = $cantidad;
                $producto['subtotal'] = $producto['precio'] * $cantidad;
                $cartItems[] = $producto;
                $total += $producto['subtotal'];
            }
        }
        
        $data = array(
            'items' => $cartItems,
            'total' => $total
        );
        
        View::show('cart', $data);
    }
    
    // Añadir producto al carrito
    public function addToCart() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $cantidad = isset($_GET['cantidad']) ? intval($_GET['cantidad']) : 1;
            
            // Añadir o incrementar la cantidad
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] += $cantidad;
            } else {
                $_SESSION['cart'][$id] = $cantidad;
            }
            
            header('Location: index.php?controller=CartController&action=viewCart');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }
    }
    
    // Eliminar producto del carrito
    public function removeFromCart() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            if (isset($_SESSION['cart'][$id])) {
                unset($_SESSION['cart'][$id]);
            }
        }
        
        header('Location: index.php?controller=CartController&action=viewCart');
        exit;
    }
    
    // Vaciar el carrito
    public function clearCart() {
        $_SESSION['cart'] = array();
        
        header('Location: index.php?controller=CartController&action=viewCart');
        exit;
    }
    
       
}
?>