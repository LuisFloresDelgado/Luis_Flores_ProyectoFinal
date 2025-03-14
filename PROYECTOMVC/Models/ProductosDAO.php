<?php
include_once('./db/database.php');

class ProductosDAO {
    private $db_con;
    
    public function __construct() {
        $this->db_con = Database::open_connection();
    }
    
    // Obtener todos los productos
    public function getAllProducts() {
        try {
            $stmt = $this->db_con->prepare("SELECT * FROM Productos");
            $stmt->execute();
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Si hay productos en la base de datos, los devolvemos
            if (count($productos) > 0) {
                return $productos;
            } else {
                // Si no hay productos en la BD, usamos los de ejemplo o sesión
                if (isset($_SESSION['productos'])) {
                    return $_SESSION['productos'];
                } else {
                    return $this->getExampleProducts();
                }
            }
        } catch (PDOException $e) {
            // En caso de error, devolver productos de sesión o ejemplo
            if (isset($_SESSION['productos'])) {
                return $_SESSION['productos'];
            } else {
                return $this->getExampleProducts();
            }
        }
    }
    
    // Obtener un producto por su ID
    public function getProductById($id) {
        try {
            $stmt = $this->db_con->prepare("SELECT * FROM Productos WHERE id_producto = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($producto) {
                return $producto;
            }
        } catch (PDOException $e) {
            // No hacer nada aquí, continuaremos con la búsqueda en la sesión o ejemplo
        }
        
        // Buscar en productos de sesión
        if (isset($_SESSION['productos'])) {
            foreach ($_SESSION['productos'] as $producto) {
                if ($producto['id_producto'] == $id) {
                    return $producto;
                }
            }
        }
        
        // Si no se encuentra en la sesión, buscar en productos de ejemplo
        $productos = $this->getExampleProducts();
        foreach ($productos as $producto) {
            if ($producto['id_producto'] == $id) {
                return $producto;
            }
        }
        
        return null;
    }
    
    // Buscar productos por nombre o descripción
    public function searchProducts($keyword) {
        try {
            $busqueda = '%' . $keyword . '%';
            $stmt = $this->db_con->prepare("SELECT * FROM Productos WHERE nombre LIKE :busqueda OR descripcion LIKE :busqueda");
            $stmt->bindParam(':busqueda', $busqueda);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Si hay resultados en la base de datos, devolver
            if (count($resultados) > 0) {
                return $resultados;
            }
        } catch (PDOException $e) {
            // Continuar con la búsqueda en sesión o ejemplo
        }
        
        // Buscar en productos de sesión
        $resultado = array();
        if (isset($_SESSION['productos'])) {
            foreach ($_SESSION['productos'] as $producto) {
                if (strpos(strtolower($producto['nombre']), strtolower($keyword)) !== false || 
                    strpos(strtolower($producto['descripcion']), strtolower($keyword)) !== false) {
                    $resultado[] = $producto;
                }
            }
            
            if (count($resultado) > 0) {
                return $resultado;
            }
        }
        
        // Buscar en productos de ejemplo como último recurso
        $productos = $this->getExampleProducts();
        $resultado = array();
        
        foreach ($productos as $producto) {
            if (strpos(strtolower($producto['nombre']), strtolower($keyword)) !== false || 
                strpos(strtolower($producto['descripcion']), strtolower($keyword)) !== false) {
                $resultado[] = $producto;
            }
        }
        
        return $resultado;
    }
    
    // Insertar un nuevo producto
    public function insertarProducto($datos) {
        try {
            // Ajustamos la consulta a la estructura real de la tabla
            $stmt = $this->db_con->prepare("INSERT INTO Productos (nombre, descripcion, precio, imagen, categoria, stock) 
                    VALUES (:nombre, :descripcion, :precio, :imagen, :categoria, :stock)");
            
            $stmt->bindParam(':nombre', $datos['nombre']);
            $stmt->bindParam(':descripcion', $datos['descripcion']);
            $stmt->bindParam(':precio', $datos['precio']);
            $stmt->bindParam(':imagen', $datos['imagen']);
            $stmt->bindParam(':categoria', $datos['categoria']);
            $stmt->bindParam(':stock', $datos['stock']);
            
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Si falla, usamos la simulación con almacenamiento en sesión
            error_log($e->getMessage());
            
            // Crear una versión de ejemplo para agregarla a la lista en sesión
            $nuevoProducto = array(
                'id_producto' => time(), // Usar timestamp como ID único
                'nombre' => $datos['nombre'],
                'descripcion' => $datos['descripcion'],
                'precio' => $datos['precio'],
                'imagen' => $datos['imagen'],
                'categoria' => $datos['categoria'],
                'stock' => $datos['stock']
            );
            
            // Inicializar array de productos en sesión si no existe
            if (!isset($_SESSION['productos'])) {
                $_SESSION['productos'] = $this->getProducts();
            }
            
            // Añadir el nuevo producto al array de productos en sesión
            $_SESSION['productos'][] = $nuevoProducto;
            
            return true;
        }
    }
}

?>