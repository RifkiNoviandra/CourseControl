@extends('admin.layouts.main')
@section('title', 'Edit curriculum section | Mind Mingle')
@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Edit curriculum section</h1>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.masterclasses.index') }}">Masterclasses</a></li>
				<li class="breadcrumb-item"><a
						href="{{ route('admin.masterclass.curriculum-section.index', $curriculum_sections->course_masterclasses->masterclass_slug) }}">Curriculum
						Sections</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Edit curriculum section on
							{{ $curriculum_sections->course_masterclasses->masterclass_name }}</h5>
						<h6 class="card-subtitle text-muted">The data must be valid.</h6>
					</div>
					<div class="card-body">
						<form id="edit" class="form" runat="server"
							action="{{ route('admin.masterclass.curriculum-section.update', ['masterclass' => $curriculum_sections->course_masterclasses->masterclass_slug, 'curriculum_section' => $curriculum_sections->curriculum_section_id]) }}"
							method="POST">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="col-10 ">
									<div class="mb-3">
										<label for="curriculum_section_name" class="form-label">Curriculum section name</label>
										<input type="text" class="form-control @error('curriculum_section_name') is-invalid @enderror"
											id="curriculum_section_name" name="curriculum_section_name"
											value="{{ $curriculum_sections->curriculum_section_name }}" placeholder="Input curriculum section name"
											required>
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
								<button type="submit" class="btn btn-primary fs-5" onclick="confirmEdit()">Submit</button>
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
	 profile_input.onchange = evt => {
	  const [file] = profile_input.files
	  if (file) {
	   profile.src = URL.createObjectURL(file)
	  }
	 }
	</script>
@endpush
