@extends('layouts.app')
@push('custom-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/choices/css/choices.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/glightbox/css/glightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/quill/css/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/stepper/css/bs-stepper.min.css') }}">
@endpush
@section('title', 'Create a course')
@section('content')
    <main>

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <!-- Page Banner START -->
        <section class="py-0 bg-blue h-100px align-items-center d-flex h-200px rounded-0"
            style="background:url({{ asset('assets/images/pattern/04.png') }}) no-repeat center center; background-size:cover;">
            <!-- Main banner background image -->
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <!-- Title -->
                        <h1 class="text-white">Submit a new Course</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Banner END -->

        <!-- steps START -->
        <section>
            <div class="container">
                <div class="card bg-transparent border rounded-3 mb-5">
                    <div id="stepper" class="bs-stepper stepper-outline">
                        <!-- Card header -->
                        <div class="card-header bg-light border-bottom px-lg-5">
                            <!-- Step Buttons START -->
                            <div class="bs-stepper-header" role="tablist">
                                <!-- Step 1 -->
                                <div class="step" data-target="#step-1">
                                    <div class="d-grid text-center align-items-center">
                                        <button type="button" class="btn btn-link step-trigger mb-0" role="tab"
                                            id="steppertrigger1" aria-controls="step-1" aria-selected="true">
                                            <span class="bs-stepper-circle">1</span>
                                        </button>
                                        <h6 class="bs-stepper-label d-none d-md-block">Course details</h6>
                                    </div>
                                </div>
                                <div class="line"></div>

                                <!-- Step 2 -->
                                <div class="step" data-target="#step-2">
                                    <div class="d-grid text-center align-items-center">
                                        <button type="button" class="btn btn-link step-trigger mb-0" role="tab"
                                            id="steppertrigger2" aria-controls="step-2" aria-selected="false">
                                            <span class="bs-stepper-circle">2</span>
                                        </button>
                                        <h6 class="bs-stepper-label d-none d-md-block">Course media</h6>
                                    </div>
                                </div>
                                {{-- <div class="line"></div> --}}

                                <!-- Step 3 -->
                                {{-- <div class="step" data-target="#step-3">
									<div class="d-grid text-center align-items-center">
										<button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger3"
											aria-controls="step-3" aria-selected="false">
											<span class="bs-stepper-circle">3</span>
										</button>
										<h6 class="bs-stepper-label d-none d-md-block">Curriculum</h6>
									</div>
								</div>
								<div class="line"></div>

								<!-- Step 4 -->
								<div class="step" data-target="#step-4">
									<div class="d-grid text-center align-items-center">
										<button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger4"
											aria-controls="step-4" aria-selected="false">
											<span class="bs-stepper-circle">4</span>
										</button>
										<h6 class="bs-stepper-label d-none d-md-block">Course preview</h6>
									</div>
								</div> --}}
                                {{-- </div> --}}
                                <!-- Step Buttons END -->
                            </div>

                            <!-- Card body START -->
                            <div class="card-body">
                                <!-- Step content START -->
                                @if (!empty($successMsg))
                                    {{ $successMsg }}
                                @endif
                                <div class="bs-stepper-content">
                                    <form method="POST" action="{{ route('instructor.mycourse.add') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!-- Step 1 content START -->
                                        <div id="step-1" role="tabpanel" class="content fade dstepper-block"
                                            aria-labelledby="steppertrigger1">
                                            <!-- Title -->
                                            <h4>Course details</h4>

                                            <hr> <!-- Divider -->

                                            <!-- Basic information START -->
                                            <div class="row g-4">
                                                <!-- Course title -->
                                                <div class="col-12">
                                                    <label class="form-label">Course title</label>
                                                    <input
                                                        class="form-control @error('masterclass_name') is-invalid @enderror"
                                                        name="masterclass_name" wire:model="masterclass_name" type="text"
                                                        placeholder="Enter course title"
                                                        value="{{ old('masterclass_name') }}">
                                                    @error('masterclass_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Short description -->
                                                <div class="col-12">
                                                    <label class="form-label">Short description</label>
                                                    <textarea class="form-control @error('masterclass_short_desc') @enderror" name="masterclass_short_description"
                                                        wire:model="masterclass_short_desc" rows="2" placeholder="Enter keywords">{{ old('masterclass_short_desc') }}</textarea>
                                                    @error('masterclass_short_desc')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Course category -->
                                                <div class="col-md-6">
                                                    <label class="form-label" for="category">Select category</label>
                                                    <select class="form-select form-select-sm js-choice" name="category_id"
                                                        wire:model="category" id="category" aria-label=".form-select-sm ">
                                                        <option value="">Select course category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->category_id }}"
                                                                {{ $category->category_id == old('category_id') ? 'selected' : 'is_invalid' }}>
                                                                {{ $category->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Course level -->
                                                <div class="col-md-6">
                                                    <label class="form-label" for="masterclass_level">Course level</label>
                                                    <select class="form-select form-select-sm js-choice"
                                                        name="masterclass_level_id" wire:model="masterclass_level"
                                                        id="masterclass_level" aria-label=".form-select-sm ">
                                                        <option value="">Select course level</option>
                                                        @foreach ($levels as $level)
                                                            <option value="{{ $level->masterclass_level_id }}"
                                                                {{ $level->masterclass_level_id == old('masterclass_level_id') ? 'selected' : 'is_invalid' }}>
                                                                {{ $level->masterclass_level_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('masterclass_level_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Course Class Type -->
                                                <div class="col-md-6">
                                                    <label class="form-label" for="class_type">Class Type</label>
                                                    <select class="form-select form-select-sm js-choice"
                                                        name="class_type_id" wire:model="class_type" id="class_type"
                                                        aria-label=".form-select-sm example">
                                                        <option value="">Select class type</option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->class_type_id }}"
                                                                {{ $class->class_type_id == old('class_type') ? 'selected' : 'is_invalid' }}>
                                                                {{ $class->class_type_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('class_type_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Course Price Type -->
                                                <div class="col-md-6">
                                                    <label class="form-label" for="price_type">Price Type</label>
                                                    <select class="form-select form-select-sm js-choice"
                                                        name="price_type_id" wire:model="price_type" id="price_type"
                                                        aria-label=".form-select-sm example">
                                                        <option value="">Select price type</option>
                                                        @foreach ($prices as $price)
                                                            <option value="{{ $price->price_type_id }}"
                                                                {{ $price->price_type_id == old('price_type_id') ? 'selected' : 'is_invalid' }}>
                                                                {{ $price->price_type_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('price_type_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Course time -->
                                                <div class="col-md-6">
                                                    <label class="form-label">Course time</label>
                                                    <input
                                                        class="form-control @error('masterclass_total_duration') is-invalid @enderror"
                                                        name="masterclass_total_duration" type="text"
                                                        wire:model="masterclass_total_duration" data-mask="00h 00m"
                                                        id="masterclass_total_duration"
                                                        placeholder="Enter course time (00h 00m)">
                                                    @error('masterclass_total_duration')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Total lecture -->
                                                <div class="col-md-6">
                                                    <label class="form-label">Total Curriculum</label>
                                                    <input
                                                        class="form-control @error('masterclass_total_curriculum') is-invalid @enderror"
                                                        type="number" wire:model="masterclass_total_curriculum"
                                                        name="masterclass_total_curriculum"
                                                        placeholder="Enter total curriculumn">
                                                    @error('masterclass_total_curriculum')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Course price -->
                                                <div class="col-md-6">
                                                    <label class="form-label">Course price</label>
                                                    <input type="number"
                                                        class="form-control @error('price') is_invalid @enderror"
                                                        id="masterclass_price" name="masterclass_price"
                                                        wire:model="price" placeholder="Enter course price">
                                                    @error('price')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>


                                                <!-- Course description -->
                                                <div class="col-12">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control @error('masterclass_description') is-invalid @enderror" name="masterclass_description"
                                                        wire:model="masterclass_description" rows="12" placeholder="Enter keywords">{{ old('masterclass_description') }}</textarea>
                                                    @error('masterclass_description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <!-- Step 1 button -->
                                                    <div class="d-flex justify-content-end mt-3">
                                                        <button type="button" wire:click="firstStepSubmit"
                                                            class="btn btn-primary next-btn mb-0">Next</button>
                                                    </div>
                                                </div>
                                                <!-- Basic information START -->
                                            </div>
                                        </div>
                                        <!-- Step 1 content END -->

                                        <!-- Step 2 content START -->
                                        <div id="step-2" role="tabpanel" class="content fade dstepper-none"
                                            aria-labelledby="steppertrigger2">
                                            <!-- Title -->
                                            <h4>Course media</h4>

                                            <hr> <!-- Divider -->

                                            <div class="row">
                                                <!-- Upload image START -->
                                                <div class="col-12">
                                                    <div
                                                        class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
                                                        <!-- Image -->
                                                        <img id="thumbnail" class="h-200px" width="300"
                                                            src="{{ asset('assets/images/element/gallery.svg') }}"
                                                            alt="your image" />
                                                        <div>
                                                            <h6 class="my-2">Upload course image here, or<a
                                                                    href="#!" class="text-primary"> Browse</a>
                                                            </h6>
                                                            <label style="cursor:pointer;">
                                                                <span>
                                                                    <input class="form-control stretched-link"
                                                                        id="masterclass_thumbnail" type="file"
                                                                        wire:model="masterclass_thumbnail" id="image"
                                                                        name="image_thumb"
                                                                        accept="image/gif, image/jpeg, image/png">
                                                                </span>
                                                            </label>
                                                            <p class="small mb-0 mt-2"><b>Note:</b> Only JPG, JPEG and PNG.
                                                                Our suggested dimensions are 600px *
                                                                450px.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Upload image END -->

                                                <!-- Upload video START -->
                                                <div class="col-12">
                                                    <h5 class="mt-4">Upload video</h5>
                                                    <!-- Input -->
                                                    <div class="position-relative my-4">
                                                        <hr>
                                                        <p
                                                            class="small position-absolute top-50 start-50 translate-middle bg-body px-3 mb-0">
                                                            Or</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Upload video</label>
                                                        <div class="input-group mb-3">
                                                            <input type="file"
                                                                class="form-control file_video @error('masterclass_video_preview') is-invalid @enderror"
                                                                wire:model="masterclass_video_preview"
                                                                id="inputGroupFile01" name="vid_prev" accept="video/*">
                                                            <label class="input-group-text">.mp4</label>
                                                            @error('masterclass_video_preview')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <!-- Preview -->
                                                    <h5 class="mt-4">Video preview</h5>
                                                    <div class="position-relative bg-dark rounded-3">
                                                        <div class="video-player rounded-3">
                                                            <video controls crossorigin="anonymous" class="rounded-3"
                                                                playsinline poster="#">
                                                                <source src="#" type="video/mp4" size="720"
                                                                    id="video_here">
                                                                Your browser does not support HTML5 video.
                                                            </video>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Upload video END -->

                                                <!-- Step 2 button -->
                                                <div class="d-flex justify-content-between mt-3">
                                                    <button class="btn btn-secondary prev-btn mb-0" type="button"
                                                        wire:click="back(1)">Previous</button>
                                                    <button type="submit" id="save" class="btn btn-success my-0"
                                                        data-bs-dismiss="modal">Save
                                                        Lecture</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Step 2 content END -->
                                    </form>
                                </div>
                            </div>
                            <!-- Card body END -->
                        </div>
                    </div>
                </div>
        </section>
        <!-- Steps END -->
    </main>
    <div class="modal fade" id="addLecture" tabindex="-1" aria-labelledby="addLectureLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="addLectureLabel">Add Lecture</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal"
                        aria-label="Close"><i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('curriculum.store') }}" class="row text-start g-3">
                        @csrf
                        <!-- Course name -->
                        <div class="col-12">
                            <label class="form-label">Course name <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('curriculum_section_name') is-invalid @enderror"
                                wire:model="curriculum_section_name" id="curriculum_section_name"
                                placeholder="Enter course name" required>
                            @error('curriculum_section_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger-soft my-0"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="save" class="btn btn-success my-0"
                                data-bs-dismiss="modal">Save
                                Lecture</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="addTopic" tabindex="-1" aria-labelledby="addTopicLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="addTopicLabel">Add topic</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal"
                        aria-label="Close"><i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <form class="row text-start g-3">
                        <!-- Topic name -->
                        <div class="col-md-12">
                            <label class="form-label">Topic name</label>
                            <input class="form-control @error('curriculum_name') is-invalid @enderror"
                                wire:model="curriculum_name" type="text" placeholder="Enter topic name">
                            @error('curriculum_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- Video link -->
                        <div class="col-md-12">
                            <label class="form-label">Upload video</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control @error('curriculum_video') is-invalid @enderror"
                                    wire:model="curriculum_video" id="inputGroupFile01">
                                <label class="input-group-text">.mp4</label>
                                @error('curriculum_video')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Description -->
                        <div class="col-12 mt-3">
                            <label class="form-label">Course description</label>
                            <textarea class="form-control @error('curriculum_description') is-invalid @enderror" rows="4"
                                wire:model="curriculum_description" placeholder="" spellcheck="false"></textarea>
                            @error('curriculum_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success my-0">Save topic</button>
                </div>
            </div>
        </div>
    </div>
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

        $('#price_type').change(function() {
            var disabled = (this.value == '1' || this.value == '');
            $('#masterclass_price').prop('disabled', disabled);
            $('#masterclass_discount').prop('disabled', disabled);
        }).change();

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
