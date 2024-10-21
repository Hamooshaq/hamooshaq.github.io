const username = 'Hamooshaq'; // Ganti dengan username GitHub Anda
const portfolioItemsDiv = document.getElementById('portfolio-items');

fetch(`https://api.github.com/users/${username}/repos`)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(repos => {
        repos.forEach(repo => {
            const projectDiv = document.createElement('div');
            projectDiv.classList.add('portfolio-item');
            projectDiv.innerHTML = `
                <h3>${repo.name}</h3>
                <p>${repo.description || 'Deskripsi tidak tersedia.'}</p>
                <a href="${repo.html_url}" target="_blank">Lihat Proyek</a>
            `;
            portfolioItemsDiv.appendChild(projectDiv);
        });
    })
    .catch(error => {
        console.error('Error fetching repositories:', error);
        portfolioItemsDiv.innerHTML = '<p>Gagal memuat proyek.</p>';
    });
