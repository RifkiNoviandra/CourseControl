@extends('admin.layouts.main')
@section('title', 'Create Data Instructor | Mind Mingle')
@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Create Data Instructor</h1>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Users</li>
				<li class="breadcrumb-item"><a href="{{ route('admin.instructors.index') }}">Instructors</a></li>
				<li class="breadcrumb-item active" aria-current="page">Create</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Create Instructor</h5>
						<h6 class="card-subtitle text-muted">The data must be valid.</h6>
					</div>
					<div class="card-body">
						<form class="form" runat="server" action="{{ route('admin.instructors.index') }}" method="POST"
							enctype="multipart/form-data">
							@csrf
							<div class="hstack justify-content-center">
								<div class="mb-3 text-center">
									<img id="profile" class="rounded-circle text-center" width="150" src="#" alt="your image" />
									<input type="file" accept="image/*" class="form-control my-2 @error('picture') is-invalid @enderror"
										id="profile_input" name="picture" required>
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
											name="name" value="{{ old('name') }}" placeholder="Input Instructor name" required>
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
											id="formGroupExampleInput" value="{{ old('phone_number') }}" name="phone_number" placeholder="(+62)" required>
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
											name="email" value="{{ old('email') }}" placeholder="Input Instructor email" required>
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
											name="username" value="{{ old('username') }}" placeholder="Input Instructor username" required>
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
										<input type="password" class="form-control @error('password') is-invalid @enderror" id="formGroupExampleInput"
											name="password" placeholder="Input Instructor password" required>
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
										<input type="password" class="form-control" id="formGroupExampleInput" name="password_confirmation"
											placeholder="Password confirmation" required>
									</div>
								</div>
							</div>
							<div class="mb-3">
								<label for="formGroupExampleInput" class="form-label">Job Title</label>
								<input type="text" class="form-control @error('job_title') is-invalid @enderror" id="formGroupExampleInput"
									name="job_title" value="{{ old('job_title') }}" placeholder="Input Instructor job title">
								@error('job_title')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="formGroupExampleInput" class="form-label">About Instructor</label>
								<textarea class="form-control @error('about') is-invalid @enderror" rows="10" name="about"
								 placeholder="About">{{ old('about') }}</textarea>
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
											name="twitter" value="{{ old('twitter') }}" placeholder="Twitter URL">
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
											id="formGroupExampleInput" name="instagram" value="{{ old('instagram') }}" placeholder="Instagram URL">
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
											id="formGroupExampleInput" name="facebook" value="{{ old('facebook') }}" placeholder="Facebook URL">
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
											id="formGroupExampleInput" name="linkedin" value="{{ old('linkedin') }}" placeholder="Linkedin URL">
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
											id="formGroupExampleInput" name="youtube" value="{{ old('youtube') }}" placeholder="Youtube URL">
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
								<button type="submit" class="btn btn-primary fs-5">Submit</button>
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
	 profile_input.onchange = evt => {
	  const [file] = profile_input.files
	  if (file) {
	   profile.src = URL.createObjectURL(file)
	  }
	 }
	</script>
@endpush
