<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guida de filmes</title>
    <link rel="stylesheet" href="dependencias/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/card.css">
</head>

<body>
    <div class="banner-wrapper">
        <div class="banner">
            <div class="banner-title">
                <h1>O Guia de filmes</h1>
                <p>Gostou do meu projeto? <i class="far fa-heart" id="heart-icon"></i></p>
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


    <div class="container" id="movie-list">
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
        <h2>Populares</h2>
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


    <script src="https://kit.fontawesome.com/4901ca35cb.js" crossorigin="anonymous"></script>


    <script>
    const heartIcon = document.getElementById('heart-icon');
    let isLiked = false;

    // Função para verificar o status do like no servidor
    function checkLikeStatus() {
        $.ajax({
            url: 'backend/verificar_like.php',
            type: 'GET',
            success: function (response) {
                if (response === 'true') {
                    isLiked = true;
                    heartIcon.classList.remove('far', 'text-danger');
                    heartIcon.classList.add('fas', 'text-danger');
                } else {
                    isLiked = false;
                    heartIcon.classList.remove('fas', 'text-danger');
                    heartIcon.classList.add('far', 'text-danger');
                }
            }
        });
    }

    // Verifique o status do like ao carregar a página
    checkLikeStatus();

    // Adicione o manipulador de eventos para alternar o like
    heartIcon.addEventListener('click', function () {
        isLiked = !isLiked;
        if (isLiked) {
            heartIcon.classList.remove('far', 'text-danger');
            heartIcon.classList.add('fas', 'text-danger');
        } else {
            heartIcon.classList.remove('fas', 'text-danger');
            heartIcon.classList.add('far', 'text-danger');
        }
        updateLikeStatus(isLiked);
    });

    // Função para atualizar o status do like no servidor
    function updateLikeStatus(isLiked) {
        $.ajax({
            url: 'backend/add_remove_likes.php',
            type: 'POST',
            data: { isLiked: isLiked },
            success: function (response) {
                // Trate a resposta do servidor, se necessário
            }
        });
    }
</script>


</body>

</html>