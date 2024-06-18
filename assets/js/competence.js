document.addEventListener('DOMContentLoaded', function () {
    const loadMoreButton = document.getElementById('loadMore');
    let itemsToShow = window.innerWidth <= 790 ? 8 : 9; // 8 items for responsive, 9 items for larger screens
    const certificatItems = document.querySelectorAll('.certificat__item');

    function applyStyles() {
        certificatItems.forEach((item, index) => {
            if (index < itemsToShow) {
                item.style.display = 'flex';
                item.style.alignItems = 'center';
                item.style.justifyContent = 'center';
            } else {
                item.style.display = 'none';
            }
        });
    }

    if (loadMoreButton) {
        loadMoreButton.addEventListener('click', function () {
            itemsToShow += window.innerWidth <= 790 ? 8 : 9; // Increment by 8 or 9 items
            applyStyles();

            // Hide the button if all items are displayed
            if (itemsToShow >= certificatItems.length) {
                loadMoreButton.style.display = 'none';
            }
        });
    }

    // Initial application of styles
    applyStyles();

    // Reapply styles on window resize to adapt to screen changes
    window.addEventListener('resize', function () {
        itemsToShow = window.innerWidth <= 790 ? 8 : 9;
        applyStyles();
    });
});


