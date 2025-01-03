@extends('admin.layouts.main')
@section('title', 'Detail Data Instructor | Mind Mingle')
@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Data Instructor</h1>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Users</li>
				<li class="breadcrumb-item"><a href="{{ route('admin.instructors.index') }}">Instructors</a></li>
				<li class="breadcrumb-item active" aria-current="page">Detail</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Instructors Detail</h5>
						<h6 class="card-subtitle text-muted">Detail shows all user profile data
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row justify-content-center">
							<div class="col-12">
								<div class="row">
									<div class="col-12">
										<div class="row mb-3">
											<div class="col-sm-12 col-lg-2 text-center">
												<img
													src="{{ Storage::disk('public')->exists('/admin/instructors/uploaded/' . $user->profile_picture) ? asset('storage/admin/instructors/uploaded/' . $user->profile_picture) : $user->profile_picture }}"
													alt="{{ $user->full_name }}" width="150"
													class="rounded-circle bg-dark border border-5 border-dark shadow m-3 ">
											</div>
											<div class="col-sm-12 col-lg-10 align-self-center text-center text-lg-start text-sm-center">
												<h1 class="mb-3 ">{{ $user->full_name }}</h1>
												<p class="m-0">{{ $user->username }}</p>
												<p class="m-0">{{ $user->email }}</p>
												<div class="d-xxl-flex d-grid justify-content-xxl-between">
													<div class="status">
														@if ($user->status == 'active')
															<span class="badge rounded-pill badge-soft-success me-2">Active</span>
														@elseif($user->status == 'deactivated')
															<span class="badge rounded-pill badge-soft-dark me-2">Deactivated</span>
														@else
															<span class="badge rounded-pill badge-soft-danger me-2">Inactive</span>
														@endif
													</div>
													<p>Joined at <span
															class="badge rounded-pill badge-soft-dark me-2">{{ date_format($user->created_at, 'D M Y H:i:s') }}</span>
													</p>
												</div>

											</div>
										</div>
										<div class="header">
											<h2>Overview</h2>
											<hr>
										</div>
										<div class="row">
											<div class="col-sm-12 col-lg-3 col-xxl-3 d-flex">
												<div class="card bg-success bg-opacity-10 flex-fill border-1">
													<div class="card-body py-4">
														<div class="d-flex align-items-start">
															<div class="flex-grow-1">
																<h3 class="mb-2">30 <small>Course</small></h3>
																<p class="mb-2">Total Course</p>
																<div class="mb-0">
																	<span class="badge rounded-pill badge-soft-info me-2">since
																		{{ $current = Carbon\Carbon::now()->format('d M Y') }}</span>
																</div>
															</div>
															<div class="d-inline-block ms-3">
																<img src="{{ asset('assets/images/element/online.svg') }}" width="60" alt="">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-lg-3 col-xxl-3 d-flex">
												<div class="card bg-info bg-opacity-10 flex-fill border-1">
													<div class="card-body py-4">
														<div class="d-flex align-items-start">
															<div class="flex-grow-1">
																<h3 class="mb-2">12 <small>Certificate</small></h3>
																<p class="mb-2">Total Certificate</p>
																<div class="mb-0">
																	<span class="badge rounded-pill badge-soft-primary me-2">since
																		{{ $current = Carbon\Carbon::now()->format('d M Y') }}</span>
																</div>
															</div>
															<div class="d-inline-block ms-3">
																<img src="{{ asset('assets/images/element/17.svg') }}" width="40" alt="">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-lg-3 col-xxl-3 d-flex">
												<div class="card bg-warning bg-opacity-10 flex-fill border-1">
													<div class="card-body py-4">
														<div class="d-flex align-items-start">
															<div class="flex-grow-1">
																<h3 class="mb-2">10 <small>Review</small></h3>
																<p class="mb-2">Total Review</p>
																<div class="mb-0">
																	<span class="badge rounded-pill badge-soft-danger me-2">since
																		{{ $current = Carbon\Carbon::now()->format('d M Y') }}</span>
																</div>
															</div>
															<div class="d-inline-block ms-3">
																<img src="{{ asset('assets/images/element/marketing.svg') }}" width="60" alt="">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-lg-3 col-xxl-3 d-flex">
												<div class="card bg-danger bg-opacity-10 flex-fill border-1">
													<div class="card-body py-4">
														<div class="d-flex align-items-start">
															<div class="flex-grow-1">
																<h3 class="mb-2">22 <small>Completed</small></h3>
																<p class="mb-2">Total Completed Lesson</p>
																<div class="mb-0">
																	<span class="badge rounded-pill badge-soft-primary me-2">since
																		{{ $current = Carbon\Carbon::now()->format('d M Y') }}</span>
																</div>
															</div>
															<div class="d-inline-block ms-3">
																<img src="{{ asset('assets/images/element/01.svg') }}" width="60" alt="">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-12 col-md-4 col-lg-6">
								<div class="header">
									<h2>General</h2>
									<hr>
								</div>
								<dl class="row">
									<dt class="col-sm-3">Name</dt>
									<dd class="col-sm-9">{{ $user->full_name }}</dd>

									<dt class="col-sm-3">Email</dt>
									<dd class="col-sm-9">
										<p>{{ $user->email }}</p>
									</dd>

									<dt class="col-sm-3">Phone Number</dt>
									<dd class="col-sm-9">{{ $user->phone_number == null ? '...' : $user->phone_number }}</dd>

									<dt class="col-sm-3">Job Title</dt>
									<dd class="col-sm-9">{{ $user->job_title == null ? '...' : $user->job_title }}</dd>

									<dt class="col-sm-3">Joined At</dt>
									<dd class="col-sm-9">{{ $user->created_at == null ? '...' : $user->created_at->format('d M Y | H:i:s') }}</dd>

									<dt class="col-sm-3 text-truncate">About</dt>
									<dd class="col-sm-9">{{ $user->about == null ? '...' : $user->about }}</dd>
								</dl>
							</div>
							<div class="col-xs-6 col-sm-12 col-md-4 col-lg-6">
								<div class="header">
									<h2>Social</h2>
									<hr>
								</div>
								<dl class="row">
									<dt class="col-sm-3">Twitter</dt>
									<dd class="col-sm-9">{{ $user->social_twitter == null ? '...' : $user->social_twitter }}</dd>
									<dt class="col-sm-3">Instagram</dt>
									<dd class="col-sm-9">
										<p>{{ $user->social_instagram == null ? '...' : $user->social_instagram }}</p>
									</dd>
									<dt class="col-sm-3">Facebook</dt>
									<dd class="col-sm-9">{{ $user->social_facebook == null ? '...' : $user->social_facebook }}</dd>

									<dt class="col-sm-3">Linkedin</dt>
									<dd class="col-sm-9">{{ $user->social_linkedin == null ? '...' : $user->social_linkedin }}</dd>

									<dt class="col-sm-3">Youtube</dt>
									<dd class="col-sm-9">{{ $user->social_youtube == null ? '...' : $user->social_youtube }}</dd>
								</dl>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
