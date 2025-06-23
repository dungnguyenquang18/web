document.addEventListener('DOMContentLoaded', function() {
    // Handle star ratings
    const ratingInputs = document.querySelectorAll('.rating-input');
    
    ratingInputs.forEach(container => {
        const stars = container.querySelectorAll('.fa-star');
        
        stars.forEach(star => {
            star.addEventListener('mouseover', function() {
                const rating = this.dataset.rating;
                highlightStars(stars, rating);
            });

            star.addEventListener('mouseout', function() {
                const selectedRating = container.dataset.selected || 0;
                highlightStars(stars, selectedRating);
            });

            star.addEventListener('click', function() {
                const rating = this.dataset.rating;
                container.dataset.selected = rating;
                highlightStars(stars, rating);
            });
        });
    });

    function highlightStars(stars, rating) {
        stars.forEach(star => {
            const starRating = star.dataset.rating;
            if (starRating <= rating) {
                star.classList.remove('far');
                star.classList.add('fas');
            } else {
                star.classList.remove('fas');
                star.classList.add('far');
            }
        });
    }
});