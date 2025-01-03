@extends('student.layouts.main')
@section('title', 'Settings')
@section('profile')
	<div class="col-xl-12">
		<!-- Edit profile START -->
		<div class="card bg-transparent border rounded-3">
			<!-- Card header -->
			<div class="card-header bg-transparent border-bottom">
				<h3 class="card-header-title mb-0">Edit Profile</h3>
			</div>
			<!-- Card body START -->
			<div class="card-body">
				<!-- Form -->
				<form class="row g-4" action="{{ route('student.profile.update' , Auth::user()->id) }}" method="POST">
					@csrf
					@method('PUT')
					<!-- Profile picture -->
					<div class="col-12 justify-content-center align-items-center">
						<label class="form-label">Profile picture</label>
						<div class="d-flex align-items-center">
							<label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
								<!-- Avatar place holder -->
								<span class="avatar avatar-xl">
									<img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow"
										src="{{ asset('assets/images/avatar/07.jpg') }}" alt="">
								</span>
								<!-- Remove btn -->
								<button type="button" class="uploadremove"><i class="bi bi-x text-white"></i></button>
							</label>
							<!-- Upload button -->
							<label class="btn btn-primary-soft mb-0" for="uploadfile-1">Change</label>
							<input id="uploadfile-1" class="form-control d-none" type="file">
						</div>
					</div>

					<!-- Full name -->
					<div class="col-12">
						<label class="form-label">Full name</label>
						<div class="input-group">
							<input type="text" name="full_name" class="form-control" value="{{ $user['full_name'] }}" placeholder="First name" >
						</div>
					</div>

					<!-- Username -->
					<div class="col-md-6">
						<label class="form-label">Username</label>
						<div class="input-group">
							<span class="input-group-text">MindMingle.co.id</span>
							<input type="text" value="{{ $user['username'] }}" name="username" class="form-control" value="loristev">
						</div>
					</div>

					<!-- Email id -->
					<div class="col-md-6">
						<label class="form-label">Email</label>
						<input class="form-control" type="email" value="{{ $user['email'] }}" name="email" value="example@gmail.com" placeholder="Email">
					</div>

					<!-- Phone number -->
					<div class="col-md-6">
						<label class="form-label">Phone number</label>
						<input type="text" class="form-control" name="phone_number" value="{{ $user['phone_number'] }}" placeholder="Phone number">
					</div>

					<!-- About me -->
					<div class="col-12">
						<label class="form-label">About me</label>
						<textarea name="about" class="form-control" rows="3">{{ $user['about'] }}</textarea>
						<div class="form-text">Brief description for your profile.</div>
					</div>

					<!-- Save button -->
					<div class="d-sm-flex justify-content-end">
						<button type="submit" class="btn btn-primary mb-0">Save changes</button>
					</div>
				</form>
			</div>
			<!-- Card body END -->
		</div>
		<!-- Edit profile END -->

		<div class="row g-4 mt-3">

			<div class="col-xl-6">
				<div class="card border bg-transparent rounded-3">
					<!-- Card header -->
					<div class="card-header bg-transparent border-bottom">
						<h5 class="card-header-title mb-0">Update password</h5>
					</div>
					<!-- Card body START -->
					<div class="card-body">
						<!-- Current password -->
						<div class="mb-3">
							<label class="form-label">Current password</label>
							<input class="form-control" type="password" placeholder="Enter current password">
						</div>
						<!-- New password -->
						<div class="mb-3">
							<label class="form-label"> Enter new password</label>
							<div class="input-group">
								<input class="form-control" type="password" placeholder="Enter new password">
								<span class="input-group-text p-0 bg-transparent">
									<i class="far fa-eye cursor-pointer p-2 w-40px"></i>
								</span>
							</div>
							<div class="rounded mt-1" id="psw-strength"></div>
						</div>
						<!-- Confirm password -->
						<div>
							<label class="form-label">Confirm new password</label>
							<input class="form-control" type="password" placeholder="Enter new password">
						</div>
						<!-- Button -->
						<div class="d-flex justify-content-end mt-4">
							<button type="button" class="btn btn-primary mb-0">Change password</button>
						</div>
					</div>
					<!-- Card body END -->
				</div>
			</div>

			<!-- Password change START -->
			<div class="col-lg-6">

				<!-- Title and select START -->
				<div class="card border bg-transparent rounded-3 mb-0">
					<!-- Card header -->
					<div class="card-header bg-transparent border-bottom">
						<h3 class="card-header-title mb-0">Deactivate Account</h3>
					</div>
					<!-- Card body -->
					<div class="card-body">
						<h6>Before you go...</h6>
						<ul>
							<li>Take a backup of your data <a href="#">Here</a> </li>
							<li>If you delete your account, you will lose your all data.</li>
						</ul>
						<div class="form-check form-check-md my-4">
							<input class="form-check-input" type="checkbox" value="" id="deleteaccountCheck">
							<label class="form-check-label" for="deleteaccountCheck">Yes, I'd like to delete my
								account</label>
						</div>
						<a href="#" class="btn btn-success-soft mb-2 mb-sm-0">Keep my account</a>
						<a href="#" class="btn btn-danger mb-0">Delete my account</a>
					</div>
				</div>
				<!-- Title and select END -->
			</div>
			<!-- Password change end -->
		</div>
	</div>
@endsection
