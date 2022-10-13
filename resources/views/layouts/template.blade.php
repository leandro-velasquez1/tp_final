<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <div>
                    <li><a href="/">API Documentacion</a></li>
                </div>
                <div>
                    <li><a href="/generar-token">Generar Token</a></li>
                    <li><a href="/registrar">Registrarse</a></li>
                </div>
            </ul>
        </nav>
    </header>
    @yield('content')
    <footer>
        <div>
            <div>
                <h3>Acerca de</h3>
            </div>
            <div>
                <h3>Redes</h3>
            </div>
        </div>
    </footer>
</body>
</html>