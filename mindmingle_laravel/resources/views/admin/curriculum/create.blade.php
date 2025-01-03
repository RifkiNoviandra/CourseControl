@extends('admin.layouts.main')
@section('title', 'Create Curriculum | Mind Mingle')

@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Create Curriculum</h1>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.masterclasses.index') }}">Masterclasses</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.masterclasses.index') }}">Curriculum Sections</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.masterclasses.index') }}">Curriculum</a></li>
				<li class="breadcrumb-item active" aria-current="page">Create</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-8">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Create Curriculum</h5>
						<h6 class="card-subtitle text-muted">The data must be valid.</h6>
					</div>
					<div class="card-body">
						<form class="form" runat="server"
							action="{{ route('admin.masterclass.curriculum-section.curriculum.index', ['masterclass' => $masterclasses->masterclass_slug, 'curriculum_section' => $curriculum_section->curriculum_section_id]) }}"
							method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row justify-content-center">
								<div class="col-10">
									<div class="hstack justify-content-center">
										<div class="mb-3 text-center">
											<!-- Preview -->
											<h5 class="mt-4">Video preview</h5>
											<div class="position-relative bg-dark rounded-3">
												<div class="video-player rounded-3">
													<video id="videoPreview" controls crossorigin="anonymous" width="800" height="400" class="rounded-3"
														playsinline>
														<source src="#" type="video/mp4" size="720" id="video_here">
														Your browser does not support HTML5 video.
													</video>
												</div>
											</div>
											<div class="col-12">
												<label class="form-label" for="curriculum_video">Upload video</label>
												<div class="input-group mb-3">
													<input type="file" class="form-control file_video @error('curriculum_video') is-invalid @enderror"
														name="curriculum_video" id="curriculum_video" accept="video/*">
													<label class="input-group-text">.mp4</label>
													@error('curriculum_video')
														<div class="invalid-feedback">
															{{ $message }}
														</div>
													@enderror
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="mb-3">
												<label for="curriculum_name" class="form-label">Curriculum name</label>
												<input type="text" class="form-control @error('curriculum_name') is-invalid @enderror"
													id="curriculum_name" name="curriculum_name" value="{{ old('curriculum_name') }}"
													placeholder="Input masterclass name" required>
												@error('curriculum_name')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="mb-3">
												<label for="curriculum_description" class="form-label">Curriculum description</label>
												<textarea class="form-control @error('curriculum_description') is-invalid @enderror" rows="5"
												 name="curriculum_description" placeholder="Short Description">{{ old('curriculum_description') }}</textarea>
												@error('curriculum_description')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
									</div>
									<hr>
									<div class="col-12 text-end">
										<button type="reset" class="btn btn-danger fs-5">Reset</button>
										<button type="submit" class="btn btn-primary fs-5">Submit</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('custom-script')
	<script>
		$(document).on("change", ".file_video", function(evt) {
			var $source = $('#video_here');
			$source[0].src = URL.createObjectURL(this.files[0]);
			$source.parent()[0].load();
		});
	</script>
@endpush
