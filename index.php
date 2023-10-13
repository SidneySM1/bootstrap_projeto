<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Guia de filmes</title>
    <link rel="stylesheet" href="dependencias/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="icon" type="img/logo.png" href="/images/favicon.ico">

</head>

<body>
<div class="banner-wrapper">
    <div class="banner">
        <div class="banner-title">
            <h1>O Guia de filmes</h1>
            <p class="mb-0">Gostou do meu projeto? &#128073; &#128072;</p>
            <i class="far fa-heart" id="heart-icon"></i>
            <span class="like-counter" id="like-count">0</span>

            <div class="follow-star-section">
                <p class="mb-0">Ja que gostou tanto...</p>
                <div class="follow-button">
                    <a href="https://github.com/SidneySM1" target="_blank">
                    <i class="fa-brands fa-github"></i>Seguir GitHub
                    </a>
                </div>
                <div class="star-button">
                    <a href="https://github.com/SidneySM1/bootstrap_projeto" target="_blank">
                    <i class="fa-solid fa-star"></i> Dar estrela
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>




    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Logo"
                    style="max-height: 50px; border-radius: 50%;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Filmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Favoritos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-2" id="movie-list">
        <div class="row">
            <div class="col-md-6" id="column-left">
                <h4>Em cartaz atualmente</h4>
                <!-- Lista de filmes da coluna esquerda -->
                <ul class="list-group" id="left-movie-items">

                </ul>
            </div>
            <div class="col-md-6" id="column-right">
                <h4>Proximos lançamentos populares</h4>
                <!-- Lista de filmes da coluna direita -->
                <ul class="list-group" id="right-movie-items">

                </ul>
            </div>
        </div>
    </div>

    <hr>
    <div class="container" id="latest-movies">
        <h2>Populares por <img src="img/tmdb.svg" alt="Logo"style="max-height: 50px;"></h2>
        <div class="container py-4">
        <div class="row"></div>
        </div>
    </div>



    <footer>
        <div class="footer-content">
            <p>&copy; 2023 Guia dos filmes - Sidney Mota</p>
            <p>Projeto feito para fins de estudos, buscando desenvolver minhas habilidades no desenvolvimento web</p>
            <ul class="footer-links">
                <li><a href="#">Termos de Uso</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </div>
    </footer>


    <!-- dependencias -->
    <script src="dependencias/jquery/dist/jquery.min.js"></script>
    <script src="dependencias/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="dependencias/bootstrap_js/bootstrap.min.js"></script>

    <Script>
        // Chave de API da TMDB
        const apiKey = '470788af43665e829539028df3fbc330';
    </Script>
    <script src="script/formatDate.js"></script>
    <script src="script/listaAtuais&Novos.js"></script>
    <script src="script/popularMovies.js"></script>

    <!-- API fontawesome -->
    <script src="https://kit.fontawesome.com/4901ca35cb.js" crossorigin="anonymous"></script>
    <script src="script/like.js"></script>

</body>

</html>