<?php
// Vista para listar productos
echo '<div class="container mt-4">';
echo '<h2>Listado de Productos en Base de Datos</h2>';

echo '<table class="table table-striped">';
echo '<thead class="table-dark">';
echo '<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Categoría</th><th>Stock</th><th>Acciones</th></tr>';
echo '</thead>';
echo '<tbody>';

// Comprobar si hay productos para mostrar
if (empty($data)) {
    echo '<tr><td colspan="6" class="text-center">No hay productos disponibles</td></tr>';
} else {
    foreach ($data as $producto) {
        echo '<tr>';
        echo '<td>' . (isset($producto['id_producto']) ? $producto['id_producto'] : '—') . '</td>';
        echo '<td>' . (isset($producto['nombre']) ? htmlspecialchars($producto['nombre']) : '—') . '</td>';
        echo '<td>' . (isset($producto['precio']) ? number_format($producto['precio'], 2) . ' €' : '—') . '</td>';
        echo '<td>' . (isset($producto['categoria']) ? htmlspecialchars($producto['categoria']) : '—') . '</td>';
        echo '<td>' . (isset($producto['stock']) ? $producto['stock'] : '—') . '</td>';
        echo '<td>';
        echo '<a href="index.php?controller=ProductController&action=viewProduct&id=' . 
             (isset($producto['id_producto']) ? $producto['id_producto'] : '') . 
             '" class="btn btn-info btn-sm">Ver</a> ';
        echo '</td>';
        echo '</tr>';
    }
}

echo '</tbody>';
echo '</table>';
echo '</div>';
?>