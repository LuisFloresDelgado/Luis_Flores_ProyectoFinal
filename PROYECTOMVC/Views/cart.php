<div class="container mt-4">
    <h2>Carrito de Compra</h2>
    
    <?php if (empty($data['items'])): ?>
    
    <div class="alert alert-info mt-4">
        <p>Tu carrito está vacío.</p>
        <a href="index.php" class="btn btn-primary">Ir a la tienda</a>
    </div>
    
    <?php else: ?>
    
    <div class="table-responsive mt-4">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['items'] as $item): ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="assets/<?php echo $item['imagen']; ?>" alt="<?php echo $item['nombre']; ?>" style="width: 50px; margin-right: 10px;">
                            <span><?php echo $item['nombre']; ?></span>
                        </div>
                    </td>
                    <td><?php echo $item['precio']; ?> €</td>
                    <td><?php echo $item['cantidad']; ?></td>
                    <td><?php echo $item['subtotal']; ?> €</td>
                    <td>
                        <a href="index.php?controller=CartController&action=removeFromCart&id=<?php echo $item['id_producto']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Total:</td>
                    <td colspan="2" class="fw-bold"><?php echo $data['total']; ?> €</td>
                </tr>
            </tfoot>
        </table>
    </div>
    
    <div class="d-flex justify-content-between mt-4">
        <a href="index.php" class="btn btn-secondary">Seguir comprando</a>
        <div>
            <a href="index.php?controller=CartController&action=clearCart" class="btn btn-danger">Vaciar carrito</a>
        </div>
    </div>
    
    <?php endif; ?>
</div>