<div id="sidebar" class="d-flex flex-column bg-light p-3 side-nav" style="width: 250px; transition: transform 0.3s ease-in-out;">
    <ul class="nav nav-pills flex-column mb-auto">
        <!-- Fixed Sidebar Items -->
        <li class="nav-item mb-3">
            <a href="{{ url('/') }}" class="nav-link active d-flex align-items-center">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                <span>Home</span>
            </a>
        </li>

        <!-- Offline Courses -->
        <li class="nav-item mb-3">
            <a href="#" class="nav-link d-flex align-items-center">
                <i class="fas fa-chalkboard-teacher me-2"></i>
                <span>Offline Courses</span>
            </a>
        </li>

        <!-- Online Courses -->
        <li class="nav-item mb-3">
            <a href="#" class="nav-link d-flex align-items-center">
                <i class="fas fa-laptop-code me-2"></i>
                <span>Online Courses</span>
            </a>
        </li>

        <!-- Lab Testing -->
        <li class="nav-item mb-3">
            <a href="#" class="nav-link d-flex align-items-center">
                <i class="fas fa-vials me-2"></i>
                <span>Lab Testing</span>
            </a>
        </li>

        <!-- Formula Books (Dynamic) -->
        <li class="nav-item mb-3">
            <div class="accordion" id="formulaBooksAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#formula-books" aria-expanded="false">
                            <i class="fas fa-book me-2"></i>
                            <span>Formula Books</span>
                        </button>
                    </h2>
                    <div id="formula-books" class="accordion-collapse collapse">
                        <ul class="list-group list-group-flush custom-list">
                            @foreach($categories as $category)
                                <li class="list-group-item-primary" >
                                    <button  class="btn text-start w-100 d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#category-{{ $category->id }}">
                                        {{ $category->name }}
                                    </button>
                                    <ul class="collapse mt-2 ps-3" id="category-{{ $category->id }}">
                                        @if($category->formulas->isNotEmpty())
                                            @foreach($category->formulas as $formula)
                                                <li class="list-group-item d-flex align-items-center">
                                                    <a href="{{ route('formula.profile', $formula->id) }}" class="text-decoration-none" style="font-size: 10px">{{ $formula->title }}</a>
                                                </li>
                                            @endforeach
                                        @else
                                            <li class="list-group-item">No formulas available</li>
                                        @endif
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </li>

        <!-- Software -->
        <li class="nav-item mb-3">
            <a href="#" class="nav-link d-flex align-items-center">
                <i class="fas fa-laptop me-2"></i>
                <span>Software</span>
            </a>
        </li>
    </ul>
</div>
