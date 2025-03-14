<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item"><a href="index.php?controller=ProductController&action=listAll">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $data['nombre']; ?></li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-md-6">
            <img src="assets/<?php echo $data['imagen']; ?>" class="img-fluid" alt="<?php echo $data['nombre']; ?>">
        </div>
        <div class="col-md-6">
            <h1><?php echo $data['nombre']; ?></h1>
            <h3 class="text-primary"><?php echo $data['precio']; ?> €</h3>
            
            <p><?php echo $data['descripcion']; ?></p>
            
            <div class="mb-3">
                <label for="quantity" class="form-label">Cantidad:</label>
                <input type="number" id="quantity" class="form-control w-25" value="1" min="1" max="<?php echo $data['stock']; ?>">
            </div>
            
            <div class="d-grid gap-2">
                <a href="index.php?controller=CartController&action=addToCart&id=<?php echo $data['id_producto']; ?>" class="btn btn-primary">Añadir al carrito</a>
                <a href="index.php" class="btn btn-outline-secondary">Volver a la tienda</a>
            </div>
        </div>
    </div>
</div>