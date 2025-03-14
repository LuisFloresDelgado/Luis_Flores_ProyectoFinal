<div class="container mt-4">
    <h2>Añadir Nuevo Producto</h2>
    
    <form action="index.php?controller=ProductController&action=saveProduct" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Producto:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
            <?php if (isset($data['nombre'])): ?>
                <div class="alert alert-danger mt-2"><?php echo $data['nombre']; ?></div>
            <?php endif; ?>
        </div>
        
        <div class="mb-3">
            <label for="precio" class="form-label">Precio (€):</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
            <?php if (isset($data['precio'])): ?>
                <div class="alert alert-danger mt-2"><?php echo $data['precio']; ?></div>
            <?php endif; ?>
        </div>
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
            <?php if (isset($data['descripcion'])): ?>
                <div class="alert alert-danger mt-2"><?php echo $data['descripcion']; ?></div>
            <?php endif; ?>
        </div>
        
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría:</label>
            <select class="form-select" id="categoria" name="categoria">
                <option value="Equipaciones">Equipaciones</option>
                <option value="Accesorios">Accesorios</option>
                <option value="Ropa">Ropa</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="stock" class="form-label">Stock disponible:</label>
            <input type="number" class="form-control" id="stock" name="stock" value="1" min="1" required>
        </div>
        
        <div class="d-grid">
            <button type="submit" name="guardar" class="btn btn-primary">Guardar Producto</button>
        </div>
    </form>
</div>