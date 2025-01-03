@extends('admin.layouts.main')
@section('title', 'Data Curriculum Section| Mind Mingle')

@section('content')
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Curriculum Section</h1>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.masterclasses.index') }}">Masterclasses</a></li>
				<li class="breadcrumb-item active" aria-current="page">Curriculum Sections</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Curriculum Section on {{ $masterclasses->masterclass_name }}</h5>
					</div>

					<div class="card-body">
						<div class="button text-lg-start text-center my-2">
							<a href="{{ route('admin.masterclass.curriculum-section.create', $masterclasses->masterclass_slug) }}"
								class="btn btn-success mb-2"><i class="fas fa-user-plus me-2"></i>New
								Curriculum Section</a>
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
													aria-label="Curriculum Section Name: activate to sort column descending" style="width: 179px;">Curriculum
													Section Name</th>
												<th class="no-short" tabindex="0" aria-controls="datatables-column-search-text-inputs" rowspan="1"
													colspan="1" aria-label="Action: activate to sort column ascending" style="width: 179px;">Action
												</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
										<tfoot>
											<tr>
												<th rowspan="1" colspan="1">
													<input type="text" class="form-control" placeholder="Search Section Name">
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
	<script src="{{ asset('assets-admin/js/page/dataTableCurriculumSection.js') }}"></script>
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
