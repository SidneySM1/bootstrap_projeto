const popularMoviesURL = `https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}&language=pt-BR&page=1`;
        
        function displayPopularMovies() {
            fetch(popularMoviesURL)
                .then(response => response.json())
                    .then(data => {
                        const movies = data.results.slice(0, 10); // Pega os primeiros 10 filmes
                        const moviesContainer = document.querySelector('#latest-movies .row');
                        
                        movies.forEach(movie => {
                            // Aqui você pode adicionar a região desejada no URL da API
                            const region = 'BR'; // Altere para a região desejada
                            // Faça uma solicitação separada para obter informações das plataformas disponíveis com a região definida
                            fetch(`https://api.themoviedb.org/3/movie/${movie.id}/watch/providers?api_key=${apiKey}&watch_region=${region}`)
                                .then(response => response.json())
                                    .then(watchData => {
                                        // Montar o card do filme com as informações das plataformas
                                        const movieCard = `
                                        <div class="movie-card">
                                            <div class="movie-card-img">
                                            <img src="https://image.tmdb.org/t/p/w185${movie.poster_path}" alt="${movie.title}">
                                            </div>
                                            <div class="movie-card-content">
                                                <h3>${movie.title}</h3>
                                                <p>Data de Lançamento: ${movie.release_date}</p>
                                                <div class="bar"></div>
                                                <p class="movie-synopsis">${movie.overview}</p>
                                                <ul class="movie-details custom-details">
                                                    <li>Titulo original: ${movie.original_title}</li>
                                                    <li>|</li>
                                                    <li>Nota: <i class="fa-solid fa-star" style="color: yellow;"></i>${movie.vote_average}/10</li>
                                                    <li>|</li>
                                                    <li>Plataforma: ${extractPlatforms(watchData)}</li>
                                                </ul>
                                            </div>
                                        </div>
                        `;
                        moviesContainer.innerHTML += movieCard;
                    })
                    .catch(error => console.error('Erro ao obter informações das plataformas:', error));
            });
        })
        .catch(error => console.error('Erro ao obter os últimos filmes:', error));
}

function extractPlatforms(watchData) {
    const platforms = watchData.results[Object.keys(watchData.results)[0]];
    if (platforms && platforms.flatrate) {
        const availableProviders = platforms.flatrate.map(provider => {
            const providerName = provider.provider_name || 'Nome não disponível';
            return providerName;
        });
        return availableProviders.join(', ');
    }
    return 'Não disponível em plataformas conhecidas';
}



displayPopularMovies();