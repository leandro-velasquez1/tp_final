<p align="center">TP Final - API registro de personas</p>

## Instalacion

Una vez clonamos el repositorio o lo descargamos comprimido en zip, debemos entrar a la carpeta del proyecto y estando en la raiz abrimos una terminal y ejecutamos los siguientes comandos:
  - composer install
  - cp .env.example .env
  - php artisan key:generate
  - php artisan migrate , Cuando ejecutamos este comando si previamente no creamos la base de datos con el nombre tp_final laravel nos va dar la opcion de crearla automaticamente en ese caso escribimos yes y presionamos Enter cuando nos pregunte
  - php artisan db:seed, Este comando es opcional lo usamos si queremos cargar la base de datos con datos de prueba para consumir la API
  - php artisan serve
  - Listo ahora simplemente abrimos una pestaña del navegador e ingresamos a la direccion url que nos proporciono laravel para el servidor local

## About TP Final

API registro de personas es una aplicacion web que esta conformada por 2 partes, la primera es el sitio web que contiene 4 paginas, API documentation, Generar token, Registrarse y Acerca de, el sitio web esta organizado de la siguiente manera:
* Header, contiene la barra de navegacion dentro de esta se encuentran los items API documentation, generar token, registrarse y 'acerca de' mediante esta barra podemos acceder a las diferentes paginas que nos ofrece el sitio
* Una seccion por pagina, en cada una de estas secciones se encuentra la informacion principal de cada pagina:
     - API documentation, su etiqueta section esta compuesta por distintas etiquetas de bloque div que contienen informacion referente a cada end-point de la API acerca de como podemos consumir dicho end-point cuales son los datos que necesitamos pasarle a la solicitud para que sea exitosa y cuales son las distintas respuestas que nos va enviar la API
     - Generar token, aca encontramos un formulario mediante el cual al ingresar nuestro nombre de usuario y contraseña se va realizar una validacion para comprobar que los datos ingresados son correctos, una vez que se verifica que la informacion ingresada es correcta el sitio nos genera un token de acceso, este token de acceso es almacenado en una tabla en la base de datos y la pagina nos entrega este token mostrandonoslo mediante una vista, con este token vamos a poder consumir la API llamando a sus distintos end-points.
     -  Registrarse, aca vamos a encontrar un formulario para rellenar nuestros datos y poder registrarnos para poder solicitar nuestro token, esta pagina tambien posee validaciones para comprobar que la informacion enviada es valida y pueda ser procesada por la aplicacion
     -  Acerca de, en esta seccion vamos a encontrar una breve descripcion acerca de la aplicacion y nos va a proporcionar un enlace que al hacerle click nos va abrir una nueva ventana y nos va a redireccionar a este archivo README.md que contiene toda la informacion referente a la logica y el uso de esta aplicacion

Luego tenemos la segunda parte de la aplicacion web la cual esta formada por los diferentes end-points a los cuales podemos acceder en total son 4, debemos anteponer siempre antes del end-point la palabra api/:
* GET /persons, obtiene todos los registros de la base de datos
* POST /persons, nos permite almacenar una persona en el registro de personas
* PUT /persons, nos permite modificar los datos de una persona en el registro de personas
* DELETE /persons, nos permite eliminar una persona del registro de personas mediante su id

Tambien tenemos la base de datos de la aplicacion formada por 3 tablas mas las tablas que vienen por defecto con Laravel:
* page_users, en esta tabla se encuentran almacenados los usuarios que se registran en el sitio web para poder solicitar un token
* access_user_tokens_page, aca estan almacenados los tokens de acceso que se solicitan en la pagina Generar token, solamente se almacena un token por usuario si el usuario ya tenia un token almacenado y vuelve a solicitar otro el anterior es reemplazado por el ultimo que solicito, la tabla tiene una llave foranea que lo relaciona a la columna id de la tabla page_users
* register_people, en esta tabla se encuentran los registros de las personas, nombre, apellido, telefono, direccion de su casa, con esta tabla trabajan los end-points de la API, los metodos GET, POST, PUT, DELETE afectan a esta tabla

Utilizamos migraciones para definir la estructura de cada tabla de esta forma conseguimos tener un mayor control y un mejor seguimiento a los distintos cambios que se realizen en la estructura de la base de datos asi tambien permite a nuestros compañeros actualizar y tener disponibles con mayor facilidad los distintos cambios que ocurran en la estructura de la base de datos evitando errores.

Para cargar la tabla register_people con datos y poder hacer pruebas utilizamos una factory denominada RegisterPeopleFactory la cual se encuentra en database/factories, los datos los obtuvimos haciendo uso de la libreria faker.

En el lado del back de la aplicacion tambien tenemos en total 5 controladores, 4 de ellos se encargan de administrar sus respectivas paginas en el sitio web y 1 de ellas es la encargada de recibir y procesar las distintas solicitudes que se le hacen a la API:
* Controladores del sitio web:
   - IndexController, este controlador es el encargado de la pagina inicial API Documentation, solamente posee un metodo __invoke() que es el encargado de retornar la vista que se va ser mostrada en la pagina
   - RegisterController, luego este controlador se encarga de la pagina Registrarse posee 2 metodos create() y store(), create() se encarga de mostrar la vista en la cual se encuentra el formulario para registrar al usuario, por su lado store() es el que recibe la informacion introducida en el formulario, aca se realiza la validacion de la informacion y se instancia un model para poder almacenar al usuario en la base de datos, como ultimo paso realiza una redireccion a API Documentation enviando un mensaje para que se muestre en pantalla informando que el usuario fue registrado exitosamente.
   - TokenController, este controlador tiene en total 2 metodos, el metodo index() el cual se encarga de retornar una vista la cual contiene el formulario para solicitar un token de acceso y el otro metodo es generateToken() este metodo se encarga de procesar la informacion enviada en el formulario y si los datos son correctos genera un token, este token es almacenado en la base de datos, luego se hace una direccion a API Documentation donde se muestra un mensaje en pantalla informando que el token fue creado con exito y se expone en pantalla dicho token.
   -  AboutController, este controlador posee un unico metodo el cual es __invoke() que es el encargado de mostrar la vista correspondiente a la seccion About/Acerca de
* Controladores de la API:
   - PersonController, este controlador es el encargado de procesar las solicitudes de los distintos metodos GET, POST, PUT y DELETE hechas a la API, posee 4 metodos, getAll() encargado del GET, store() encargado de POST, update() encargado de PUT y delete() se encarga de DELETE todos ellos se ocupan de la misma ruta la cual es /persons pero son responsables de distintos verbos HTTP

Otro punto importante es que para conectarnos con la base de datos y extraer o insertar recursos hacemos uso del ORM de Eloquent para ello hacemos uso de Models, en total tenemos 4 Models, 3 creados por nosotros y 1 que viene por defecto con Laravel. Cada Model se encarga de una tabla, estan asignados de la siguiente forma:
  - AccessUserTokenPage, se encarga de los tokens ya sea almacenar un nuevo token o consultar un token en la base de datos, la tabla que tiene asociada es access_user_tokens_page
  - PageUser, este Model es el encargado de almacenar y realizar consultas a la tabla page_users
  - RegisterPeople, tiene asignada la tabla register_people mediante este model hacemos uso de la Factory RegisterPeopleFactory para generar los datos de prueba que luego van a ser consumidos al llamar a la API