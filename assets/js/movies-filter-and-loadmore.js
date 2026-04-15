let currentPage = 1;
let currentGenre = '';
let currentSort = 'rating';
let currentYearFrom = '';
let currentYearTo = '';
let canLoad = true;

async function loadMovies(reset = false) {
    if (!canLoad) return;

    const loader = document.getElementById('loader');

    if (loader) loader.style.display = 'block';

    try {
        const formData = new FormData();
        formData.append('action', 'load_movies');
        formData.append('page', currentPage);
        formData.append('genre', currentGenre);
        formData.append('sort', currentSort);
        formData.append('year_from', currentYearFrom);
        formData.append('year_to', currentYearTo);

        const response = await fetch(moviesScriptObj.ajaxurl, {
            method: 'POST',
            body: formData
        });

        const data = await response.json();
        const container = document.getElementById('movies-grid');

        if (reset) {
            container.innerHTML = '';
        }

        container.insertAdjacentHTML('beforeend', data.html);

        if (currentPage >= data.max_pages) {
            document.getElementById('movies-load-more').style.display = 'none';
            canLoad = false;
        } else {
            currentPage++;
        }

    } catch (error) {
        console.log('Error:', error);
    } finally {
        if (loader) loader.style.display = 'none';
    }
}

function applyFilters() {
    currentGenre = document.getElementById('movie-genres').value;
    currentSort = document.getElementById('movie-sort').value;
    currentYearFrom = document.getElementById('movie-year-from').value;
    currentYearTo = document.getElementById('movie-year-to').value;
    currentPage = 1;
    canLoad = true;
    document.getElementById('movies-load-more').style.display = 'block';
    document.getElementById('movies-grid').innerHTML = '';
    loadMovies(true);
}

document.addEventListener('DOMContentLoaded', function() {
    const submitBtn = document.getElementById('movies-filter-submit');
    if (submitBtn) {
        submitBtn.addEventListener('click', applyFilters);
    }

    const loadMoreBtn = document.getElementById('movies-load-more');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', () => loadMovies(false));
    }

    loadMovies(true);
});