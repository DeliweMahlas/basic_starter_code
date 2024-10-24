<form action="{{ route('rate.agent') }}" method="POST" id="rating-form">
    @csrf
    <input type="hidden" name="agent_id" value="{{ $agent->id }}">
    <input type="hidden" name="agent_id" value="{{ $agent->id }}">
    <div class="star-rating">
        <span class="star" data-value="1">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="5">&#9733;</span>
    </div>
    <input type="hidden" name="rating" id="rating" value="">

    <div class="form-group">
        <label for="review">Review (optional):</label>
        <textarea name="review" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Rating</button>
</form>

<style>
    .star-rating {
        direction: rtl;
        display: inline-block;
    }

    .star {
        font-size: 30px;
        cursor: pointer;
        color: #ccc; /* Default star color */
    }

    .star:hover,
    .star:hover ~ .star {
        color: gold; /* Color when hovered */
    }

    .star.selected {
        color: gold; /* Color for selected stars */
    }
</style>

<script>
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const ratingValue = star.getAttribute('data-value');
            ratingInput.value = ratingValue; // Set the hidden input value
            updateStarSelection(ratingValue); // Update selected stars
        });
    });

    function updateStarSelection(ratingValue) {
        stars.forEach(star => {
            star.classList.remove('selected'); // Remove selection from all stars
            if (star.getAttribute('data-value') <= ratingValue) {
                star.classList.add('selected'); // Add selection to the clicked and previous stars
            }
        });
    }
</script>