<!-- Header START -->
<header class="navbar-light navbar-sticky header-static">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container-fluid px-3 px-xl-5">
			<!-- Logo START -->
			<a class="navbar-brand" href="/">
				<img class="light-mode-item navbar-brand-item" src="{{ asset('assets/images/logo.png') }}" alt="logo"
					style="max-width: 200px;">
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
				aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</button>

			<!-- Main navbar START -->
			<div class="navbar-collapse w-100 collapse" id="navbarCollapse">

				<!-- Nav category menu START -->
				<ul class="navbar-nav navbar-nav-scroll me-auto">
					<!-- Nav item 1 Demos -->
					<li class="nav-item dropdown dropdown-menu-shadow-stacked">
						<a class="nav-link bg-warning bg-opacity-10 rounded-3 text-warning px-3 py-3 py-xl-0" href="#"
							id="categoryMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
								class="bi bi-ui-radios-grid me-2"></i><span>Category</span></a>
						<ul class="dropdown-menu" aria-labelledby="categoryMenu">
							<li><a class="dropdown-item" href="/categories">Web Development</a></li>
						</ul>
					</li>
				</ul>
				<!-- Nav category menu END -->

				<!-- Nav Main menu START -->
				<ul class="navbar-nav navbar-nav-scroll me-auto">
					<!-- Nav item 1 Demos -->
					{{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle color=#f7c32e" href="#" id="demoMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Masterclass</a>
                    <ul class="dropdown-menu" aria-labelledby="demoMenu">
                        <li> <a class="dropdown-item active" href="#">React Native Android Fundamental</a></li>
                        <li> <a class="dropdown-item" href="#">React Native Firebase</a></li>
                        <li> <a class="dropdown-item" href="#">Web Development Laravel</a></li>
                    </ul>
                    </li> --}}
					<li class="nav-item">
						<a class="nav-link" href="{{ route('courses') }}" aria-haspopup="true" aria-expanded="false">Courses</a>

					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="demoMenu" data-bs-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">Instructor</a>
						<ul class="dropdown-menu" aria-labelledby="demoMenu">
							<li><a class="dropdown-item" href="{{ route('become.instructor') }}">Become Instructor</a>
							</li>
							<li><a class="dropdown-item" href="{{ route('list.instructor') }}">Instructor List</a>
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="demoMenu" data-bs-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">About</a>
						<ul class="dropdown-menu" aria-labelledby="demoMenu">
							<li><a class="dropdown-item" href="{{ route('about.basicschool') }}">About Mind Mingle</a>
							</li>
							<li><a class="dropdown-item" href="{{ route('about') }}">About Us</a></li>
							<li><a class="dropdown-item" href="{{ route('contact') }}">Contact Us</a></li>
						</ul>
					</li>
					<!-- Nav item 4 Megamenu-->
					<li class="nav-item dropdown dropdown-fullwidth">
						<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">Others</a>
						<div class="dropdown-menu dropdown-menu-end pb-0" data-bs-popper="none">
							<div class="row p-4 g-4">
								<!-- Dropdown column item -->
								<div class="col-xl-6 col-xxl-3">
									<h6 class="mb-0">Getting Started</h6>
									<hr>
									<ul class="list-unstyled">
										<li><a class="dropdown-item" href="#">Web Developers</a></li>
										<li><a class="dropdown-item" href="#">Android Developers</a></li>
										<li><a class="dropdown-item" href="#">UI/UX Designers</a></li>
										<li><a class="dropdown-item" href="#">Data Scientist</a></li>
										<li><a class="dropdown-item" href="#">AWS Cloud Developers</a></li>
										<li><a class="dropdown-item" href="#">IT Consultant</a></li>
									</ul>
								</div>

								<!-- Dropdown column item -->
								<div class="col-xl-6 col-xxl-3">
									<h6 class="mb-0">Help</h6>
									<hr>
									<!-- Dropdown item -->
									<div class="mb-2 position-relative bg-primary-soft-hover rounded-2 transition-base p-3">
										<a class="stretched-link h6 mb-0" href="{{ route('help') }}">Guide</a>
										<p class="mb-0 small text-truncate-2">Panduan lengkap untuk memulai perjalanan belajar Anda di Mind Mingle, 
											dari pendaftaran hingga menyelesaikan kursus.</p>
									</div>
									<!-- Dropdown item -->
									<div class="mb-2 position-relative bg-primary-soft-hover rounded-2 transition-base p-3">
										<a class="stretched-link h6 mb-0" href="{{ route('help') }}">Privacy
											and security</a>
										<p class="mb-0 small text-truncate-2">Pelajari bagaimana kami melindungi data pribadi Anda dan menjaga 
											keamanan informasi di platform kami.</p>
									</div>
									<!-- Dropdown item -->
									<div class="mb-2 position-relative bg-primary-soft-hover rounded-2 transition-base p-3">
										<a class="stretched-link h6 mb-0" href="{{ route('help') }}">Term and
											services</a>
										<p class="mb-0 small text-truncate-2">Baca syarat dan ketentuan yang berlaku saat menggunakan layanan Mind Mingle.</p>
									</div>
								</div>

								<!-- Dropdown column item -->
								<div class="col-xl-6 col-xxl-3">
									<h6 class="mb-0">Check Certificate</h6>
									<hr>
									<!-- Dropdown item -->
									<div class="mb-2 position-relative bg-primary-soft-hover rounded-2 transition-base p-3">
										<a class="stretched-link h6 mb-0" href="{{ route('certificate.check') }}">Search
											Certificate</a>
										<p class="mb-0 small text-truncate-2">If you have completed the course, you can
											view your certificate here.</p>
									</div>

								</div>

								<!-- Dropdown column item -->
								<div class="col-xl-6 col-xxl-3">
									<h6 class="mb-0">Mind Mingle Support</h6>
									<hr>
									<img src="{{ asset('assets/images/element/15.svg') }}" alt="">

									<!-- Download button -->
									<div class="row g-2 justify-content-center mt-3">
										<!-- Google play store button -->
										<div class="col-6 col-sm-4 col-xxl-6">
											<a href="#">support@mindmingle.co.id</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
				<!-- Nav Main menu END -->

				<!-- Nav Search START -->
				<div class="nav my-3 my-xl-0 px-4 flex-nowrap align-items-center">
					<div class="nav-item w-100">
						<form class="position-relative">
							<input class="form-control pe-5 bg-transparent" type="search" placeholder="Search" aria-label="Search">
							<button class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
								type="submit"><i class="fas fa-search fs-6 "></i></button>
						</form>
					</div>
				</div>
				<!-- Nav Search END -->
			</div>

			<!-- Main navbar END -->
			@auth
				<div class="dropdown ms-1 ms-lg-0">
					<a class="avatar avatar-sm p-0 align-middle" href="#" id="profileDropdown" role="button"
						data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						@php
							$get_initial = explode(' ', ucwords(Auth::user()->full_name));
							$initial_name = count($get_initial) > 1 ? substr($get_initial[0], 0, 1) . substr($get_initial[1], 0, 1) : substr($get_initial[0], 0, 1);
							$color = ['bg-primary', 'bg-warning', 'bg-info', 'bg-danger', 'bg-success', 'bg-dark'];
						@endphp

						@if (Auth::user()->provider_id != null)
							<img class="avatar-img rounded-circle" src="{{ Auth::user()->profile_picture }}" alt="avatar">
						@else
							@if (in_array(Auth::user()->profile_picture, $color))
								<div class="avatar-img rounded-circle {{ Auth::user()->profile_picture }}"><span
										class="text-white position-absolute top-50 start-50 translate-middle fw-bold">{{ $initial_name }}</span>
								</div>
							@else
								<img class="avatar-img rounded-circle" src="{{ Auth::user()->profile_picture }}" alt="avatar">
							@endif
						@endif
					</a>
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-3">
									@if (!Auth::user()->provider_id)
										<div
											class="avatar-img rounded-circle border border-white border-3 shadow {{ Auth::user()->profile_picture }}">
											<span
												class="text-white position-absolute top-50 start-50 translate-middle fw-bold">{{ $initial_name }}</span>
										</div>
									@else
										@if (in_array(Auth::user()->profile_picture, $color))
											<div
												class="avatar-img rounded-circle border-white border-3 shadow bg-light {{ Auth::user()->profile_picture }}">
												<span
													class="text-white position-absolute top-50 start-50 translate-middle fw-bold">{{ $initial_name }}</span>
											</div>
										@else
											<img class="avatar-img rounded-circle border-white border-3 shadow bg-light"
												src="{{ Auth::user()->profile_picture }}" alt="avatar">
										@endif
									@endif
								</div>
								<div>
									<a class="h6" href="{{ route('student.index', Auth::user()->id) }}">{{ Auth::user()->full_name }}</a>
									<p class="small m-0">{{ Auth::user()->email }}</p>
								</div>
							</div>
							<hr>
						</li>
						<!-- Links -->
						@if(Auth::user()->role_id ==2)
						<li><a class="dropdown-item" href="{{ route('student.edit', Auth::user()->username) }}"><i
									class="bi bi-person fa-fw me-2"></i>Edit
								Profile</a>
						</li>
						<li><a class="dropdown-item" href="{{ route('student.setting') }}"><i class="bi bi-gear fa-fw me-2"></i>Account
								Settings</a>
						</li>
						<li><a class="dropdown-item" href="{{ route('help') }}"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a>
						</li>

						<li><a class="dropdown-item bg-danger-soft-hover" href="{{ route('logout') }}"
								onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
									class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
						@elseif(Auth::user()->role_id ==3)
						<li><a class="dropdown-item" href="{{ route('instructor.edit', Auth::user()->username) }}"><i
							class="bi bi-person fa-fw me-2"></i>Edit
						Profile</a>
				</li>
				<li><a class="dropdown-item" href="{{ route('instructor.setting') }}"><i class="bi bi-gear fa-fw me-2"></i>Account
						Settings</a>
				</li>
				<li><a class="dropdown-item" href="{{ route('help') }}"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a>
				</li>

				<li><a class="dropdown-item bg-danger-soft-hover" href="{{ route('logout') }}"
						onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();"><i
							class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
						@endif
						<form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
							@csrf
						</form>
					</ul>
				</div>
			@else
				<div class="login">
					<!-- Profile START -->
					<a href="{{ route('login') }}" class="btn btn-warning mb-0">LOGIN</a>
					<!-- Profile START -->
				</div>
			@endauth
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- Header END -->
