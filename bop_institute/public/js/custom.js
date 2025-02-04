const sidebar = document.getElementById('sidebar');
const toggleSidebar = document.getElementById('toggleSidebar');

// Toggle sidebar visibility
toggleSidebar.addEventListener('click', () => {
    const isCollapsed = sidebar.style.transform === 'translateX(-250px)';
    sidebar.style.transform = isCollapsed ? 'translateX(0)' : 'translateX(-250px)';
});

// Ensure sidebar visibility on larger screens
window.addEventListener('resize', () => {
    if (window.innerWidth >= 768) {
        sidebar.style.transform = 'translateX(0)';
    } else {
        sidebar.style.transform = 'translateX(-250px)';
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const carousel = document.querySelector(".formula-carousel");
    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");

    // Scroll left
    prevBtn.addEventListener("click", function () {
        carousel.scrollBy({ left: -200, behavior: "smooth" });
    });

    // Scroll right
    nextBtn.addEventListener("click", function () {
        carousel.scrollBy({ left: 200, behavior: "smooth" });
    });
});


