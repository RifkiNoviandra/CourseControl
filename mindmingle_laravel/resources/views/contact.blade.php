@extends('layouts.app')
@section('title', 'Contact Us')
@section('content')
	<!-- **************** MAIN CONTENT START **************** -->
	<main>

		<!-- Page Banner START -->
		<section class="pt-5 pb-0"
			style="background-image:url({{ asset('assets/images/element/map.svg') }}); background-position: center left; background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-xl-6 text-center mx-auto">
						<!-- Title -->
						<h1 class="mb-4">Contact us</h1>
					</div>
				</div>

				<!-- Contact info box -->
				<div class="row g-4 g-md-5 mt-0 mt-lg-3">
					<!-- Box item -->
					<div class="col-lg-4 offset-lg-2 mt-lg-0">
						<div class="card card-body bg-warning shadow py-5 text-center h-100">
							<!-- Title -->
							<h5 class="text-white mb-3">Mind Mingle</h5>
							<ul class="list-inline mb-0">
								<!-- Address -->
								<li class="list-item mb-3">
									<a href="#" class="text-white"> <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>Jl. Ciparay No. 20B,
										Kujangsari, Kecamatan Bandung Kidul, Kota Bandung </a>
								</li>
								<!-- Phone number -->
								<li class="list-item mb-3">
									<a href="#" class="text-white"> <i class="fas fa-fw fa-phone-alt me-2"></i>(123) 4567890</a>
								</li>
								<!-- Email id -->
								<li class="list-item mb-0">
									<a href="#" class="text-white"> <i class="far fa-fw fa-envelope me-2"></i>mindmingle@gmail.co.id </a>
								</li>
							</ul>
						</div>
					</div>

					<!-- Box item -->
					<div class="col-lg-4 mt-lg-0">
						<div class="card card-body shadow py-5 text-center h-100">
							<!-- Title -->
							<h5 class="mb-3">PT Basicteknologi Intersolusi Tersinergi</h5>
							<ul class="list-inline mb-0">
								<!-- Address -->
								<li class="list-item mb-3 h6 fw-light">
									<a href="#"> <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>Graha DLA, Jl.
										Otto Iskandar Dinata No.392, Nyengseret, Kec. Astanaanyar, Kota Bandung, Jawa Barat
										40242 </a>
								</li>
								<!-- Phone number -->
								<li class="list-item mb-3 h6 fw-light">
									<a href="#"> <i class="fas fa-fw fa-phone-alt me-2"></i>(022) 87505374 </a>
								</li>
								<!-- Email id -->
								<li class="list-item mb-0 h6 fw-light">
									<a href="#"> <i class="far fa-fw fa-envelope me-2"></i>info@basicteknologi.co.id
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- =======================
																																											Page Banner END -->

		<!-- =======================
																																											Image and contact form START -->
		<section>
			<div class="container">
				<div class="row g-4 g-lg-0 align-items-center">

					<div class="col-md-6 align-items-center text-center">
						<!-- Image -->
						<img src="{{ asset('assets/images/element/contact.svg') }}" class="h-400px" alt="">

						<!-- Social media button -->
						<div class="d-sm-flex align-items-center justify-content-center mt-2 mt-sm-4">
							<h5 class="mb-0">Follow us on:</h5>
							<ul class="list-inline mb-0 ms-sm-2">
								<li class="list-inline-item"> <a class="fs-5 me-1 text-facebook" href="#"><i
											class="fab fa-fw fa-facebook-square"></i></a> </li>
								<li class="list-inline-item"> <a class="fs-5 me-1 text-instagram" href="#"><i
											class="fab fa-fw fa-instagram"></i></a> </li>
							</ul>
						</div>
					</div>

					<!-- Contact form START -->
					<div class="col-md-6">
						<!-- Title -->
						<h2 class="mt-4 mt-md-0">Contact Form</h2>

						<form>
							<!-- Name -->
							<div class="mb-4 bg-light-input">
								<label for="yourName" class="form-label">Your name *</label>
								<input type="text" class="form-control form-control-lg" id="yourName">
							</div>
							<!-- Email -->
							<div class="mb-4 bg-light-input">
								<label for="emailInput" class="form-label">Email address *</label>
								<input type="email" class="form-control form-control-lg" id="emailInput">
							</div>
							<!-- Message -->
							<div class="mb-4 bg-light-input">
								<label for="textareaBox" class="form-label">Message *</label>
								<textarea class="form-control" id="textareaBox" rows="4"></textarea>
							</div>
							<!-- Button -->
							<div class="d-grid">
								<button class="btn btn-lg btn-primary mb-0" type="button">Send Message</button>
							</div>
						</form>
					</div>
					<!-- Contact form END -->
				</div>
			</div>
		</section>
		<!-- Image and contact form END -->

		<!-- Map START -->
		<section class="pt-0">
			<div class="container">
				<div class="row">
					<div class="col-12">

						<iframe class="w-100 h-400px grayscale rounded" height="500" style="border:0;" aria-hidden="false" tabindex="0"
							src="https://maps.google.com/maps?q=pt.%20basicteknologi&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0"
							scrolling="no" marginheight="0" marginwidth="0"></iframe>

					</div>
				</div>
			</div>
		</section>

	</main>
	<!-- **************** MAIN CONTENT END **************** -->
@endsection
