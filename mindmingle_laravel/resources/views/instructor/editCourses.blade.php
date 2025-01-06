@extends('layouts.app')
@push('custom-style')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/choices/css/choices.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/aos/aos.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/glightbox/css/glightbox.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/quill/css/quill.snow.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/stepper/css/bs-stepper.min.css') }}">
@endpush
@section('title', 'Edit course')
@section('content')
	<livewire:edit-course :data="$data">

	@endsection
	@push('custom-script')
		<script src="{{ asset('assets/vendor/choices/js/choices.min.js') }}"></script>
		<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
		<script src="{{ asset('assets/vendor/glightbox/js/glightbox.js') }}"></script>
		<script src="{{ asset('assets/vendor/quill/js/quill.min.js') }}"></script>
		<script src="{{ asset('assets/vendor/stepper/js/bs-stepper.min.js') }}"></script>

		<script>
		 masterclass_thumbnail.onchange = evt => {
		  const [file] = masterclass_thumbnail.files
		  if (file) {
		   thumbnail.src = URL.createObjectURL(file)
		  }
		 }

		 $(document).on("change", ".file_video", function(evt) {
		  var $source = $('#video_here');
		  $source[0].src = URL.createObjectURL(this.files[0]);
		  $source.parent()[0].load();
		 });


		 var a = 1;
		 var add = $('#save').on('click', function() {
		  a++;
		  $('#accordionExample2').append(`
        <div class="accordion-item mb-3">
            <h6 class="accordion-header font-base" id="heading-${innerHTML = a}">
				<button class="accordion-button fw-bold rounded d-inline-block collapsed d-block pe-5" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapse-${innerHTML = a}" aria-expanded="false"
					aria-controls="collapse-1">
					${$('#curriculum_name').val()}
				</button>
			</h6>

			<div id="collapse-${innerHTML = a}" class="accordion-collapse collapse show" aria-labelledby="heading-1"
			    data-bs-parent="#accordionExample2">
			        <!-- Topic START -->
			    <div class="accordion-body mt-3">
			        <!-- Add topic -->
			        <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal"
			        data-bs-target="#addTopic"><i class="bi bi-plus-circle me-2"></i>Add topic</a>
			    </div>
			    <!-- Topic END -->
			</div>
		</div>
        `)
		 })
		</script>
	@endpush
