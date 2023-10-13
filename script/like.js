const heartIcon = document.getElementById('heart-icon');
const likeCount = document.getElementById('like-count');
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

    // Função para obter o contador de curtidas do servidor
    function updateLikeCount() {
        $.ajax({
            url: 'backend/obter_contador_likes.php',
            type: 'GET',
            success: function (response) {
                // Atualize o contador de curtidas com o valor retornado do servidor
                likeCount.innerText = response;
            }
        });
    }

    // Verifique o status do like e a contagem de curtidas ao carregar a página
    checkLikeStatus();
    updateLikeCount();

    // Adicione o manipulador de eventos para alternar o like
    heartIcon.addEventListener('click', function () {
        isLiked = !isLiked;
        if (isLiked) {
            heartIcon.classList.remove('far', 'text-danger');
            heartIcon.classList.add('fas', 'text-danger');

            // Mostrar a seção de seguir e dar estrela com uma transição suave
        const followStarSection = document.querySelector('.follow-star-section');
        followStarSection.classList.add('active');
        } else {
            heartIcon.classList.remove('fas', 'text-danger');
            heartIcon.classList.add('far', 'text-danger');

            // Ocultar a seção de seguir e dar estrela com uma transição suave
        const followStarSection = document.querySelector('.follow-star-section');
        followStarSection.classList.remove('active');
        }
        updateLikeStatus(isLiked);
    });

    // Função para atualizar o status do like no servidor
    function updateLikeStatus(isLiked) {
        $.ajax({
            url: 'backend/add_remove_likes.php',
            type: 'POST',
            data: { isLiked: isLiked },
            success: function () {
                // Após adicionar ou remover o like, atualize o contador de curtidas
                updateLikeCount();
            }
        });
    }