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

Características:
- Conexión a base de datos mediante PDO
- Manejo de excepciones

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

Características:
- Métodos específicos para cada acción (listar, ver, buscar, añadir)
- Validación de datos de formularios
- Control de sesiones para usuarios autenticados
- Redirecciones después de procesar solicitudes

## Funcionalidades Implementadas

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

## Final,Gracias.
- Implementación de paginación en listados
- Mejora en la gestión de imágenes de productos
- Implementación de proceso de checkout completo
- Historial de pedidos para usuarios
- Implementación de filtrado por categorías/precios

## Diagrama de Flujo MVC
