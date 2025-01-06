@extends('layouts.app')
@section('title', 'Courses Available')
@push('custom-style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/choices/css/choices.min.css') }}">
@endpush
@section('content')
	<main>
		<!-- Page Banner START -->
		<section class="py-4">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bg-light p-4 text-center rounded-3">
							<h1 class="m-0">Courses</h1>
							<!-- Breadcrumb -->
							<div class="d-flex justify-content-center">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb breadcrumb-dots mb-0">
										<li class="breadcrumb-item"><a href="#">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Courses Available</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Page Banner END -->

		<!-- Page content START -->
		<section class="pt-0">
			<div class="container">

				<!-- Filter bar START -->
				<form class="bg-light border p-4 rounded-3 my-4 z-index-9 position-relative" method="POST" action="{{route('courses.search')}}">
					@csrf
					<div class="row justify-content-center g-3">
						<!-- Input -->
						<div class="col-xl-3">
							<input class="form-control me-1" name="name" type="search" placeholder="Enter keyword">
						</div>

						<!-- Select item -->
						<div class="col-xl-8">
							<div class="row g-3">
								<!-- Select items -->
								<div class="col-sm-6 col-md-3 pb-2 pb-md-0">
									<select name="category" class="form-select form-select-sm js-choice" aria-label=".form-select-sm example">
										<option value="">Categories</option>
										@foreach ($categories as $category)
											<option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
										@endforeach
									</select>
								</div>

								<!-- Search item -->
								<div class="col-sm-6 col-md-3 pb-2 pb-md-0">
									<select name="class" class="form-select form-select-sm js-choice" aria-label=".form-select-sm">
										<option value="">Class type</option>
										@foreach ($class_types as $class)
											<option value="{{ $class->class_type_id }}">{{ $class->class_type_name }}</option>
										@endforeach
									</select>
								</div>

								<!-- Search item -->
								<div class="col-sm-6 col-md-3 pb-2 pb-md-0">
									<select name="price" class="form-select form-select-sm js-choice" aria-label=".form-select-sm">
										<option value="">Price level</option>
										@foreach ($price_types as $price)
											<option value="{{ $price->price_type_id }}">{{ $price->price_type_name }}</option>
										@endforeach
									</select>
								</div>

								<!-- Search item -->
								<div class="col-sm-6 col-md-3 pb-2 pb-md-0">
									<select name="skill" class="form-select form-select-sm js-choice" aria-label=".form-select-sm">
										<option value="">Skill level</option>
										@foreach ($masterclass_levels as $level)
											<option value="{{ $level->masterclass_level_id }}">{{ $level->masterclass_level_name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<!-- Row END -->
						</div>
						<!-- Button -->
						<div class="col-xl-1">
							<button type="submit" class="btn btn-primary mb-0 rounded z-index-1 w-100"><i class="fas fa-search"></i></button>
						</div>
					</div>
					<!-- Row END -->
				</form>
				<!-- Filter bar END -->

				<div class="row mt-3">
					<div class="col-12">
						<div class="row g-4">
							<!-- Card item START -->

							@foreach ($masterclasses as $masterclass)
								<div class="col-sm-6 col-lg-4 col-xl-3">
									<div class="card shadow h-100">
										<!-- Image -->
										<img src="{{ url('/masterclass/thumbnails/' . $masterclass->masterclass_thumbnail) }}"
											class="card-img-top" style="width: 300px; height: 255px" alt="course image">
										<!-- Card body -->
										<div class="card-body pb-0">
											<!-- Badge and favorite -->
											<div class="d-flex justify-content-between mb-2">
												@if ($masterclass->course_class_prices->price_type_name == 'Free')
													<a href="#"
														class="badge bg-success bg-opacity-10 text-success">{{ $masterclass->course_class_prices->price_type_name }}</a>
												@elseif ($masterclass->course_class_prices->price_type_name == 'Paid')
													<a href="#"
														class="badge bg-danger bg-opacity-10 text-danger ">{{ $masterclass->course_class_prices->price_type_name }}</a>
												@endif

											</div>
											<!-- Title -->
											<h5><a href="{{ route('detail.courses', $masterclass->masterclass_slug) }}"
													class="stretched-link">{{ Str::limit($masterclass->masterclass_name, '40', '...') }}</a>
											</h5>
											<p class="mb-2">{{ Str::limit($masterclass->masterclass_short_desc, '30', '...') }}</p>
										</div>
										<!-- Card footer -->
										<div class="card-footer pt-0 pb-3">
											<hr>
											<div class="d-flex justify-content-between">
												<span class="h6 fw-light mb-0"><i
														class="far fa-clock text-danger me-2"></i>{{ $masterclass->masterclass_total_duration }}
												</span>
												<span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i>{{ $masterclass->masterclass_total_curriculum }}</span>
											</div>
										</div>
									</div>
								</div>
								<!-- Card item END -->
							@endforeach
						</div>
						<!-- Course Grid END -->
					</div>
				</div>
				<!-- Main content START -->

				<!-- Pagination START -->
				<div class="col-12">
					<nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
						<ul class="pagination pagination-primary-soft rounded mb-0">
							<li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i
										class="fas fa-angle-double-left"></i></a></li>
							<li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
							<li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
							<li class="page-item mb-0"><a class="page-link" href="#">..</a></li>
							<li class="page-item mb-0"><a class="page-link" href="#">6</a></li>
							<li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a>
							</li>
						</ul>
					</nav>
				</div>
				<!-- Pagination END -->
			</div>
			<!-- Main content END -->
			</div>
			<!-- Row END -->
		</section>
		<!-- Page content END -->

		<!-- Newsletter START -->
		<section class="pt-0">
			<div class="container position-relative overflow-hidden">
				<!-- SVG decoration -->
				<figure class="position-absolute top-50 start-50 translate-middle ms-3">
					<svg>
						<path class="fill-white opacity-2"
							d="m496 22.999c0 10.493-8.506 18.999-18.999 18.999s-19-8.506-19-18.999 8.507-18.999 19-18.999 18.999 8.506 18.999 18.999z" />
						<path class="fill-white opacity-2"
							d="m775 102.5c0 5.799-4.701 10.5-10.5 10.5-5.798 0-10.499-4.701-10.499-10.5 0-5.798 4.701-10.499 10.499-10.499 5.799 0 10.5 4.701 10.5 10.499z" />
						<path class="fill-white opacity-2"
							d="m192 102c0 6.626-5.373 11.999-12 11.999s-11.999-5.373-11.999-11.999c0-6.628 5.372-12 11.999-12s12 5.372 12 12z" />
						<path class="fill-white opacity-2"
							d="m20.499 10.25c0 5.66-4.589 10.249-10.25 10.249-5.66 0-10.249-4.589-10.249-10.249-0-5.661 4.589-10.25 10.249-10.25 5.661-0 10.25 4.589 10.25 10.25z" />
					</svg>
				</figure>
				<!-- Svg decoration -->
				<figure class="position-absolute bottom-0 end-0 mb-5 d-none d-sm-block">
					<svg class="rotate-130" width="258.7px" height="86.9px" viewBox="0 0 258.7 86.9">
						<path stroke="white" fill="none" stroke-width="2"
							d="M0,7.2c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5 c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5s16-25.5,31.9-25.5" />
						<path stroke="white" fill="none" stroke-width="2"
							d="M0,57c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5 c16,0,16,25.5,31.9,25.5c16,0,16-25.5,31.9-25.5c16,0,16,25.5,31.9,25.5s16-25.5,31.9-25.5" />
					</svg>
				</figure>
			</div>
		</section>
		<!-- Newsletter END -->
	</main>

@endsection
@push('custom-script')
	<script src="{{ asset('assets/vendor/choices/js/choices.min.js') }}"></script>
@endpush
