# Proyecto IAW

## Idea y fundamentos
Nuestro idea esta pensada desde la nostalgia, queremos algo que de alguna forma nos haga poder cumplir sue¤os lejanos.
A partir de esto pensamos en poder unir esta nostalgia con la pasion por los vehiculos e ideamos un *servicio de alquiler de vehiculos* clasicos, pero no solo clasicos por antiguos, sino vehiculos que hemos visto en la television, en las peliculas de cine y en nuestras queridas series.

## Diagrama ER

 <!--  <img src="https://i.imgur.com/eJJUDT5.png">  -->
<img src="https://i.imgur.com/wSWOlFF.png">

## Actualizacion de datos (Framework PHP - Laravel)
En primer lugar, tenemos la entidad de "Usuario" que contendra la informacion basica de los usuarios que se registran en el sistema, como su nombre, correo electronico y contrase¤a. A partir de esta entidad, podemos definir los roles de los usuarios y las relaciones entre ellos. Estos roles son:

- Administrador: sera el encargado de administrar el sistema, y tendra acceso a todas las funciones del mismo.
	-- Tiene la posibilidad de hacer ABM sobre todas las entidades del sistema.
- Empleado: tendra acceso limitado al sistema, segun los permisos que le otorgue el administrador.
	-- Puede crear reservas, modificar ciertos datos y crear nuevas publicaciones de autos recien llegados.
- Cliente: sera el usuario final del sistema, que podra reservar y alquilar vehiculos.
	-- Consulta y paga por el servicio.

Ahora vamos a definir las entidades que estaran relacionadas con los usuarios:

- Vehiculo: contendra la informacion de los vehiculos disponibles para alquilar, como su marca, modelo y precio.
- Reserva: contendra la informacion de las reservas realizadas por los clientes, como el vehiculo alquilado, la fecha de inicio y fin del alquiler, y el precio final.
- Comentario: los clientes podran dejar comentarios y valoraciones sobre los vehiculos y el servicio. (Posiblemente)

## Servicio web que provee
El servicio podra brindar reservas de autos clasicos, filtrados por los siguientes atributos:
- Marca
- A¤o o Modelo
- Precio

## Visualizacion y Acceso a la Informacion (Javascript - React)
Como dijimos al principio podremos recordar y cumplir sue¤os nostalgicos logrando alquilar nuestro coche deseado, haciendo una busqueda filtrada por distintos antributos ya nombrados. Tambien podremos visualizar la coleccion de vehiculos de forma cronologica a los que esten disponibles y hacer un camino del pasado al futuro recorriendo epocas. Existira un apartado para poder investigar sobre los distintos coches y cual fue su historia y como fue que se consiguio.
