<div class="container-fluid px-0">
    <div class="card bg-blue h-100px h-md-200px rounded-0"
        style="background:url({{ asset('assets/images/pattern/05.png') }}) no-repeat center center; background-size:cover;">
    </div>
</div>
<div class="container mt-n4">
    <div class="row">
        <div class="col-12">
            <div class="card bg-transparent card-body pb-0 ps-0 mt-2 mt-sm-0">
                <div class="row d-sm-flex justify-sm-content-between mt-2 mt-md-0">
                    <!-- Avatar -->
                    <div class="col-auto">
                        <div class="avatar avatar-xxl position-relative mt-n3">
                            @php
                                $get_initial = explode(' ', ucwords(Auth::user()->full_name));
                                $initial_name = count($get_initial) > 1 ? substr($get_initial[0], 0, 1) . substr($get_initial[1], 0, 1) : substr($get_initial[0], 0, 1);
                                $color = ['bg-primary', 'bg-warning', 'bg-info', 'bg-danger', 'bg-success', 'bg-dark'];
                            @endphp

                            @if (Auth::user()->provider_id != null)
                                <img class="avatar-img rounded-circle border border-white bg-light border-3 shadow"
                                    src="{{ Auth::user()->profile_picture }}" alt="avatar">
                            @else
                                @if (in_array(Auth::user()->profile_picture, $color))
                                    <div
                                        class="avatar-img rounded-circle border border-white border-3 shadow {{ Auth::user()->profile_picture }}">
                                        <span
                                            class="text-white position-absolute top-50 start-50 translate-middle fw-bold fs-1">{{ $initial_name }}</span>
                                    </div>
                                @else
                                    <img class="avatar-img rounded-circle border border-white border-3 shadow"
                                        src="{{ Auth::user()->profile_picture }}" alt="avatar">
                                @endif
                            @endif
                        </div>
                    </div>
                    <!-- Profile info -->
                    <div class="col d-sm-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="my-1 fs-4">{{ Auth::user()->full_name }}</h1>
                            {{-- <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"> --}}
                            {{-- <i --}}
                            {{-- class="fas fa-star text-warning me-2"></i>4.5/5.0 --}}
                            {{-- </li> --}}
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item h6 me-3 mb-1 mb-sm-0">
                                    <i class="bi bi-award-fill text-primary me-1 fs-5"></i>
                                    <span class="h6">3</span>
                                    <span class="text-body fw-light">Certificates</span>
                                </li>
                                <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                    <i class="bi bi-bookmark-check-fill text-purple me-1 fs-5"></i>
                                    <span class="h6">7</span>
                                    <span class="text-body fw-light">Completed courses</span>
                                </li>
                                <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                    <i class="bi bi-journal-bookmark-fill text-orange me-1 fs-5"></i>
                                    <span class="h6">52</span>
                                    <span class="text-body fw-light">Completed lessons</span>
                                </li>
                            </ul>
                        </div>
                        <!-- Button -->
                        <div class="mt-2 mt-sm-0">
                            <a href="{{ route('student.mycourse') }}" class="btn btn-outline-primary mb-0">View my
                                courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Advanced filter responsive toggler START -->
        <!-- Divider -->
    </div>
    <hr class="d-xl-none">
    <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
        <a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
        <button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <i class="fas fa-sliders-h"></i>
        </button>
    </div>
    <!-- Advanced filter responsive toggler END -->
</div>
