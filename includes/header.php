<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda Electrónica</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        h1 {
            margin: 0;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        nav ul li a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            background-color: #555;
        }
        #inicio-btn, #carrito-btn {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }
        #login-btn {
            display: flex;
            align-items: center;
            margin-right: 50px; /* Ajuste del margen derecho para mover el botón más a la izquierda */
        }
        .nav-btn {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            font-size: 16px;
        }
        .nav-btn img {
            margin-right: 10px;
            height: 30px;
        }
    </style>
</head>
<body>
    <header>
        <div id="inicio-btn">
            <a href="index.php" class="nav-btn">
                <img src="img/3d-home-icon-free-png.webp" alt="Inicio"> 
                Inicio
            </a>
        </div>
        <h1>Tienda Electrónica</h1>
        <nav>
            <ul>
                <li id="login-btn">
                    <a href="login.html" class="nav-btn">
                        <img src="img/login-icon.png" alt="Iniciar Sesión">
                        Iniciar Sesión
                    </a>
                </li>
                <li id="carrito-btn">
                    <a href="index.php?module=carrito" class="nav-btn">
                        
                        <img src="img/pngtree-red-shopping-cart-icon-png-free-image_2284820.jpg" alt="Carrito">
                        Carrito
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
