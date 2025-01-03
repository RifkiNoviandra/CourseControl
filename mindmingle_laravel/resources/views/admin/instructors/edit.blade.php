@extends('admin.layouts.main')
@section('title', 'Edit Data Instructor | Mind Mingle')
@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Edit Data Student</h1>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Users</li>
				<li class="breadcrumb-item"><a href="{{ route('admin.instructors.index') }}">Instructors</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Edit Instructors</h5>
						<h6 class="card-subtitle text-muted">The data must be valid.</h6>
					</div>
					<div class="card-body">
						<form id="edit" class="form" runat="server"
							action="{{ route('admin.instructors.update', $user->username) }}" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_method" value="PUT">
							<input type="hidden" name="user_id" value="{{ $user->id }}">
							<input type="hidden" name="oldPicture" value="{{ $user->profile_picture }}">
							@csrf
							@method('PUT')
							<div class="hstack justify-content-center">
								<div class="mb-3 text-center">
									@if (Storage::disk('public')->exists('/admin/students/uploaded/' . $user->profile_picture))
										<img id="profile" class="rounded-circle text-center bg-drk border border-dark border-5 shadow mb-3"
											width="150" src="{{ asset('storage/admin/students/uploaded/' . $user->profile_picture) }}"
											alt="your image" />
									@else
										<img src="{{ $user->profile_picture }}" alt="{{ $user->username }}"
											class="rounded-circle text-center bg-dark border border-dark border-5 shadow mb-3" width="150">
									@endif
									{{-- <img
										src="{{ Storage::disk('public')->exists('/admin/students/uploaded/' . $user->profile_picture) ? asset('storage/admin/students/uploaded/' . $user->profile_picture) : $user->profile_picture }}"> --}}
									<input type="file" accept="image/*" class="form-control my-2 @error('picture') is-invalid @enderror"
										id="profile_input" name="picture">
									<label for="profile" class="form-label mx-auto">Profile Picture</label>
									@error('picture')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-6 col-xxl-6">
									<div class="mb-3">
										<label for="formGroupExampleInput" class="form-label">Name</label>
										<input type="text" class="form-control @error('name') is-invalid @enderror" id="formGroupExampleInput"
											name="name" value="{{ $user->full_name }}" placeholder="Input student name" required>
										@error('name')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>
								<div class="col-12 col-sm-6 col-xxl-6">
									<div class="mb-3">
										<label for="formGroupExampleInput" class="form-label">Phone Number</label>
										<input type="text" class="form-control @error('phone_number') is-invalid @enderror"
											id="formGroupExampleInput" value="{{ $user->phone_number }}" name="phone_number" placeholder="(08)" required>
										@error('phone_number')
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
										<label for="formGroupExampleInput" class="form-label">Email</label>
										<input type="text" class="form-control @error('email') is-invalid @enderror" id="formGroupExampleInput"
											name="email" value="{{ $user->email }}" placeholder="Input student email" required>
										@error('email')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>
								<div class="col-12 col-sm-6 col-xxl-6">
									<div class="mb-3">
										<label for="formGroupExampleInput" class="form-label">Username</label>
										<input type="text" class="form-control @error('username') is-invalid @enderror" id="formGroupExampleInput"
											name="username" value="{{ $user->username }}" placeholder="Input student username" required>
										@error('username')
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
										<label for="formGroupExampleInput" class="form-label">Passoword</label>
										<input type="password" class="form-control @error('password') is-invalid @enderror"
											id="formGroupExampleInput" name="password" value="{{ $user->password }}"
											placeholder="Input student password" required>
										@error('password')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>
								<div class="col-12 col-sm-6 col-xxl-6">
									<div class="mb-3">
										<label for="formGroupExampleInput" class="form-label @error('password') is-invalid @enderror">Password
											Confirmation</label>
										<input type="password" value="{{ $user->password }}" class="form-control" id="formGroupExampleInput"
											name="password_confirmation" placeholder="Password confirmation" required>
									</div>
								</div>
							</div>
							<div class="mb-3">
								<label for="formGroupExampleInput" class="form-label">Job Title</label>
								<input type="text" class="form-control @error('job_title') is-invalid @enderror" id="formGroupExampleInput"
									name="job_title" value="{{ $user->job_title }}" placeholder="Input student job title">
								@error('job_title')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="formGroupExampleInput" class="form-label">About Student</label>
								<textarea class="form-control @error('about') is-invalid @enderror" rows="10" name="about"
								 placeholder="About">{{ $user->about }}</textarea>
								@error('about')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="row">
								<div class="col-12 col-sm-6 col-xxl">
									<div class="mb-3">
										<label for="formGroupExampleInput" class="form-label">Twitter</label>
										<input type="text" class="form-control @error('twitter') is-invalid @enderror" id="formGroupExampleInput"
											name="twitter" value="{{ $user->social_twitter }}" placeholder="Twitter URL">
										@error('twitter')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>
								<div class="col-12 col-sm-6 col-xxl">
									<div class="mb-3">
										<label for="formGroupExampleInput" class="form-label">Instragram</label>
										<input type="text" class="form-control @error('instagram') is-invalid @enderror"
											id="formGroupExampleInput" name="instagram" value="{{ $user->social_instagram }}"
											placeholder="Instagram URL">
										@error('instagram')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>
								<div class="col-12 col-sm-6 col-xxl">
									<div class="mb-3">
										<label for="formGroupExampleInput" class="form-label">Facebook</label>
										<input type="text" class="form-control @error('facebook') is-invalid @enderror"
											id="formGroupExampleInput" name="facebook" value="{{ $user->social_facebook }}"
											placeholder="Facebook URL">
										@error('facebook')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>
								<div class="col-12 col-sm-6 col-xxl">
									<div class="mb-3">
										<label for="formGroupExampleInput" class="form-label">Linkedin</label>
										<input type="text" class="form-control @error('linkedin') is-invalid @enderror"
											id="formGroupExampleInput" name="linkedin" value="{{ $user->social_linkedin }}"
											placeholder="Linkedin URL">
										@error('linkedin')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>
								<div class="col-12 col-sm-6 col-xxl">
									<div class="mb-3">
										<label for="formGroupExampleInput" class="form-label">YouTube</label>
										<input type="text" class="form-control @error('youtube') is-invalid @enderror"
											id="formGroupExampleInput" name="youtube" value="{{ $user->social_youtube }}" placeholder="Youtube URL">
										@error('youtube')
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
								<button type="submit" class="btn btn-primary fs-5" onclick="confirmEdit()">Edit</button>
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


	 profile_input.onchange = evt => {
	  const [file] = profile_input.files
	  if (file) {
	   profile.src = URL.createObjectURL(file)
	  }
	 }
	</script>
@endpush
