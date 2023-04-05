Para las preguntas de la entrega inicial:

- qué entidades se podrán actualizar: Producto, Categoria.
- qué reportes se podrán generar o visualizar: Pedidos durante un determinado lapso de tiempo, pedidos de un determinado cliente.
- qué entidades se podrán obtener por API: Producto, Categoria.
- qué entidades se podrán modificar por API: Pedido, Detalles_Pedido.

- que información podrá ver el usuario: 
 . Categorías que tienen productos:
	. Productos dentro de cada categoría
 . Carrito:
	. Visualizar carrito (con los productos que contiene actualmente),
	. Visualizar monto actual del carrito,
 . Página <<Home>> donde se muestra al menos un ítem de cada categoría, seleccionando en base a los últimos cargados al sistema.
 . Notificación de pedido efectuado.
 . Página <<Franquicias>> donde se aprecien datos de contacto como teléfono, direcciones físicas, horarios de atención.

- que acciones podrá realizar, ya sea la primera vez que ingrese a la aplicación como futuros accesos a la misma:

 . Navegar entre categorías, visualizando los productos disponibles en cada una.
 . Navegar también desde y hacia las secciones de <<Franquicias>>, <<Home>>.
 . Carrito:
	. Agregar al carrito producto(s),
	. Remover del carrito producto(s),
	. Cambiar cantidad del producto en el carrito,
	. Efectuar pedido
	. Al reingresar, se le guardará el carrito.
    
Aclaraciones y decisiones de diseño:
    - Se dejaron los seeders para la tabla de cada modelo en particular, aún si se realiza el seeding para las tablas intermedias o las que son resultado de relaciones entre modelos, a partir de un subconjunto de estos módulos de seeders (en sí, no se están usando actualmente todas las TableSeeders para la creación de seeders).
    - Se optó por la solución económica para modelar la relación uno a muchos que hay entre Categoria y Producto, es decir, se almacena la llave foránea de Categoria en la tabla Producto, en vez de crear una tabla intermedia para la relación entre estos dos conjuntos de Entidades (Categoria y Producto).
    - Se crean pedidos con una misma cantidad de productos ya que el rand() emplea un único seed para la generación de cada entidad en el conjunto de entidades: detalles_pedidos. Se decide dejarlo así porque es solo con fines de seeding y a modo de ejemplo. También se definen las entidades del conjunto de entidades: detalles_pedidos con una cantidad fijada en '1', también para simplificar el seeding.
    - Para el seeding, se crea una cantidad fija de 5 categorías y 50 pedidos, donde cada pedido tiene hasta un máximo de 50 productos, y cada producto pertenece a una de estas categorías anteriormente mencionadas.
    - Para los datos que populan los atributos de las entidades, en el Seeding, se utilizó la librería Faker que ya viene incorporada en PHP, aunque, en casos como el atributo 'talle' de Producto, se decidió crear un 'enumerado' de talles a mano para lograr un mejor entendimiento y legibilidad de las entidades en el conjunto 'Productos'.
