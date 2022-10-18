<p align="center">TP Final - API registro de personas</p>

## About TP Final

API registro de personas es una aplicacion web que esta conformada por 2 partes, la primera es el sitio web que contiene 3 paginas, API documentation, Generar token y Registrarse, el sitio web esta organizado de la siguiente manera:
* Header, contiene la barra de navegacion dentro de esta se encuentran los items API documentation, generar token y registrarse mediante esta barra podemos acceder a las diferentes paginas que nos ofrece el sitio
* Una seccion por pagina, en cada una de estas secciones se encuentra la informacion principal de cada pagina:
     - API documentation, su etiqueta section esta compuesta por distintas etiquetas de bloque div que contienen informacion referente a cada end-point de la API acerca de como podemos consumir dicho end-point cuales son los datos que necesitamos pasarle a la solicitud para que sea exitosa y cuales son las distintas respuestas que nos va enviar la API
     - Generar token, aca encontramos un formulario mediante el cual al ingresar nuestro nombre de usuario y contraseña se va realizar una validacion para comprobar que los datos ingresados son correctos, una vez que se verifica que la informacion ingresada es correcta el sitio nos genera un token de acceso, este token de acceso es almacenado en una tabla en la base de datos y la pagina nos entrega este token mostrandonoslo mediante una vista, con este token vamos a poder consumir la API llamando a sus distintos end-points.
     -  Registrarse, aca vamos a encontrar un formulario para rellenar nuestros datos y poder registrarnos para poder solicitar nuestro token, esta pagina tambien posee validaciones para comprobar que la informacion enviada es valida y pueda ser procesada por la aplicacion

Luego tenemos la segunda parte de la aplicacion web la cual esta formada por los diferentes end-points a los cuales podemos acceder en total son 4:
* GET /persons, obtiene todos los registros de la base de datos
* POST /persons, nos permite almacenar una persona en el registro de personas
* PUT /persons, nos permite modificar los datos de una persona en el registro de personas
* DELETE /persons, nos permite eliminar una persona del registro de personas mediante su id

Tambien tenemos la base de datos de la aplicacion formada por 3 tablas mas las tablas que vienen por defecto con Laravel:
* page_users, en esta tabla se encuentran almacenados los usuarios que se registran en el sitio web para poder solicitar un token
* access_user_tokens_page, aca estan almacenados los tokens de acceso que se solicitan en la pagina Generar token, solamente se almacena un token por usuario si el usuario ya tenia un token almacenado y vuelve a solicitar otro el anterior es reemplazado por el ultimo que solicito, la tabla tiene una llave foranea que lo relaciona a la columna id de la tabla page_users
* register_people, en esta tabla se encuentran los registros de las personas, nombre, apellido, telefono, direccion de su casa, con esta tabla trabajan los end-points de la API, los metodos GET, POST, PUT, DELETE afectan a esta tabla

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
