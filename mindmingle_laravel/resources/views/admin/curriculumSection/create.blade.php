@extends('admin.layouts.main')
@section('title', 'Create curriculum section | Mind Mingle')
@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Create curriculum section</h1>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.masterclasses.index') }}">Masterclasses</a></li>
				<li class="breadcrumb-item"><a
						href="{{ route('admin.masterclass.curriculum-section.index', $masterclasses->masterclass_slug) }}">Curriculum
						Sections</a></li>
				<li class="breadcrumb-item active" aria-current="page">Create</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Craete curriculum section on {{ $masterclasses->masterclass_name }}</h5>
						<h6 class="card-subtitle text-muted">The data must be valid.</h6>
					</div>
					<div class="card-body">
						<form class="form" runat="server"
							action="{{ route('admin.masterclass.curriculum-section.index', $masterclasses->masterclass_slug) }}"
							method="POST">
							@csrf
							<div class="row">
								<div class="col-10 ">
									<div class="mb-3">
										<label for="curriculum_section_name" class="form-label">Curriculum section name</label>
										<input type="text" class="form-control @error('curriculum_section_name') is-invalid @enderror"
											id="curriculum_section_name" name="curriculum_section_name" value="{{ old('curriculum_section_name') }}"
											placeholder="Input curriculum section name" required>
										@error('curriculum_section_name')
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
