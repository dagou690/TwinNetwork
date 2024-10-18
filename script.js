document.addEventListener('DOMContentLoaded', function() {
    const titles = document.querySelectorAll('.titrefiliere div');
    const descriptions = document.querySelectorAll('.descriptiontitreTWIN, .descriptiontitreESATIC');

    titles.forEach((title, index) => {
        title.addEventListener('click', () => {
            titles.forEach(t => t.classList.remove('active'));
            descriptions.forEach(d => d.classList.remove('active'));

            title.classList.add('active');
            descriptions[index].classList.add('active');
        });
    });

    // Activer TWIN par défaut
    titles[0].classList.add('active');
    descriptions[0].classList.add('active');
});