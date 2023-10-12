// URL da API da TMDB para obter os últimos filmes
const latestMoviesURL = `https://api.themoviedb.org/3/movie/now_playing?api_key=${apiKey}&language=pt-BR&page=1&sort_by=release_date.desc`;

const upcomingURL = `https://api.themoviedb.org/3/discover/movie?api_key=${apiKey}&language=pt-BR&primary_release_date.gte=${formattedToday}&primary_release_date.lte=${formattedNextWeek}`;

// Função para exibir a lista de filmes
function displayMovieList() {

    fetch(latestMoviesURL)
        .then(response => response.json())
        .then(data => {
            const movies = data.results.slice(0, 5); // Pega os primeiros 5 filmes
            const leftMovieList = document.querySelector('#left-movie-items');

            movies.forEach((movie) => {
                const listItem = document.createElement('li');
                listItem.classList.add('list-group-item');

                listItem.innerHTML = `
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center" style="height: 35px;">
                <img src="https://image.tmdb.org/t/p/w185${movie.poster_path}" alt="${movie.title}" class="rounded-circle" style="width: 40px; height: 40px;">
                <h5 class="ms-3 movie-title-mobile-limit" title="${movie.title}">${movie.title}</h5>
            </div>
            <span class="badge bg-secondary badge-custom" style="width: 70px; height: 25px;">Nota: ${movie.vote_average}</span>
        </div>
        `;

                leftMovieList.appendChild(listItem);
            });
        })
        .catch(error => console.error('Erro ao obter a lista de filmes:', error));

    fetch(upcomingURL)
        .then(response => response.json())
        .then(data => {
            const movies = data.results.slice(0, 5); // Pega os primeiros 5 filmes
            const rightMovieList = document.querySelector('#right-movie-items');

            movies.forEach((movie) => {
                const listItem = document.createElement('li');
                listItem.classList.add('list-group-item');

                listItem.innerHTML = `
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center" style="height: 35px;">
                    <img src="https://image.tmdb.org/t/p/w185${movie.poster_path}" alt="${movie.title}" class="rounded-circle" style="width: 40px; height: 40px;">
                    <h5 class="ms-3 movie-title-mobile-limit">${movie.title}</h5>
                </div>
                <span class="badge bg-secondary badge-custom" style="width: 120px; height: 25px;">Data: ${movie.release_date}</span>
            </div>
        `;

                rightMovieList.appendChild(listItem);
            });
        })
        .catch(error => console.error('Erro ao obter a lista de filmes:', error));
}

displayMovieList();