# LUIS FLORES PROYECTO
1. Qué hacer para ver el proyecto.
El primer paso sería meternos en aws e iniciar el laboratorio. 
![image](https://github.com/user-attachments/assets/9f157ed0-a41b-451f-b306-741983703518)
Despues tendriamos que lanzar la instancia que he creado
![image](https://github.com/user-attachments/assets/ddc8a9a8-5b38-4afe-be1f-c7a7f8b01bd2)
Nos vamos a conectar
![image](https://github.com/user-attachments/assets/84f5aafb-fb9d-4dfa-9903-2fccf2500271)
en la seccion de cliente SSH copiamos y pegamos en la maquina anfitriona para conectarnos a la de Ubuntu para poder ver la página
![image](https://github.com/user-attachments/assets/2a52e6c7-643c-49b5-8307-3625b3c121f3)
Ya estariamos dentro de la máquina
![image](https://github.com/user-attachments/assets/47555821-ae36-4ea3-926d-454842010e83)
Ponemos los siguientes comandos para poder ver a través de la ip elástica nuestra página
cd proyecto-php/
![image](https://github.com/user-attachments/assets/77f17c55-00b4-4d40-a336-9fea0e37f654)
docker-compose up
![image](https://github.com/user-attachments/assets/5443662b-182f-44d9-a048-d25176e0907e)
Y ahora ponemos la ip elástica en el navegador
52.21.178.138
Y ya podriamos ver la página principal de la tiende que he hecho del Real Madrid
![image](https://github.com/user-attachments/assets/0a8c41e2-e2e6-4381-bbac-463ae0bf6dd3)
En ella Tenemos los apartados de Inicio (que es donde estamos), el de productos (para poder ver todos los productos), el del carrito (para poder ver lo que tenemos en el carrito si netemos algo), y el de login(en el que podremos iniciar sesion como administrador o como ususarios normal)
## En la pagina de inicio tenemos para buscar productos para ver mas detalles de los productos y para añadir al carrito el producto.
![image](https://github.com/user-attachments/assets/a9542617-0e5e-4b78-9817-5d357604bec4)
En ver productos tenemos el nomre, el precio una pequeña escripción, para añadir al carrito y para volver a la tienda, tampien podremos añadir mas de un producto si hay disponibilidad
![image](https://github.com/user-attachments/assets/b4323341-08dd-4195-8be6-d1ed17e857cf)
## El apartado de Productos igual que el inicio pero solo relacionado con productos
![image](https://github.com/user-attachments/assets/9892f507-502c-40f3-b8f6-7923b5361cd7)
En el apartado de buscar producto si ponemos el nombre , por ejemplo camiseta nos aparecera todo aquello que contenga de nombre la palabra Camiseta
![image](https://github.com/user-attachments/assets/ff9f393c-ccd5-46f9-9b48-a79d9cda4710)
Al pulsar Añadir al carrito nos enviara a la página del carrito en la que:
Podemos eliminar los productos y darle a seguir comprando que nos llevara a la páguina de inicio
![image](https://github.com/user-attachments/assets/6c66130e-f110-46c7-adf3-24aa31c7c04e)
## En el apartado del login nos aparecera este pequeño formulario
![image](https://github.com/user-attachments/assets/ae91f951-7d0c-448d-a706-1d00335b4d31)
Donde podremos iniciar sesión como admin o como usuario normal , he creado una tabla usuario en la base de datos con estos dos usuaros.
Para entrar como admin, ponemos admin y admin
Y tendremos dos secciones diferentes, la de añadir producto y la de listarlos
En la de añadir producto tenemos un formulario que al rellenarlo nos aparecera un nuevo producto en la página y se actualizara la tabla productos de la base de datos, con ese nuavo producto(para añadir imagen no sabia como era y he puesto una predeterminada que cada vez que se añada uno nuevo aparezca una imagen de nuevo producto)
![image](https://github.com/user-attachments/assets/1dd173c6-888c-49a6-8201-45a1d67b3f9c)
Le damos a guardar y ya nos paracera en la página de inicio y en la de productos
![image](https://github.com/user-attachments/assets/9a8eb331-647b-40e7-9d5a-dafb4262142b)
En el apartado de listar productos nos aparecera un listado de los productos(basicamente lo que se ve en la base de datos)
![image](https://github.com/user-attachments/assets/ca574aff-97f5-4932-94be-316764422083)
Tambien tenemos un botón de ver producto que será como el de ver detalles de la pagina de inicio y la de productos
Por ultimo tenemos el boton de logout donde nos desloguearemos como admin

Si nos logueamos como un usuario normal ponemos usuario y usuario
![image](https://github.com/user-attachments/assets/a4eb253c-88ad-4b34-a88e-a4955e16af09) 
tendremos la misma vista de la páguina que vemos por primera vez, pero con el logout para desloguearnos como usuario
Si añadimos un producto al carrito
![image](https://github.com/user-attachments/assets/1e37ad3b-2824-4216-abf4-6d4122ee31f7)
y nos deslogueamos no lo veremos
![image](https://github.com/user-attachments/assets/4384115a-701d-47ea-900e-2088ada00aa3)
![image](https://github.com/user-attachments/assets/d4a48826-aeed-4622-a6f4-d0c3e96cc506)
Sin embargo si vuelves a iniciar sesíon tampoco lo vería, esta seria una de las posibles mejoras.

## Posibles mejoras:
La mencionada anteriormente
Un boton para realizar la compra 
Al añadir producto que aparezca una imágen
Y más ampliaciones más avanzadas como poder reguistrarse y que se actualice en la base de datos y poder iniciar sesión, etc.

## Gracias.







