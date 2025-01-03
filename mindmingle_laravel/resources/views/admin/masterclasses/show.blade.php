@extends('admin.layouts.main')
@section('title', 'Detail Masterclass | Mind Mingle')

@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Detail Masterclass</h1>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.masterclasses.index') }}">Masterclasses</a></li>
				<li class="breadcrumb-item active" aria-current="page">Detail</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Detail masterclasses</h5>
						<h6 class="card-subtitle text-muted">The data must be valid.</h6>
					</div>
					<div class="card-body">
						<div class="row justify-content-center">
							<div class="col-8">
								<div class="hstack justify-content-center">
									<div class="mb-3 text-center">
										<!-- Preview -->
										<div class="position-relative bg-dark rounded-3">
											<div class="video-player rounded-3">
												<video id="videoPreview" controls crossorigin="anonymous" width="900" height="400" class="rounded-3"
													playsinline poster="{{ asset('storage/masterclass/thumbnail/' . $masterclass->masterclass_thumbnail) }}">
													<source src="{{ asset('storage/masterclass/video/preview/' . $masterclass->masterclass_video_preview) }}"
														type="video/mp4" size="720" id="video_here">
													Your browser does not support HTML5 video.
												</video>
											</div>
										</div>
									</div>
								</div>
								<dl class="row">
									<h2>{{ $masterclass->masterclass_name }}</h2>
									<dt class="col-sm-3">Short description</dt>
									<dd class="col-sm-9">
										<p>{{ $masterclass->masterclass_short_desc }}</p>
									</dd>

									<dt class="col-sm-3">Masterclass Level</dt>
									<dd class="col-sm-9">{{ $masterclass->course_masterclass_levels->masterclass_level_name }}</dd>

									<dt class="col-sm-3 text-truncate">Category</dt>
									<dd class="col-sm-9">{{ $masterclass->course_categories->category_name }}</dd>

									<dt class="col-sm-3">Class type</dt>
									<dd class="col-sm-9">
										{{ $masterclass->course_class_types->class_type_name }}
									</dd>
									<dt class="col-sm-3">Price type</dt>
									<dd class="col-sm-9">
										{{ $masterclass->course_class_prices->price_type_name }}
									</dd>
									<dt class="col-sm-3">Price</dt>
									<dd class="col-sm-9">
										{{ $masterclass->masterclass_price == null ? '---' : $masterclass->masterclass_price }}
									</dd>
									<dt class="col-sm-3">Discount</dt>
									<dd class="col-sm-9">
										{{ $masterclass->masterclass_discount == null ? '---' : $masterclass->masterclass_discount }}
									</dd>
									<dt class="col-sm-3">Masterclass Duration</dt>
									<dd class="col-sm-9">
										{{ $masterclass->masterclass_total_duration == null ? '---' : $masterclass->masterclass_total_duration }}
									</dd>
									<dt class="col-sm-3 text-truncate">About</dt>
									<dd class="col-sm-9">{{ $masterclass->masterclass_description }}</dd>
								</dl>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
