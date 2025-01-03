<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a class="sidebar-toggle">
		<i class="hamburger align-self-center"></i>
	</a>

	<div class="navbar-collapse collapse">
		<ul class="navbar-nav navbar-align">
			<li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
					<i class="align-middle" data-feather="settings"></i>
				</a>

				<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
					<span class="text-dark">{{ Auth::user()->full_name }}</span>
				</a>
				<div class="dropdown-menu dropdown-menu-end">
					<a class="dropdown-item" href="{{ route('admin.profile.show', Auth::user()->id) }}"><i class="align-middle me-1"
							data-feather="user"></i> Profile</a>
					<a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1"
							data-feather="settings"></i>Settings & Privacy</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="info"></i>Help</a>
					<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
							class="align-middle me-1" data-feather="power"></i>Sign out</a>
					<form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
						@csrf
					</form>
				</div>
			</li>
		</ul>
	</div>
</nav>
