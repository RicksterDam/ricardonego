<?php
// experiencias.php
// Vista estática para el catálogo de experiencias
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explora Tabasco - Experiencias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos específicos para experiencias */
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

        #catalogo-section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin: 20px auto;
            max-width: 1200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .experiencia-card {
            border: none;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .experiencia-card:hover {
            transform: scale(1.05);
        }

        .experiencia-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .experiencia-card .card-body {
            padding: 20px;
        }

        .experiencia-card .card-title {
            font-size: 1.5rem;
            color: #2e7d32;
        }

        .experiencia-card .card-text {
            font-size: 1rem;
            color: #555;
        }

        .experiencia-card .price {
            font-weight: bold;
            color: #4caf50;
        }

        .experiencia-card .duration {
            font-style: italic;
            color: #777;
        }

        .filtros {
            margin-bottom: 20px;
            background-color: #f4f9f4;
            padding: 15px;
            border-radius: 8px;
        }

        .filtros button {
            margin: 0 5px;
        }

        .btn-agregar {
            background-color: #4caf50;
            color: white;
            transition: transform 0.1s ease;
        }

        .btn-agregar:active {
            transform: scale(0.95);
            /* Efecto de pulsación */
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
                    <li class="nav-item"><a class="nav-link" href="carrito.php">Carrito</a></li>
                    <li class="nav-item"><a class="nav-link" href="metodos-pago.php">Pagar</a></li>
                    <li class="nav-item"><a class="nav-link" href="atencion-cliente.php">Soporte</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Catálogo de Experiencias -->
    <section id="catalogo-section" class="container">
        <h2>Nuestras Experiencias</h2>
        <div class="filtros">
            <h5>Filtrar por categoría:</h5>
            <button class="btn btn-outline-success" onclick="filtrar('todas')">Todas</button>
            <button class="btn btn-outline-success" onclick="filtrar('naturaleza')">Naturaleza</button>
            <button class="btn btn-outline-success" onclick="filtrar('cultura')">Cultura</button>
            <button class="btn btn-outline-success" onclick="filtrar('aventura')">Aventura</button>
        </div>
        <div class="row" id="catalogo">
            <div class="col-md-4 experiencia-card" data-categoria="cultura">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200?text=Ruta+del+Cacao" class="card-img-top" alt="Ruta del Cacao">
                    <div class="card-body">
                        <h5 class="card-title">Ruta del Cacao</h5>
                        <p class="card-text">Explora Comalcalco, cuna del cacao, y participa en un taller de chocolate artesanal. Descubre la historia olmeca y el proceso del cacao.</p>
                        <p class="price">$1,200 MXN</p>
                        <p class="duration">Duración: 4 horas</p>
                        <button class="btn btn-agregar">Agregar al Carrito</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 experiencia-card" data-categoria="naturaleza">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200?text=Pantanos+de+Centla" class="card-img-top" alt="Pantanos de Centla">
                    <div class="card-body">
                        <h5 class="card-title">Tour Pantanos de Centla</h5>
                        <p class="card-text">Navega por la Reserva de la Biosfera, hogar de cocodrilos, aves exóticas y manglares. Una experiencia única en la naturaleza tabasqueña.</p>
                        <p class="price">$1,500 MXN</p>
                        <p class="duration">Duración: 6 horas</p>
                        <button class="btn btn-agregar">Agregar al Carrito</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 experiencia-card" data-categoria="aventura">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200?text=Yumka" class="card-img-top" alt="Yumka">
                    <div class="card-body">
                        <h5 class="card-title">Aventura en Yumká</h5>
                        <p class="card-text">Disfruta de un safari ecológico en el zoológico de Villahermosa, con animales y paisajes que te conectan con la selva.</p>
                        <p class="price">$800 MXN</p>
                        <p class="duration">Duración: 3 horas</p>
                        <button class="btn btn-agregar">Agregar al Carrito</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 experiencia-card" data-categoria="cultura">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200?text=La+Venta" class="card-img-top" alt="Zona Arqueológica La Venta">
                    <div class="card-body">
                        <h5 class="card-title">Zona Arqueológica La Venta</h5>
                        <p class="card-text">Visita el museo al aire libre con las icónicas cabezas colosales olmecas y aprende sobre la cuna de Mesoamérica.</p>
                        <p class="price">$900 MXN</p>
                        <p class="duration">Duración: 3 horas</p>
                        <button class="btn btn-agregar">Agregar al Carrito</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2025 Explora Tabasco. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Filtros
        function filtrar(categoria) {
            const cards = document.querySelectorAll('.experiencia-card');
            cards.forEach(card => {
                if (categoria === 'todas' || card.dataset.categoria === categoria) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>