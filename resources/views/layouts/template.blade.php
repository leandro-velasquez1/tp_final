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
    <header class="header">
        <nav class="nav">
            <ul class="menu">
                <li class="menu__li"><a class="menu__a" href="/">API Documentacion</a></li>
                <li class="menu__li"><a class="menu__a" href="/generar-token">Generar Token</a></li>
                <li class="menu__li"><a class="menu__a" href="/registrar">Registrarse</a></li>
            </ul>
        </nav>
    </header>
    <div class="main-container">
        @yield('content')
    </div>
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