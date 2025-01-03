@extends('admin.layouts.main')
@section('title', 'Create Price Type | Mind Mingle')
@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Create Price Type</h1>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Categories</li>
				<li class="breadcrumb-item"><a href="{{ route('admin.price-types.index') }}">Price-type</a></li>
				<li class="breadcrumb-item active" aria-current="page">Create</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Create Price type</h5>
						<h6 class="card-subtitle text-muted">The data must be valid.</h6>
					</div>
					<div class="card-body">
						<form class="form" runat="server" action="{{ route('admin.price-types.index') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-8 ">
									<div class="mb-3">
										<label for="formGroupExampleInput" class="form-label">Price Type Name</label>
										<input type="text" class="form-control @error('price_type_name') is-invalid @enderror"
											id="formGroupExampleInput" name="price_type_name" value="{{ old('price_type_name') }}"
											placeholder="Input Price Type Name" required>
										@error('price_type_name')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-8 ">
									<div class="mb-3">
										<label for="formGroupExampleInput" class="form-label">Price Type Slug</label>
										<input type="text" class="form-control @error('price_type_slug') is-invalid @enderror"
											id="formGroupExampleInput" name="price_type_slug" value="{{ old('price_type_slug') }}"
											placeholder="Input Price type slug" required>
										@error('price_type_slug')
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
