<div class="col-xl-3">
	<!-- Responsive offcanvas body START -->
	<nav class="navbar navbar-light navbar-expand-xl mx-0">
		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
			<div class="offcanvas-body p-3 p-xl-0">
				<div class="bg-dark border rounded-3 pb-0 p-3 w-100">
					<!-- Dashboard menu -->
					<div class="list-group list-group-dark list-group-borderless">
						<a class="list-group-item active" href="{{ route('instructor.index') }}"><i
								class="bi bi-ui-checks-grid fa-fw me-2"></i>Dashboard</a>
						<a class="list-group-item" href="{{ route('instructor.mycourse') }}"><i class="bi bi-basket fa-fw me-2"></i>My
							Courses</a>
						<a class="list-group-item" href="{{ route('instructor.student') }}"><i
								class="bi bi-people fa-fw me-2"></i>Students</a>
						<a class="list-group-item" href="{{ route('instructor.order') }}"><i
								class="bi bi-folder-check fa-fw me-2"></i>Orders</a>
						<a class="list-group-item" href="{{ route('instructor.review') }}"><i
								class="bi bi-star fa-fw me-2"></i>Reviews</a>
						<a class="list-group-item" href="{{ route('instructor.setting') }}"><i
								class="bi bi-gear fa-fw me-2"></i>Settings</a>
						<a class="list-group-item text-danger bg-danger-soft-hover" href="sign-in.html"><i
								class="fas fa-sign-out-alt fa-fw me-2"></i>Sign
							Out</a>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<!-- Responsive offcanvas body END -->
</div>
