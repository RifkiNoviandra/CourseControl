@extends('layouts.app')
@section('title', 'Certificate')
@section('content')
	<main>
		<!-- Page Banner START -->
		<section class="bg-light py-5">
			<div class="container">
				<div class="row g-4 g-md-5 position-relative">
					<!-- SVG decoration -->
					<figure class="position-absolute top-0 start-0 d-none d-sm-block">
						<svg width="22px" height="22px" viewBox="0 0 22 22">
							<polygon class="fill-purple"
								points="22,8.3 13.7,8.3 13.7,0 8.3,0 8.3,8.3 0,8.3 0,13.7 8.3,13.7 8.3,22 13.7,22 13.7,13.7 22,13.7 ">
							</polygon>
						</svg>
					</figure>

					<!-- Title and Search -->
					<div class="col-lg-10 mx-auto text-center position-relative">
						<!-- SVG decoration -->
						<figure class="position-absolute top-50 end-0 translate-middle-y">
							<svg width="27px" height="27px">
								<path class="fill-orange"
									d="M13.122,5.946 L17.679,-0.001 L17.404,7.528 L24.661,5.946 L19.683,11.533 L26.244,15.056 L18.891,16.089 L21.686,23.068 L15.400,19.062 L13.122,26.232 L10.843,19.062 L4.557,23.068 L7.352,16.089 L-0.000,15.056 L6.561,11.533 L1.582,5.946 L8.839,7.528 L8.565,-0.001 L13.122,5.946 Z">
								</path>
							</svg>
						</figure>
						<!-- Title -->
						<h1 class="display-6">Check Certificate</h1>
						<!-- Search bar -->
						<div class="col-lg-8 mx-auto text-center mt-4">
							<form class="bg-body shadow rounded p-2" method="GET" action="">
								<div class="input-group">
									<input class="form-control border-0 me-1" name="search" type="text" placeholder="Code Certificate"
										autocomplete="off">
									<button type="submit" class="btn btn-blue mb-0 rounded">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="row g-4 g-md-5 mt-2">
					<div class="col-lg-12">
						<div class="card">
							<table class="table">
								<thead>
									<tr>
										<th>Credentsial ID</th>
										<th>Owner</th>
										<th>Masterclass</th>
										<th>Instructor Name</th>
										<th>Valid Date</th>
										<th>Valid Until</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>123</td>
										<td>dadang</td>
										<td>alksdn</td>
										<td>dudung</td>
										<td>30-02-2000</td>
										<td>besok</td>
									</tr>
								</tbody>
							</table>
							<div class="alert m-0 alert-danger text-center">
								Certificate Not Found
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- =======================
																																	Page Banner END -->

		<!-- =======================
																																	Page content START -->
		<section class="pt-5 pb-0 pb-lg-5">
			<div class="container">

				<div class="row g-4 g-md-5">
				</div><!-- Row END -->
			</div>
		</section>
		<!-- =======================
																																	Page content END -->

	</main>
@endsection
