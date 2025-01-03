@extends('admin.layouts.main')
@section('title', 'Create Masterclass | Mind Mingle')

@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Create Masterclass</h1>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.masterclasses.index') }}">Masterclasses</a></li>
				<li class="breadcrumb-item active" aria-current="page">Create</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Create masterclasses</h5>
						<h6 class="card-subtitle text-muted">The data must be valid.</h6>
					</div>
					<div class="card-body">
						<form class="form" runat="server" action="{{ route('admin.masterclasses.index') }}" method="POST"
							enctype="multipart/form-data">
							@csrf
							<div class="row justify-content-center">
								<div class="col-10">
									<div class="hstack justify-content-center">
										<div class="mb-3 text-center">
											<img id="thumbnail" class="text-center rounded-3 bg-dark" width="300" height="225" src="#"
												alt="thumbnail" />
											<input type="file" accept="image/*" class="form-control my-2 @error('thumbnail') is-invalid @enderror"
												id="thumbnail_input" name="thumbnail" required>
											<label for="thumbnail" class="form-label mx-auto">Thumbnail</label>
											@error('thumbnail')
												<div class="invalid-feedback">
													{{ $message }}
												</div>
											@enderror
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="mb-3">
												<label for="masterclass_name" class="form-label">Masterclass name</label>
												<input type="text" class="form-control @error('masterclass_name') is-invalid @enderror"
													id="masterclass_name" name="masterclass_name" value="{{ old('masterclass_name') }}"
													placeholder="Input masterclass name" required>
												@error('masterclass_name')
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
												<label for="masterclass_short_description" class="form-label">Masterclass short description</label>
												<textarea class="form-control @error('masterclass_short_description') is-invalid @enderror" rows="5"
												 name="masterclass_short_description" placeholder="Short Description">{{ old('masterclass_short_description') }}</textarea>
												@error('masterclass_short_description')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12 col-sm-6 col-xxl-6">
											<div class="mb-3">
												<label for="masterclass_level" class="form-label">Masterclass level</label>
												<select class="form-control @error('masterclass_level') is-invalid @enderror" id="masterclass_level"
													name="masterclass_level">
													<option value="">Select level</option>
													@foreach ($masterclass_levels as $level)
														<option value="{{ $level->masterclass_level_id }}"
															{{ $level->masterclass_level_id == old('masterclass_level') ? 'selected' : 'is_invalid' }}>
															{{ $level->masterclass_level_name }}
														</option>
													@endforeach
												</select>
												@error('masterclass_level')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
										<div class="col-12 col-sm-6 col-xxl-6">
											<div class="mb-3">
												<label for="class_type" class="form-label">Class type</label>
												<select class="form-control @error('class_type') is-invalid @enderror" id="class_type" name="class_type">
													<option value="">Select class type</option>
													@foreach ($class_types as $class)
														<option value="{{ $class->class_type_id }}"
															{{ old('class_type') == $class->class_type_id ? 'selected' : 'is-invalid' }}>
															{{ $class->class_type_name }}</option>
													@endforeach
												</select>
												@error('class_type')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12 col-sm-6 col-xxl-6">
											<div class="mb-3">
												<label for="category" class="form-label">Masterclass Category</label>
												<select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
													<option value="">Select category</option>
													@foreach ($categories as $category)
														<option value="{{ $category->category_id }}"
															{{ $category->category_id == old('category') ? 'selected' : 'is-invalid' }}>
															{{ $category->category_name }}</option>
													@endforeach
												</select>
												@error('category')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
										<div class="col-12 col-sm-6 col-xxl-6">
											<div class="mb-3">
												<label for="price_type" class="form-label">Price type</label>
												<select class="form-control @error('price_type') is-invalid @enderror" name="price_type" id="price_type">
													<option value="">Select price type</option>
													@foreach ($price_types as $price)
														<option value="{{ $price->price_type_id }}"
															{{ $price->price_type_id == old('price_type') ? 'selected' : '' }}>
															{{ $price->price_type_name }}
														</option>
													@endforeach
												</select>
												@error('price_type')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12 col-sm-6 col-xxl-6">
											<div class="mb-3">
												<label for="masterclass_total_duration" class="form-label">Masterclass_total_duration</label>
												<input type="text" class="form-control @error('masterclass_total_duration') is-invalid @enderror"
													id="masterclass_total_duration" data-mask="00h 00m" name="masterclass_total_duration"
													value="{{ old('masterclass_total_duration') }}" placeholder="00h 00m">
												@error('masterclass_total_duration')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
										<div class="col-12 col-sm-6 col-xxl-6">
											<div class="mb-3">
												<label for="masterclass_price" class="form-label">Price</label>

												<div class="input-group mb-3" id="prices">
													<span class="input-group-text">Rp.</span>
													<input type="tel" id="masterclass_price" data-mask="Rp 000.000" name="masterclass_price"
														class="form-control @error('masterclass_price') is-invalid @enderror" placeholder="Input price"
														value="{{ old('masterclass_price') }}" autocomplete="off" maxlength="14" disabled>
													<input type="tel" id="masterclass_discount" data-mask="00%" name="masterclass_discount"
														class="form-control @error('masterclass_discount') is-invalid @enderror"
														value="{{ old('masterclass_discount') }}" autocomplete="off" maxlength="3" disabled
														placeholder="Input discount">
												</div>
												@error('masterclass_price')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>
										</div>
									</div>
									<div class="hstack justify-content-center">
										<div class="mb-3 text-center">
											<!-- Preview -->
											<h5 class="mt-4">Video preview</h5>
											<div class="position-relative bg-dark rounded-3">
												<div class="video-player rounded-3">
													<video id="videoPreview" controls crossorigin="anonymous" width="900" height="400"
														class="rounded-3" playsinline>
														<source src="#" type="video/mp4" size="720" id="video_here">
														Your browser does not support HTML5 video.
													</video>
												</div>
											</div>
											<div class="col-12">
												<label class="form-label" for="masterclass_video_preview">Upload video</label>
												<div class="input-group mb-3">
													<input type="file"
														class="form-control file_video @error('masterclass_video_preview') is-invalid @enderror"
														name="masterclass_video_preview" id="masterclass_video_preview" accept="video/*">
													<label class="input-group-text">.mp4</label>
													@error('masterclass_video_preview')
														<div class="invalid-feedback">
															{{ $message }}
														</div>
													@enderror
												</div>
											</div>

										</div>
									</div>
									<div class="mb-3">
										<label for="masterclass_description" class="form-label">Masterclass Description</label>
										<textarea class="form-control @error('masterclass_description') is-invalid @enderror" rows="10"
										 name="masterclass_description" placeholder="Description">{{ old('masterclass_description') }}</textarea>
										@error('masterclass_description')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
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
	 $('#price_type').change(function() {
	  var disabled = (this.value == '1' || this.value == '');
	  $('#masterclass_price').prop('disabled', disabled);
	  $('#masterclass_discount').prop('disabled', disabled);
	 }).change();


	 thumbnail_input.onchange = evt => {
	  const [file] = thumbnail_input.files
	  if (file) {
	   thumbnail.src = URL.createObjectURL(file)
	   $('#videoPreview').attr("poster", thumbnail.src)
	  }
	 }
	 $(document).on("change", ".file_video", function(evt) {
	  var $source = $('#video_here');
	  $source[0].src = URL.createObjectURL(this.files[0]);
	  $source.parent()[0].load();
	 });
	</script>
@endpush
