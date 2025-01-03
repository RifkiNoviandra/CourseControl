@extends('layouts.app')
@push('custom-style')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/tiny-slider/tiny-slider.css') }}">
@endpush
@section('title', 'Detail course')
@section('content')
	<main>

		<!-- Page intro START -->
		<section class="bg-light py-0 py-sm-5">
			<div class="container">
				<div class="row py-5">
					<div class="col-lg-8">
						<!-- Title -->
						<h1>{{ $masterclass->masterclass_name }}</h1>
						<!-- Badge -->
						<h6 class="mb-3 font-base bg-primary text-white py-2 px-4 rounded-2 d-inline-block">
							{{ $masterclass->course_categories->category_name }}
						</h6>
						<!-- Content -->
					</div>
				</div>
			</div>
		</section>
		<!-- Page intro END -->

		<!-- Page content START -->
		<section class="pb-0 py-lg-5">
			<div class="container">
				<div class="row">
					<!-- Main content START -->
					<div class="col-lg-8">
						<div class="card shadow rounded-2 p-0">
							<!-- Tabs START -->
							<div class="card-header border-bottom px-4 py-3">
								<ul class="nav nav-pills nav-tabs-line py-0" id="course-pills-tab" role="tablist">
									<!-- Tab item -->
									<li class="nav-item me-2 me-sm-4" role="presentation">
										<button class="nav-link mb-2 mb-md-0 active" id="course-pills-tab-1" data-bs-toggle="pill"
											data-bs-target="#course-pills-1" type="button" role="tab" aria-controls="course-pills-1"
											aria-selected="true">Overview</button>
									</li>
								</ul>
							</div>
							<!-- Tabs END -->

							<!-- Tab contents START -->
							<div class="card-body p-4">
								<div class="tab-content pt-2" id="course-pills-tabContent">
									<!-- Content START -->
									<div class="tab-pane fade show active" id="course-pills-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
										<!-- Course detail START -->
										<h5 class="mb-3">Course Description</h5>
										<p class="mb-0">{{ $masterclass->masterclass_description }}</p>

									</div>
									<!-- Content END -->

									<!-- Content START -->
									<div class="tab-pane fade" id="course-pills-2" role="tabpanel" aria-labelledby="course-pills-tab-2">
										<!-- Course accordion START -->
										<div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
											<!-- Item -->
											<div class="accordion-item mb-3">
												<h6 class="accordion-header font-base" id="heading-1">
													<button class="accordion-button fw-bold rounded d-sm-flex d-inline-block collapsed" type="button"
														data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
														Introduction of Digital Marketing
														<span class="small ms-0 ms-sm-2">(3 Lectures)</span>
													</button>
												</h6>
												<div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1"
													data-bs-parent="#accordionExample2">
													<div class="accordion-body mt-3">
														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span
																	class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Introduction</span>
															</div>
															<p class="mb-0">2m 10s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">
																	What is Digital Marketing What is Digital
																	Marketing</span>
															</div>
															<p class="mb-0 text-truncate">15m 10s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Type
																	of Digital Marketing</span>
															</div>
															<p class="mb-0">18m 10s</p>
														</div>
													</div>
												</div>
											</div>

											<!-- Item -->
											<div class="accordion-item mb-3">
												<h6 class="accordion-header font-base" id="heading-2">
													<button class="accordion-button fw-bold collapsed rounded d-sm-flex d-inline-block" type="button"
														data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
														Customer Life cycle
														<span class="small ms-0 ms-sm-2">(4 Lectures)</span>
													</button>
												</h6>
												<div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2"
													data-bs-parent="#accordionExample2">
													<!-- Accordion body START -->
													<div class="accordion-body mt-3">
														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">What
																	is Digital Marketing</span>
															</div>
															<p class="mb-0">11m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">15
																	Tips for Writing Magnetic Headlines</span>
															</div>
															<p class="mb-0 text-truncate">25m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">How
																	to Write Like Your Customers Talk</span>
															</div>
															<p class="mb-0">11m 30s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<div>
																	<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static"
																		data-bs-toggle="modal" data-bs-target="#exampleModal">
																		<i class="fas fa-play me-0"></i>
																	</a>
																</div>
																<div class="row g-sm-0 align-items-center">
																	<div class="col-sm-6">
																		<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-md-400px">How
																			to Flip Features Into Benefits</span>
																	</div>
																	<div class="col-sm-6">
																		<span class="badge text-bg-orange ms-2 ms-md-0"><i class="fas fa-lock fa-fw me-1"></i>Premium</span>
																	</div>
																</div>
															</div>
															<p class="mb-0 d-inline-block text-truncate w-70px w-sm-60px">
																35m 30s</p>
														</div>
													</div>
													<!-- Accordion body END -->
												</div>
											</div>

											<!-- Item -->
											<div class="accordion-item mb-3">
												<h6 class="accordion-header font-base" id="heading-5">
													<button class="accordion-button fw-bold collapsed rounded d-sm-flex d-inline-block" type="button"
														data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="false"
														aria-controls="collapse-5">
														What is Search Engine Optimization(SEO)
														<span class="small ms-0 ms-sm-2">(10 Lectures)</span>
													</button>
												</h6>
												<div id="collapse-5" class="accordion-collapse collapse" aria-labelledby="heading-5"
													data-bs-parent="#accordionExample2">
													<!-- Accordion body START -->
													<div class="accordion-body mt-3">

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span
																	class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Introduction</span>
															</div>
															<p class="mb-0">1m 10s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Overview
																	of SEO</span>
															</div>
															<p class="mb-0 text-truncate">11m 03s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">How
																	to SEO Optimise Your Homepage</span>
															</div>
															<p class="mb-0">15m 00s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">How
																	to SEO Optimise Your Homepage</span>
															</div>
															<p class="mb-0">15m 00s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">How
																	to Write Title Tags Search Engines Love</span>
															</div>
															<p class="mb-0">25m 30s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">SEO
																	Keyword Planning</span>
															</div>
															<p class="mb-0">18m 10s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">eCommerce
																	SEO</span>
															</div>
															<p class="mb-0">28m 10s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Internal
																	and External Links</span>
															</div>
															<p class="mb-0">45m 10s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Mobile
																	SEO</span>
															</div>
															<p class="mb-0">8m 10s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Off-page
																	SEO</span>
															</div>
															<p class="mb-0">18m 10s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Measuring
																	SEO Effectiveness</span>
															</div>
															<p class="mb-0">35m 10s</p>
														</div>
													</div>
													<!-- Accordion body END -->
												</div>
											</div>

											<!-- Item -->
											<div class="accordion-item mb-3">
												<h6 class="accordion-header font-base" id="heading-6">
													<button class="accordion-button fw-bold collapsed rounded d-block d-sm-flex d-inline-block" type="button"
														data-bs-toggle="collapse" data-bs-target="#collapse-6" aria-expanded="false"
														aria-controls="collapse-6">
														Facebook ADS
														<span class="small ms-0 ms-sm-2">(3 Lectures)</span>
													</button>
												</h6>
												<div id="collapse-6" class="accordion-collapse collapse" aria-labelledby="heading-6"
													data-bs-parent="#accordionExample2">
													<!-- Accordion body START -->
													<div class="accordion-body mt-3">
														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span
																	class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Introduction</span>
															</div>
															<p class="mb-0">1m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Creating
																	Facebook Pages</span>
															</div>
															<p class="mb-0 text-truncate">25m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Facebook
																	Page Custom URL</span>
															</div>
															<p class="mb-0">11m 30s</p>
														</div>
													</div>
													<!-- Accordion body END -->
												</div>
											</div>

											<!-- Item -->
											<div class="accordion-item mb-3">
												<h6 class="accordion-header font-base" id="heading-7">
													<button class="accordion-button fw-bold collapsed rounded d-sm-flex d-inline-block" type="button"
														data-bs-toggle="collapse" data-bs-target="#collapse-7" aria-expanded="false"
														aria-controls="collapse-7">
														YouTube Marketing
														<span class="small ms-0 ms-sm-2">(5 Lectures)</span>
													</button>
												</h6>
												<div id="collapse-7" class="accordion-collapse collapse" aria-labelledby="heading-7"
													data-bs-parent="#accordionExample2">
													<!-- Accordion body START -->
													<div class="accordion-body mt-3">
														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Video
																	Flow</span>
															</div>
															<p class="mb-0">25m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Webmaster
																	Tool</span>
															</div>
															<p class="mb-0 text-truncate">15m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Featured
																	Contents on Channel</span>
															</div>
															<p class="mb-0">32m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<div>
																	<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static"
																		data-bs-toggle="modal" data-bs-target="#exampleModal">
																		<i class="fas fa-play me-0"></i>
																	</a>
																</div>
																<div class="row g-sm-0 align-items-center">
																	<div class="col-sm-6">
																		<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-md-400px">Managing
																			Comments</span>
																	</div>
																	<div class="col-sm-6">
																		<span class="badge text-bg-orange ms-2 ms-md-0"><i class="fas fa-lock fa-fw me-1"></i>Premium</span>
																	</div>
																</div>
															</div>
															<p class="mb-0 d-inline-block text-truncate w-70px w-sm-60px">
																20m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<div>
																	<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static"
																		data-bs-toggle="modal" data-bs-target="#exampleModal">
																		<i class="fas fa-play me-0"></i>
																	</a>
																</div>
																<div class="row g-sm-0 align-items-center">
																	<div class="col-sm-6">
																		<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-md-400px">Channel
																			Analytics</span>
																	</div>
																	<div class="col-sm-6">
																		<span class="badge text-bg-orange ms-2 ms-md-0"><i class="fas fa-lock fa-fw me-1"></i>Premium</span>
																	</div>
																</div>
															</div>
															<p class="mb-0 d-inline-block text-truncate w-70px w-sm-60px">
																18m 20s</p>
														</div>
													</div>
													<!-- Accordion body END -->
												</div>
											</div>

											<!-- Item -->
											<div class="accordion-item mb-3">
												<h6 class="accordion-header font-base" id="heading-8">
													<button class="accordion-button fw-bold collapsed rounded d-sm-flex d-inline-block" type="button"
														data-bs-toggle="collapse" data-bs-target="#collapse-8" aria-expanded="false"
														aria-controls="collapse-8">
														Why SEO
														<span class="small ms-0 ms-sm-2">(8 Lectures)</span>
													</button>
												</h6>
												<div id="collapse-8" class="accordion-collapse collapse" aria-labelledby="heading-8"
													data-bs-parent="#accordionExample2">
													<!-- Accordion body START -->
													<div class="accordion-body mt-3">
														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span
																	class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Understanding
																	SEO</span>
															</div>
															<p class="mb-0">20m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">On-Page
																	SEO</span>
															</div>
															<p class="mb-0 text-truncate">15m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Local
																	SEO</span>
															</div>
															<p class="mb-0">16m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Measuring
																	SEO Effectiveness</span>
															</div>
															<p class="mb-0">12m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<div>
																	<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static"
																		data-bs-toggle="modal" data-bs-target="#exampleModal">
																		<i class="fas fa-play me-0"></i>
																	</a>
																</div>
																<div class="row g-sm-0 align-items-center">
																	<div class="col-sm-6">
																		<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-md-400px">Keywords
																			in Blog and Articles</span>
																	</div>
																	<div class="col-sm-6">
																		<span class="badge text-bg-orange ms-2 ms-md-0"><i class="fas fa-lock fa-fw me-1"></i>Premium</span>
																	</div>
																</div>
															</div>
															<p class="mb-0 d-inline-block text-truncate w-70px w-sm-60px">
																15m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<div>
																	<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static"
																		data-bs-toggle="modal" data-bs-target="#exampleModal">
																		<i class="fas fa-play me-0"></i>
																	</a>
																</div>
																<div class="row g-sm-0 align-items-center">
																	<div class="col-sm-6">
																		<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-md-400px">SEO
																			Keyword Planning</span>
																	</div>
																	<div class="col-sm-6">
																		<span class="badge text-bg-orange ms-2 ms-md-0"><i class="fas fa-lock fa-fw me-1"></i>Premium</span>
																	</div>
																</div>
															</div>
															<p class="mb-0 d-inline-block text-truncate w-70px w-sm-60px">
																36m 12s</p>
														</div>
													</div>
													<!-- Accordion body END -->
												</div>
											</div>

											<!-- Item -->
											<div class="accordion-item mb-3">
												<h6 class="accordion-header font-base" id="heading-9">
													<button class="accordion-button fw-bold collapsed rounded d-sm-flex d-inline-block" type="button"
														data-bs-toggle="collapse" data-bs-target="#collapse-9" aria-expanded="false"
														aria-controls="collapse-9">
														Google tag manager
														<span class="small ms-0 ms-sm-2">(4 Lectures)</span>
													</button>
												</h6>
												<div id="collapse-9" class="accordion-collapse collapse" aria-labelledby="heading-9"
													data-bs-parent="#accordionExample2">
													<!-- Accordion body START -->
													<div class="accordion-body mt-3">
														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">G+
																	Pages Ranks Higher</span>
															</div>
															<p class="mb-0">13m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Adding
																	Contact Links</span>
															</div>
															<p class="mb-0 text-truncate">7m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Google
																	Hangouts</span>
															</div>
															<p class="mb-0">12m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">
																	Google Local Business</span>
															</div>
															<p class="mb-0 text-truncate">7m 20s</p>
														</div>
													</div>
													<!-- Accordion body END -->
												</div>
											</div>

											<!-- Item -->
											<div class="accordion-item mb-0">
												<h6 class="accordion-header font-base" id="heading-10">
													<button class="accordion-button fw-bold collapsed rounded d-sm-flex d-inline-block" type="button"
														data-bs-toggle="collapse" data-bs-target="#collapse-10" aria-expanded="false"
														aria-controls="collapse-10">
														Integration with Website
														<span class="small ms-0 ms-sm-2">(3 Lectures)</span>
													</button>
												</h6>
												<div id="collapse-10" class="accordion-collapse collapse" aria-labelledby="heading-10"
													data-bs-parent="#accordionExample2">
													<!-- Accordion body START -->
													<div class="accordion-body mt-3">
														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Creating
																	LinkedIn Account</span>
															</div>
															<p class="mb-0 text-truncate">13m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">Advance
																	Searching</span>
															</div>
															<p class="mb-0">31m 20s</p>
														</div>

														<hr> <!-- Divider -->

														<!-- Course lecture -->
														<div class="d-flex justify-content-between align-items-center">
															<div class="position-relative d-flex align-items-center">
																<a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static">
																	<i class="fas fa-play me-0"></i>
																</a>
																<span class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px w-md-400px">LinkedIn
																	Mobile App</span>
															</div>
															<p class="mb-0 text-truncate">25m 20s</p>
														</div>
													</div>
													<!-- Accordion body END -->
												</div>
											</div>

										</div>
										<!-- Course accordion END -->
									</div>

									<!-- Content START -->


								</div>
							</div>
							<!-- Tab contents END -->
						</div>
					</div>
					<!-- Main content END -->

					<!-- Right sidebar START -->
					<div class="col-lg-4 pt-5 pt-lg-0">
						<div class="row mb-5 mb-lg-0">
							<div class="col-md-6 col-lg-12">
								<!-- Video START -->
								<div class="card shadow p-2 mb-4 z-index-9">
									<div class="overflow-hidden rounded-3">
										<img src="{{ asset('storage/masterclass/thumbnail/' . $masterclass->masterclass_thumbnail) }}"
											class="card-img" alt="course image">
										<!-- Overlay -->
										<div class="bg-overlay bg-dark opacity-6"></div>
										<div class="card-img-overlay d-flex align-items-start flex-column p-3">
											<!-- Video button and link -->
											<div class="m-auto">
												<a href="{{ asset('storage/masterclass/video/preview/' . $masterclass->masterclass_video_preview) }}"
													class="btn btn-lg text-danger btn-round btn-white-shadow mb-0" data-glightbox=""
													data-gallery="course-video">
													<i class="fas fa-play"></i>
												</a>
											</div>
										</div>
									</div>

									<!-- Card body -->
									<div class="card-body px-3">
										<!-- Info -->
										<div class="d-flex justify-content-between align-items-center">
											<!-- Price and time -->
											<div>
												<div class="d-flex align-items-center">
													<h3 class="fw-bold mb-0 me-2">{{ $masterclass->masterclass_name }}</h3>

												</div>
											</div>

											<!-- Share button with dropdown -->
											<div class="dropdown">
												<!-- Share button -->
												<a href="#" class="btn btn-sm btn-light rounded small" role="button" id="dropdownShare"
													data-bs-toggle="dropdown" aria-expanded="false">
													<i class="fas fa-fw fa-share-alt"></i>
												</a>
												<!-- dropdown button -->
												<ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
													aria-labelledby="dropdownShare">
													<li><a class="dropdown-item" href="#"><i class="fab fa-twitter-square me-2"></i>Twitter</a></li>
													<li><a class="dropdown-item" href="#"><i class="fab fa-facebook-square me-2"></i>Facebook</a>
													</li>
													<li><a class="dropdown-item" href="#"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
													<li><a class="dropdown-item" href="#"><i class="fas fa-copy me-2"></i>Copy link</a></li>
												</ul>
											</div>
										</div>

										<!-- Buttons -->
										<div class="mt-3 d-sm-flex justify-content-sm-between">
											{{-- <a href="{{ route('course.detail.learning', $masterclass->masterclass_slug) }}"
												class="btn btn-outline-primary mb-0">Detail</a> --}}
										</div>
									</div>
								</div>
								<!-- Video END -->

								<!-- Course info START -->
								<div class="card card-body shadow p-4 mb-4">
									<!-- Title -->
									<h4 class="mb-3">This course includes</h4>
									<ul class="list-group list-group-borderless">
										<li class="list-group-item d-flex justify-content-between align-items-center">
											<span class="h6 fw-light mb-0"><i class="fas fa-fw fa-book-open text-primary"></i>Lectures</span>
											<span>30</span>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center">
											<span class="h6 fw-light mb-0"><i class="fas fa-fw fa-clock text-primary"></i>Duration</span>
											<span>{{ $masterclass->masterclass_total_duration }}</span>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center">
											<span class="h6 fw-light mb-0"><i class="fas fa-fw fa-signal text-primary"></i>Skills</span>
											<span>{{ $masterclass->course_masterclass_levels->masterclass_level_name }}</span>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center">
											<span class="h6 fw-light mb-0"><i class="fas fa-fw fa-user-clock text-primary"></i>Deadline</span>
											<span>{{ $masterclass->created_at }}</span>
										</li>
									</ul>
								</div>
								<!-- Course info END -->
							</div>
						</div><!-- Row End -->
					</div>
					<!-- Right sidebar END -->

				</div><!-- Row END -->
			</div>
		</section>
		<!-- Page content END -->
	</main>
@endsection
@push('custom-script')
	<script src="{{ asset('assets/vendor/tiny-slider/tiny-slider.js') }}"></script>
@endpush
