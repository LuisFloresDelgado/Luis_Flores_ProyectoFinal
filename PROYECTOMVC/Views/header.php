<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda oficial Real Madrid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<!--
  Página de cabecera estática. Contiene el menú de la aplicación con enlaces que apuntan a la página
  index con el controlador y acción apropiado.
-->
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4">Tienda oficial Real Madrid</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link">Inicio</a></li>
        <li class="nav-item"><a href="index.php?controller=ProductController&action=listAll" class="nav-link">Productos</a></li>
        <li class="nav-item"><a href="index.php?controller=CartController&action=viewCart" class="nav-link">Carrito
            <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                <span class="badge bg-secondary"><?php echo count($_SESSION['cart']); ?></span>
            <?php endif; ?>
        </a></li>
        
        <?php if(isset($_SESSION['user_id']) && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
        <!-- Enlaces de administración solo visibles para admin -->
        <li class="nav-item"><a href="index.php?controller=ProductController&action=showAddProductForm" class="nav-link">Añadir producto</a></li>
        <li class="nav-item"><a href="index.php?controller=UsuariosController&action=getUsersAndMasEdad" class="nav-link">Listar Productos</a></li>
        <?php endif; ?>
        
        <?php if(!isset($_SESSION['user_id'])): ?>
        <!-- Si NO hay sesión activa, muestra Login -->
        <li class="nav-item"><a href="index.php?controller=UsuariosController&action=login" class="nav-link">Login</a></li>
        <?php else: ?>
        <!-- Si hay sesión activa, muestra Logout -->
        <li class="nav-item"><a href="index.php?controller=UsuariosController&action=logout" class="nav-link">Logout</a></li>
        <?php endif; ?>
      </ul>
    </header>
  </div>