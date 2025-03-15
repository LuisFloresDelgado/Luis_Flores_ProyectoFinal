# Luis_Flores_ProyectoFinal
# Tienda Online del Real Madrid

## Descripción del Proyecto

Aplicación web de una tienda online desarrollada con PHP utilizando el patrón Modelo-Vista-Controlador (MVC). Este proyecto implementa una tienda de artículos del Real Madrid con funcionalidades de navegación por productos, carrito de compras y gestión administrativa.

## Arquitectura MVC

Este proyecto está estructurado siguiendo el patrón de diseño Modelo-Vista-Controlador (MVC):

### Modelo

El Modelo representa la lógica de negocio y acceso a datos. En este proyecto, los modelos están implementados como clases DAO:

- **ProductosDAO**: Gestiona todas las operaciones relacionadas con los productos.
- **UsuariosDAO**: Maneja las operaciones de usuarios.

### Vista

La Vista es responsable de la presentación de datos al usuario. En este proyecto:

- **View.php**: Clase general que gestiona cómo se muestran las vistas
- Vistas específicas:
  - `listProducts.php`: Muestra el catálogo de productos
  - `viewProduct.php`: Detalle de un producto específico
  - `cart.php`: Muestra el carrito de compras
  - `login.php`: Formulario de inicio de sesión
  - `addProducto.php`: Formulario para añadir nuevos productos

### Controlador

El Controlador actúa como intermediario entre el Modelo y la Vista, procesando las solicitudes del usuario:

- **ProductController**: Gestiona las operaciones relacionadas con productos
- **CartController**: Maneja el carrito de compras
- **UsuariosController**: Controla la autenticación y gestión de usuarios

### Catálogo de Productos
- Listado de todos los productos
- Visualización detallada de cada producto
- Búsqueda por nombre o descripción

### Carrito de Compras
- Añadir productos al carrito
- Ver contenido del carrito
- Vaciar carrito completo

### Gestión de Usuarios
- Inicio de sesión
- Cierre de sesión
- Roles de usuario (cliente/admin)
- Funcionalidades específicas según rol

### Panel de Administración
- Añadir nuevos productos
- Listar todos los productos
- Restricción de acceso según rol de usuario

En mi proyecto de la tienda del Real Madrid, utilicé la arquitectura MVC para organizar y estructurar mi código de manera eficiente. Esta metodología me ayudó a separar las diferentes responsabilidades de mi aplicación web.
Al implementar esta arquitectura, logré:

- Separar claramente las responsabilidades de cada componente.
- Hacer mi código más organizado y mantenible.
- Facilitar futuras modificaciones y mejoras.
- Mejorar la escalabilidad de mi aplicación web.

### La estructura de carpetas refleja esta separación:

- Models/: Clases de acceso a datos
- Views/: Archivos de presentación
- Controllers/: Lógica de control

## Final,Gracias.
