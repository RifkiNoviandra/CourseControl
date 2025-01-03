@extends('admin.layouts.main')
@section('title', 'Edit Course Category | Mind Mingle')
@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Edit Course Category</h1>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Categories</li>
				<li class="breadcrumb-item"><a href="{{ route('admin.course-categories.index') }}">Course-categories</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Edit Course Categories</h5>
						<h6 class="card-subtitle text-muted">The data must be valid.</h6>
					</div>
					<div class="card-body">
						<form class="form" runat="server"
							action="{{ route('admin.course-categories.update', $category->category_slug) }}" method="POST"
							enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<input type="hidden" name="category_id" value="{{ $category->category_id }}">
							<div class="row">
								<div class="col-8 ">
									<div class="mb-3">
										<label for="formGroupExampleInput" class="form-label">Category Name</label>
										<input type="text" class="form-control @error('category_name') is-invalid @enderror"
											id="formGroupExampleInput" name="category_name" value="{{ $category->category_name }}"
											placeholder="Input Category name" required>
										@error('category_name')
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
										<label for="formGroupExampleInput" class="form-label">Category Slug</label>
										<input type="text" class="form-control @error('category_slug') is-invalid @enderror"
											id="formGroupExampleInput" name="category_slug" value="{{ $category->category_slug }}"
											placeholder="Input Category slug" required>
										@error('category_slug')
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
										<label for="formGroupExampleInput" class="form-label">Category Description</label>
										<textarea type="text" class="form-control @error('category_desc') is-invalid @enderror"
											id="formGroupExampleInput" name="category_desc"
											placeholder="Input Category slug" required>{{ $category->category_desc }}</textarea>
										@error('category_desc')
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
