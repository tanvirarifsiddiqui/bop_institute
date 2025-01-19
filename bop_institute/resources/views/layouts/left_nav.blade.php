<div id="sidebar" class="d-flex flex-column flex-shrink-0 bg-light p-3 side-nav" style="width: 250px; transition: transform 0.3s ease-in-out;">
    <button id="toggleSidebar" class="btn btn-light d-md-none mb-3">
        <span>&#9776; Menu</span>
    </button>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Home
            </a>
        </li>

        <!-- Accordion Section -->
        <li>
            <div class="accordion" id="mainAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#coursesAccordion" aria-expanded="false">
                            Offline Courses
                        </button>
                    </h2>
                    <div id="coursesAccordion" class="accordion-collapse collapse">
                        <ul class="list-group list-group-flush custom-list">
                            <li class="list-group-item"><span>Cosmetic and Toiletries Products</span></li>
                            <li class="list-group-item"><span>Cleaning Items</span></li>
                            <li class="list-group-item"><span>Veterinary Medicine Products</span></li>
                            <li class="list-group-item"><span>Herbal Cosmetic Products</span></li>
                            <li class="list-group-item"><span>Textile Chemicals and Auxiliaries</span></li>
                            <li class="list-group-item"><span>Industrial Chemicals</span></li>
                            <li class="list-group-item"><span>Automobile Products</span></li>
                            <li class="list-group-item"><span>Adhesive Products</span></li>
                            <li class="list-group-item"><span>Paint Items</span></li>
                            <li class="list-group-item"><span>Food Products</span></li>
                            <li class="list-group-item"><span>Tobacco Products</span></li>
                            <li class="list-group-item"><span>Construction Products</span></li>
                            <li class="list-group-item"><span>Software Development</span></li>
                            <li class="list-group-item"><span>Android and iOS Apps Development</span>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#galleryAccordion" aria-expanded="false">
                            Online Courses
                        </button>
                    </h2>
                    <div id="galleryAccordion" class="accordion-collapse collapse">
                        <ul class="list-group list-group-flush custom-list">
                            <li class="list-group-item"><span>Cosmetic and Toiletries Products</span></li>
                            <li class="list-group-item"><span>Cleaning Items</span></li>
                            <li class="list-group-item"><span>Veterinary Medicine Products</span></li>
                            <li class="list-group-item"><span>Herbal Cosmetic Products</span></li>
                            <li class="list-group-item"><span>Textile Chemicals and Auxiliaries</span></li>
                            <li class="list-group-item"><span>Industrial Chemicals</span></li>
                            <li class="list-group-item"><span>Automobile Products</span></li>
                            <li class="list-group-item"><span>Adhesive Products</span></li>
                            <li class="list-group-item"><span>Paint Items</span></li>
                            <li class="list-group-item"><span>Food Products</span></li>
                            <li class="list-group-item"><span>Tobacco Products</span></li>
                            <li class="list-group-item"><span>Construction Products</span></li>
                            <li class="list-group-item"><span>Software Development</span></li>
                            <li class="list-group-item"><span>Android and iOS Apps Development</span>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#labAccordion" aria-expanded="false">
                            Lab Testing
                        </button>
                    </h2>
                    <div id="labAccordion" class="accordion-collapse collapse">
                        <ul class="list-group list-group-flush custom-list">
                            <li class="list-group-item"><span>Lab 1</span></li>
                            <li class="list-group-item"><span>Lab 2</span></li>
                            <li class="list-group-item"><span>Lab 3</span></li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#formulaAccordion" aria-expanded="false">
                            Formula Books
                        </button>
                    </h2>
                    <div id="formulaAccordion" class="accordion-collapse collapse">
                        <ul class="list-group list-group-flush custom-list">
                            <li class="list-group-item"><span>Formula 1</span></li>
                            <li class="list-group-item"><span>Formula 2</span></li>
                            <li class="list-group-item"><span>Formula 3</span></li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#softwareAccordion" aria-expanded="false">
                            Software
                        </button>
                    </h2>
                    <div id="softwareAccordion" class="accordion-collapse collapse">
                        <ul class="list-group list-group-flush custom-list">
                            <li class="list-group-item"><span>Software 1</span></li>
                            <li class="list-group-item"><span>Software 2</span></li>
                            <li class="list-group-item"><span>Software 3</span></li>
                        </ul>
                    </div>
                </div>

            </div>
        </li>
        <!-- End Accordion Section -->

    </ul>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggleSidebar');

    toggleSidebar.addEventListener('click', () => {
        sidebar.style.transform = sidebar.style.transform === 'translateX(-250px)' ? 'translateX(0)' : 'translateX(-250px)';
    });

    // Ensure the sidebar is always visible on larger screens
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            sidebar.style.transform = 'translateX(0)';
        }
    });
</script>

<style>
    /* Custom Styles for Sidebar Items */
    .list-group-item {
        display: flex;
        align-items: center;
        justify-content: start;
        padding: 0.75rem 1.25rem;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .list-group-item span {
        font-size: 1rem;
        font-weight: 500;
        color: #495057; /* Neutral dark color */
    }

    .list-group-item:hover {
        background-color: #f8f9fa; /* Light hover effect */
        color: #0d6efd; /* Bootstrap primary color */
    }

    /* Remove text underline from links and make them span-like */
    .list-group-item a {
        text-decoration: none;
        color: inherit;
    }

    /* Accordion Header Style */
    .accordion-button {
        font-weight: 600;
        color: #343a40;
        background-color: #e9ecef;
        border: none;
    }

    .accordion-button:focus {
        box-shadow: none;
    }

    .accordion-button:hover {
        background-color: #dfe4ea;
    }
</style>
