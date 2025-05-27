<?php
// metodos-pago.php
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explora Tabasco - Métodos de Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos específicos para métodos de pago */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f9f4;
            /* Verde claro inspirado en la selva */
            color: #333;
        }

        header {
            background: linear-gradient(to right, #2e7d32, #4caf50);
            /* Verde Tabasco */
            color: white;
            padding: 20px;
            text-align: center;
        }

        .navbar {
            background-color: #1b5e20;
            /* Verde oscuro */
        }

        .navbar a {
            color: white;
            margin: 0 15px;
        }

        #pago-section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin: 20px;
            auto;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0);
        }

        .pago-opciones {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .pago-opcion {
            padding: 10px;
            20px;
            border: 2px solid #50af4c;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .pago-opcion.active {
            background-color: #50af4c;
            color: white;
        }

        .form-pago {
            display: none;
        }

        .form-pago.active {
            display: block;
        }

        .btn-confirmar {
            background-color: #50af4c;
            color: white;
            font-weight: bold;
            transition: transform 0.1s ease;
        }

        .btn-confirmar:active {
            transform: scale(0.95);
            /* Efecto de pulsación */
        }

        #confirmacion {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
            z-index: 1000;
        }

        #confirmacion img {
            width: 50px;
            margin-bottom: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -60%);
            }

            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }

        #codigo-barra {
            display: none;
            margin-top: 20px;
            text-align: center;
        }

        #codigo-barra img {
            width: 200px;
        }

        footer {
            background-color: #1b5e20;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Encabezado -->
    <header>
        <h1>Explora Tabasco</h1>
        <p class="">Vive la magia de la selva, el cacao y la cultura olmeca</p>
    </header>

    <!-- Barra de de Navegación -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Explora Tabasco</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link">Explora Tabasco</a></li>
                    <li class="nav-item"><a href="experiencias.php" class="nav-link">Experiencias</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Mapa</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Carrito</a></li>
                    <li class="nav-item"><a href="metodos-pago.php" class="nav-link">Pagar</a></a>
                    <li>
                    <li class="nav-item"><a href="#" class="nav-link">Soporte</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Métodos de Pago -->
    <section id="pago-section" class="container">
        <h2>Finalizar Pago Pago</h2>
        <div class="pago-opciones">
            <div class="pago-opcion active" onclick="mostrarFormulario('tarjeta')">Tarjeta</div>
            <div class="pago-opcion" onclick="mostrarFormulario('paypal')">PayPal</div>
            <div class="pago-opcion" onclick="mostrarFormulario('oxxo')">OXXO</div>
        </div>
        <div id="form-tarjeta" class="form-pago active">
            <h4>Pago con Tarjeta</h4>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre en la tarjeta</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ej. Ejemplo Pérez">
            </div>
            <div class="mb-3">
                <label for="numero-tarjeta" class="form-label">Número de tarjeta</label>
                <input type="text" class="form-control" id="numero-tarjeta" placeholder="Ej. 1234">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="expiracion" class="form-label">Fecha de expiración</label>
                    <input type="text" class="form-control" id="expiracion" placeholder="MM/AA">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" id="cvv" placeholder="Ej. 123">
                </div>
            </div>
            <button class="btn btn-confirmar" onclick="confirmarPago()">Confirmar Pago</button>
        </div>
        <div id="form-paypal" class="form-pago">
            <h4>Pago con PayPal</h4>
            <div class="mb-3">
                <label for="correo-paypal" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo-paypal" placeholder="Ej. usuario@example.com">
            </div>
            <button class="btn btn-confirmar" onclick="confirmarPago()">Confirmar Pago</button>
        </div>
        <div id="form-oxxo" class="form-pago">
            <h4>Pago en OXXO</h4>
            <p>Haz clic para generar un código de barras y paga en cualquier tienda.</p>
            <button class="btn btn-confirmar" onclick="generarCodigoBarra()">Generar Código de Barra</button>
            <div id="codigo-barra">
                <p><strong>Referencia:</strong> 12345678901234</p>
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAAAyCAYAAACN/h3QAAAACXBIWXMAAAAGAAAAAgFgkYhTAAAAGXRF0WHRTb2Z0d2FyZQ==" alt="Código de barras">
            </div>
        </div>
        <!-- Confirmación de Animada -->
        <div id="confirmacion">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB2klEQVR4nO2ZvW4CMRBF9z+Za6y4AIlc4gp4A9Y7kNhZ8AZsFzdxF3aW0u7OzszuTjRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0zRN0