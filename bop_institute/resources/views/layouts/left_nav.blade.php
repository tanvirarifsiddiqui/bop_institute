<div id="sidebar" class="d-flex flex-column bg-light p-3 side-nav" style="width: 250px; transition: transform 0.3s ease-in-out;">

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link active">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Home
            </a>
        </li>

        <!-- Accordion Section -->
        <li>
            <div class="accordion" id="mainAccordion">
                @php
                    $sections = [
                        'Offline Courses' => [
                            'Cosmetic and Toiletries Products',
                            'Cleaning Items',
                            'Veterinary Medicine Products',
                            'Herbal Cosmetic Products',
                            'Textile Chemicals and Auxiliaries',
                            'Industrial Chemicals',
                            'Automobile Products',
                            'Adhesive Products',
                            'Paint Items',
                            'Food Products',
                            'Tobacco Products',
                            'Construction Products',
                            'Software Development',
                            'Android and iOS Apps Development'
                        ],
                        'Online Courses' => [
                            // Same content as above or modify as required
                        ],
                        'Lab Testing' => ['Lab 1', 'Lab 2', 'Lab 3'],
                        'Formula Books' => ['Formula 1', 'Formula 2', 'Formula 3'],
                        'Software' => ['Software 1', 'Software 2', 'Software 3']
                    ];
                @endphp

                @foreach($sections as $section => $items)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ Str::slug($section) }}" aria-expanded="false">
                                {{ $section }}
                            </button>
                        </h2>
                        <div id="{{ Str::slug($section) }}" class="accordion-collapse collapse">
                            <ul class="list-group list-group-flush custom-list">
                                @foreach($items as $item)
                                    <li class="list-group-item"><span>{{ $item }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </li>
        <!-- End Accordion Section -->
    </ul>
</div>
