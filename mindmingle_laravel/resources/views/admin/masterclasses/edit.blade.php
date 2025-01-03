@extends('admin.layouts.main')
@section('title', 'Edit Masterclass | Mind Mingle')

@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Edit Masterclass</h1>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.masterclasses.index') }}">Masterclasses</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Edit masterclasses</h5>
						<h6 class="card-subtitle text-muted">The data must be valid.</h6>
					</div>
					<div class="card-body">
						<form id="edit" class="form" runat="server"
							action="{{ route('admin.masterclasses.update', $masterclass->masterclass_slug) }}" method="POST"
							enctype="multipart/form-data">
							<input type="hidden" name="masterclass_id" value="{{ $masterclass->masterclass_id }}">
							<input type="hidden" name="oldThumbnail" value="{{ $masterclass->masterclass_thumbnail }}">
							<input type="hidden" name="oldVideoPreview" value="{{ $masterclass->masterclass_video_preview }}">
							@csrf
							@method('PUT')

							<div class="row justify-content-center">
								<div class="col-10">
									<div class="hstack justify-content-center">
										<div class="mb-3 text-center">
											<img id="thumbnail" class="text-center rounded-3 bg-dark" width="300" height="225"
												src="{{ asset('storage/masterclass/thumbnail/' . $masterclass->masterclass_thumbnail) }}" alt="thumbnail" />
											<input type="file" accept="image/*" class="form-control my-2 @error('thumbnail') is-invalid @enderror"
												id="thumbnail_input" name="thumbnail">
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
													id="masterclass_name" name="masterclass_name" value="{{ $masterclass->masterclass_name }}"
													placeholder="Input masterclass name">
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
												 name="masterclass_short_description" placeholder="Short Description">{{ $masterclass->masterclass_short_desc }}</textarea>
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
															{{ $masterclass->masterclass_level_id == $level->masterclass_level_id ? 'selected' : 'is_invalid' }}>
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
												<select class="form-control @error('class_type') is-invalid @enderror" name="class_type" id="class_type">
													<option value="">Select class type</option>
													@foreach ($class_types as $class)
														<option value="{{ $class->class_type_id }}"
															{{ $class->class_type_id == $masterclass->class_type_id ? 'selected' : '' }}>
															{{ $class->class_type_name }}
														</option>
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
															{{ $masterclass->category_id == $category->category_id ? 'selected' : 'is-invalid' }}>
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
												<select class="form-control @error('price_type') is-invalid @enderror" id="price_type" name="price_type">
													<option value="">Select price type</option>
													@foreach ($price_types as $price)
														<option value="{{ $price->price_type_id }}"
															{{ $price->price_type_id == $masterclass->price_type_id ? 'selected' : 'is_invalid' }}>
															{{ $price->price_type_name }}</option>
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
													value="{{ $masterclass->masterclass_total_duration }}" placeholder="00h 00m">
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

												<div class="input-group mb-3">
													<span class="input-group-text">Rp.</span>
													<input type="tel" id="masterclass_price" data-mask="Rp 000.000,00" name="masterclass_price"
														class="form-control @error('masterclass_price') is-invalid @enderror" placeholder="Input price"
														value="{{ $masterclass->masterclass_price }}" autocomplete="off" maxlength="14" disabled>
													<input type="tel" id="masterclass_discount" data-mask="00%" name="masterclass_discount"
														class="form-control @error('masterclass_discount') is-invalid @enderror"
														value="{{ $masterclass->masterclass_discount }}" autocomplete="off" maxlength="3" disabled
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
														class="rounded-3" playsinline
														poster="{{ asset('storage/masterclass/thumbnail/' . $masterclass->masterclass_thumbnail) }}">
														<source src="{{ asset('storage/masterclass/video/preview/' . $masterclass->masterclass_video_preview) }}"
															type="video/mp4" size="720" id="video_here">
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
										 name="masterclass_description" placeholder="Description">{{ $masterclass->masterclass_description }}</textarea>
										@error('masterclass_description')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
									<hr>
									<div class="col-12 text-end">
										<button type="reset" class="btn btn-danger fs-5">Reset</button>
										<button type="submit" class="btn btn-primary fs-5" onclick="confirmEdit()">Submit</button>
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
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
	 function confirmEdit() {
	  var form = $('#edit');
	  const swalWithBootstrapButtons = Swal.mixin({
	   customClass: {
	    confirmButton: 'btn btn-primary mx-2',
	    cancelButton: 'btn btn-dark mx-2'
	   },
	   buttonsStyling: false
	  });
	  event.preventDefault();
	  swalWithBootstrapButtons.fire({
	   title: 'Are you sure want to edit?',
	   text: "If you edit, the student will know your changing!",
	   icon: 'warning',
	   showCancelButton: true,
	   confirmButtonText: 'Yes, Edit',
	   cancelButtonText: 'No, cancel',
	   reverseButtons: true
	  }).then((result) => {
	   if (result.isConfirmed) {
	    form.submit();
	   } else if (
	    /* Read more about handling dismissals below */
	    result.dismiss === Swal.DismissReason.cancel
	   ) {
	    swalWithBootstrapButtons.fire(
	     'Cancelled',
	     'The data is still saved',
	     'error'
	    )
	   }
	  })
	 }
	</script>
	<script>
	 $('#price_type').change(function() {
	  var disabled = (this.value == '1' || this.value == '');
	  if (this.value == '2') {
	   $('#masterclass_price').removeAttr('disabled');
	   $('#masterclass_discount').removeAttr('disabled');
	  } else {
	   $('#masterclass_price').prop('disabled', disabled);
	   $('#masterclass_discount').prop('disabled', disabled);
	  }
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
