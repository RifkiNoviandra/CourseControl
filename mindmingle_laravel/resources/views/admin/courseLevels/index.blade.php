@extends('admin.layouts.main')
@section('title', 'Masterclass Level | Mind Mingle')
@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Data Masterclass Levels</h1>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Categories</li>
				<li class="breadcrumb-item active" aria-current="page">Masterclass-levels</li>
			</ol>
		</nav>
		@if (session('message'))
			<div class="alert alert-success alert-outline-coloured alert-dismissible " role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				<div class="alert-icon">
					<i class="fas fa-check-circle fs-3"></i>
				</div>
				<div class="alert-message">
					<strong>Success</strong> {{ session('message') }}
				</div>
			</div>
		@elseif (session('error'))
			<div class="alert alert-danger alert-outline-coloured alert-dismissible " role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				<div class="alert-icon">
					<i class="fas fa-exclamation-triangle fs-3"></i>
				</div>
				<div class="alert-message">
					<strong>Failed</strong> {{ session('error') }}
				</div>
			</div>
		@endif
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Masterclass Levels</h5>
					</div>
					<div class="card-body">
						<div class="button text-lg-start text-center my-2">
							<a href="{{ route('admin.course-levels.create') }}" class="btn btn-success mb-2"><i
									class="fas fa-puzzle-piece me-2"></i>New Masterclass Level
							</a>
						</div>
						<div id="datatables-column-search-text-inputs_wrapper" class="dataTables_wrapper dt-bootstrap5">
							<div class="row">
								<div class="col-sm-12">
									<table id="datatables-column-search-text-inputs" class="table table-striped dataTable" style="width: 100%;"
										aria-describedby="datatables-column-search-text-inputs_info">
										<thead>
											<tr>
												<th class="sorting sorting_asc" tabindex="0" aria-controls="datatables-column-search-text-inputs"
													rowspan="1" colspan="1" aria-sort="ascending"
													aria-label="Masterclass Level Name: activate to sort column descending" style="width: 179px;">Masterclass
													Level Name
												</th>
												<th class="sorting" tabindex="0" aria-controls="datatables-column-search-text-inputs" rowspan="1"
													colspan="1" aria-label="Masterclass Level Slug: activate to sort column ascending" style="width: 179px;">
													Masterclass Level Slug</th>
												<th class="no-short" tabindex="0" aria-controls="datatables-column-search-text-inputs" rowspan="1"
													colspan="1" aria-label="Action: activate to sort column ascending" style="width: 179px;">Action</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
										<tfoot>
											<tr>
												<th rowspan="1" colspan="1">
													<input type="text" class="form-control" placeholder="Search Masterclass Level Name">
												</th>
												<th rowspan="1" colspan="1">
													<input type="text" class="form-control" placeholder="Search Masterclass Level Slug">
												</th>
												<th rowspan="1" colspan="1">
													<input type="text" class="form-control d-none" placeholder="Search Action">
												</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('custom-script')
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
	<script src="{{ asset('assets-admin/js/page/dataTableMasterclassLevel.js') }}"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script type="text/javascript">
	 function confirmDelete(slug) {
	  var form = $('#data-' + slug);
	  const swalWithBootstrapButtons = Swal.mixin({
	   customClass: {
	    confirmButton: 'btn btn-danger mx-2',
	    cancelButton: 'btn btn-dark mx-2'
	   },
	   buttonsStyling: false
	  })

	  swalWithBootstrapButtons.fire({
	   title: 'Are you sure?',
	   text: "You won't be able to revert this!",
	   icon: 'warning',
	   showCancelButton: true,
	   confirmButtonText: 'Yes, delete it!',
	   cancelButtonText: 'No, cancel!',
	   reverseButtons: true
	  }).then((result) => {
	   if (result.isConfirmed) {
	    swalWithBootstrapButtons.fire(
	     'Deleted!',
	     'Your file has been deleted.',
	     'success'
	    )
	    form.submit();
	   } else if (
	    /* Read more about handling dismissals below */
	    result.dismiss === Swal.DismissReason.cancel
	   ) {
	    swalWithBootstrapButtons.fire(
	     'Cancelled',
	     'The record are save',
	     'error'
	    )
	   }
	  })
	 }
	</script>
@endpush
