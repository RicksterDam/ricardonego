<?php
// carrito.php
// Este archivo es estático, pero usa extensión .php para tu flujo de trabajo
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explora Tabasco - Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Estilos específicos para el carrito */
        #carrito-section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin: 20px auto;
            max-width: 1200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .carrito-table img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }

        .carrito-table th,
        .carrito-table td {
            vertical-align: middle;
            text-align: center;
        }

        .carrito-table .btn-sm {
            padding: 5px 10px;
        }

        .resumen-compra {
            background-color: #f4f9f4;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .carrito-vacio {
            text-align: center;
            padding: 50px;
            color: #555;
        }

        .btn-continuar {
            background-color: #4caf50;
            color: white;
            font-weight: bold;
        }

        .btn-continuar:hover {
            background-color: #388e3c;
        }
    </style>
</head>

<body>
    <!-- Encabezado -->
    <header>
        <h1>Explora Tabasco</h1>
        <p>Vive la magia de la selva, el cacao y la cultura olmeca</p>
    </header>

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Explora Tabasco</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="explora-tabasco.php">Explora Tabasco</a></li>
                    <li class="nav-item"><a class="nav-link" href="experiencias.php">Experiencias</a></li>
                    <li class="nav-item"><a class="nav-link" href="mapa.php">Mapa</a></li>
                    <li class="nav-item"><a class="nav-link" href="atencion-cliente.php">Soporte</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carrito de Compras -->
    <section id="carrito-section" class="container">
        <h2>Tu Carrito de Compras</h2>
        <div id="carrito-vacio" class="carrito-vacio" style="display: none;">
            <h4>¡Tu carrito está vacío!</h4>
            <p>Explora nuestras experiencias y comienza tu aventura en Tabasco.</p>
            <a href="experiencias.php" class="btn btn-success">Ver Experiencias</a>
        </div>
        <table class="table carrito-table" id="carrito-table" style="display: none;">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Experiencia</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="carrito-items"></tbody>
        </table>
        <div class="resumen-compra" id="resumen-compra" style="display: none;">
            <h4>Resumen de Compra</h4>
            <p>Subtotal: $<span id="subtotal">0</span> MXN</p>
            <p>IVA (10%): $<span id="iva">0</span> MXN</p>
            <p><strong>Total: $<span id="total">0</span> MXN</strong></p>
            <a href="metodos-pago.php" class="btn btn-continuar">Proceder al Pago</a>
            <a href="http://localhost/nego2/experiencia.html" class="btn btn-outline-secondary ms-2">Seguir Comprando</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2025 Explora Tabasco. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Carrito de Compras
        let carrito = [
            // Ítems predefinidos para simular
            {
                id: 1,
                nombre: 'Ruta del Cacao',
                precio: 1200,
                cantidad: 1,
                imagen: 'https://via.placeholder.com/80x60?text=Ruta+del+Cacao'
            },
            {
                id: 2,
                nombre: 'Tour Pantanos de Centla',
                precio: 1500,
                cantidad: 2,
                imagen: 'https://via.placeholder.com/80x60?text=Pantanos+de+Centla'
            }
        ];

        function actualizarCarrito() {
            const table = document.getElementById('carrito-table');
            const vacio = document.getElementById('carrito-vacio');
            const resumen = document.getElementById('resumen-compra');
            const items = document.getElementById('carrito-items');
            const subtotalEl = document.getElementById('subtotal');
            const ivaEl = document.getElementById('iva');
            const totalEl = document.getElementById('total');

            // Mostrar u ocultar secciones
            if (carrito.length === 0) {
                table.style.display = 'none';
                resumen.style.display = 'none';
                vacio.style.display = 'block';
                return;
            } else {
                table.style.display = 'table';
                resumen.style.display = 'block';
                vacio.style.display = 'none';
            }

            // Actualizar tabla
            items.innerHTML = '';
            let subtotal = 0;
            carrito.forEach((item, index) => {
                const subtotalItem = item.precio * item.cantidad;
                subtotal += subtotalItem;
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><img src="${item.imagen}" alt="${item.nombre}"></td>
                    <td>${item.nombre}</td>
                    <td>$${item.precio} MXN</td>
                    <td>
                        <button class="btn btn-outline-secondary btn-sm" onclick="cambiarCantidad(${index}, -1)">-</button>
                        <span class="mx-2">${item.cantidad}</span>
                        <button class="btn btn-outline-secondary btn-sm" onclick="cambiarCantidad(${index}, 1)">+</button>
                    </td>
                    <td>$${subtotalItem} MXN</td>
                    <td><button class="btn btn-danger btn-sm" onclick="eliminarItem(${index})">Eliminar</button></td>
                `;
                items.appendChild(row);
            });

            // Actualizar resumen
            const iva = subtotal * 0.10; // 10% IVA simulado
            const total = subtotal + iva;
            subtotalEl.textContent = subtotal.toFixed(2);
            ivaEl.textContent = iva.toFixed(2);
            totalEl.textContent = total.toFixed(2);
        }

        function cambiarCantidad(index, cambio) {
            carrito[index].cantidad += cambio;
            if (carrito[index].cantidad < 1) {
                carrito[index].cantidad = 1; // Mínimo 1
            }
            actualizarCarrito();
        }

        function eliminarItem(index) {
            carrito.splice(index, 1);
            actualizarCarrito();
        }

        // Simular agregar al carrito (para pruebas)
        function agregarAlCarrito(nombre, precio, imagen) {
            const item = carrito.find(i => i.nombre === nombre);
            if (item) {
                item.cantidad++;
            } else {
                carrito.push({
                    id: carrito.length + 1,
                    nombre,
                    precio,
                    cantidad: 1,
                    imagen
                });
            }
            actualizarCarrito();
        }

        // Inicializar carrito
        document.addEventListener('DOMContentLoaded', actualizarCarrito);
    </script>
</body>

</html>