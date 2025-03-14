<div class="container mt-4">
    <h2 class="mb-4">Productos del Real Madrid</h2>
    
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="index.php" method="get" class="d-flex">
                <input type="hidden" name="controller" value="ProductController">
                <input type="hidden" name="action" value="searchProducts">
                <input type="text" name="keyword" class="form-control me-2" placeholder="Buscar productos...">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
    </div>
    
    <div class="row">
        <?php if (empty($data)): ?>
            <div class="col-12">
                <div class="alert alert-info">
                    No hay productos disponibles.
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($data as $producto): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="assets/<?php echo isset($producto['imagen']) ? $producto['imagen'] : 'rm.jpg'; ?>" class="card-img-top" alt="<?php echo isset($producto['nombre']) ? htmlspecialchars($producto['nombre']) : 'Producto'; ?>" style="height: 250px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo isset($producto['nombre']) ? htmlspecialchars($producto['nombre']) : 'Producto'; ?></h5>
                        <p class="card-text"><?php echo isset($producto['descripcion']) ? substr(htmlspecialchars($producto['descripcion']), 0, 100) . '...' : ''; ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold"><?php echo isset($producto['precio']) ? number_format($producto['precio'], 2) : '0.00'; ?> €</span>
                            <a href="index.php?controller=ProductController&action=viewProduct&id=<?php echo isset($producto['id_producto']) ? $producto['id_producto'] : ''; ?>" class="btn btn-info">Ver detalles</a>
                        </div>
                        <a href="index.php?controller=CartController&action=addToCart&id=<?php echo isset($producto['id_producto']) ? $producto['id_producto'] : ''; ?>" class="btn btn-primary mt-2 w-100">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>