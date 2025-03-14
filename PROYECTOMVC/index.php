<?php
ob_start(); // Iniciar buffer de salida
session_start(); // Iniciar sesión

include_once("Views/header.php");
include_once("Controllers/usuariosController.php");
include_once("Controllers/CartController.php"); 
include_once("Controllers/ProductController.php"); 
include_once("Models/ProductosDAO.php");

//Punto de entrada a la aplicación. Si no se recibe parámetro action y controller en la url
//se muestra la página de inicio (texto HTML).
//En caso de que si se reciba, se instancia el controlador y se invoca la acción indicada.

if (isset($_REQUEST['action']) && isset($_REQUEST['controller'])) {
    $act=$_REQUEST['action'];
    $cont=$_REQUEST['controller'];

    //Instanciación del controlador e invocación del método
    $controller=new $cont();
    $controller->$act();
} else {
    //Página inicial
    $productosDAO = new ProductosDAO();
    $productos = $productosDAO->getAllProducts();

    echo '<div class="container mt-3">
    <h1>Tienda Oficial Real Madrid</h1>
    <div class="d-flex justify-content-center"><img src="assets/imagen inicio.png" width="200" height="100"></div> 
    
    <div class="row mt-4">
        <div class="col-md-12 mb-3">
            <form action="index.php" method="get" class="d-flex">
                <input type="hidden" name="controller" value="ProductController">
                <input type="hidden" name="action" value="searchProducts">
                <input type="text" name="keyword" class="form-control me-2" placeholder="Buscar productos...">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
    </div>
    
    <div class="row">';

    // Mostrar productos dinámicamente desde la base de datos
    foreach ($productos as $producto) {
        echo '<div class="col-md-4 mb-4">
            <div class="card">
                <img src="assets/' . htmlspecialchars($producto['imagen']) . '" class="card-img-top" alt="' . htmlspecialchars($producto['nombre']) . '">
                <div class="card-body">
                    <h5 class="card-title">' . htmlspecialchars($producto['nombre']) . '</h5>
                    <p class="card-text">' . substr(htmlspecialchars($producto['descripcion']), 0, 100) . '...</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold">' . number_format($producto['precio'], 2) . ' €</span>
                        <a href="index.php?controller=ProductController&action=viewProduct&id=' . $producto['id_producto'] . '" class="btn btn-info">Ver detalles</a>
                    </div>
                    <a href="index.php?controller=CartController&action=addToCart&id=' . $producto['id_producto'] . '" class="btn btn-primary mt-2 w-100">Añadir al carrito</a>
                </div>
            </div>
        </div>';
    }

    echo '</div>
  </div>';

    require_once("Views/footer.php");
}

ob_end_flush(); // Para enviar buffer al navegador
?>