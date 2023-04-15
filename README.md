# Proyecto IAW

## Idea y fundamentos
Nuestro idea esta pensada desde la nostalgia, queremos algo que de alguna forma nos haga poder cumplir sue¤os lejanos.
A partir de esto pensamos en poder unir esta nostalgia con la pasion por los vehiculos e ideamos un *servicio de alquiler de vehiculos* clasicos, pero no solo clasicos por antiguos, sino vehiculos que hemos visto en la television, en las peliculas de cine y en nuestras queridas series.

## Diagrama ER

 <!-- 
 Inicialmente el diagrama que teniamos es el siguiente 
 <img src="https://i.imgur.com/wSWOlFF.png">
 -->
El diagrama entidad relacion resultante se puede encontrar en la raiz del repositorio como "ER.png"

Dentro del diagrama entidad relacion se encuentran 4 entidades las cuales son:
-Marcas: donde se encontraran identificadas las marcas de las cuales podran ser los vehiculos de nuestro sistema con su id y nombre.
-Vehiculo: donde se encontraran los vehiculos que se posee en el negocio con su informacion sobre la marca, si estan disponibles o no (porque ya fueron reservados), su precio y modelo.
-Reserva: donde se encuentran las reservas realizadas por los clientes, identificando la reserva por un id y al cliente por su mail
-ReservaDetalles: donde se encontrara informacion mas detallada sobre cierta reserva como su vehiculo y el precio de la reserva.

## Framework PHP - Laravel

Dentro del proyecto laravel se podran actualizar dos de las entidades, siendo que el administrador podra hacer altas, bajas o modificaciones de las marcas y los vehiculos disponibles.

Se podran generar reportes sobre las reservas realizadas y su informacion detallada ya que es informacion relevante para el administrador.
Ademas, se generaran informes sobre los vehiculos actualmente en el negocio, estando reservados o no.

Con respecto a la API, 
<!-- no se que poner sobre la API-->

## Visualizacion y Acceso a la Informacion (Javascript - React)
Como dijimos al principio podremos recordar y cumplir sue¤os nostalgicos logrando alquilar nuestro coche deseado, haciendo una busqueda filtrada por distintos antributos ya nombrados. Tambien podremos visualizar la coleccion de vehiculos de forma cronologica a los que esten disponibles y hacer un camino del pasado al futuro recorriendo epocas. Existira un apartado para poder investigar sobre los distintos coches y cual fue su historia y como fue que se consiguio.
