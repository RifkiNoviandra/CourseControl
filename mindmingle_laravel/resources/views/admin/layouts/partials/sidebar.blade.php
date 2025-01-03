<nav id="sidebar" class="sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="/admin">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
				y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20"
				xml:space="preserve">
				<path
					d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4
              C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z" />
				<path
					d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z" />
				<path
					d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z" />
			</svg>

			<span class="align-middle me-3">Mind Mingle</span>
		</a>

		<ul class="sidebar-nav">
			<li class="sidebar-header">Dashboard</li>
			<li class="sidebar-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
				<a class="sidebar-link" href="{{ route('admin.dashboard') }}">
					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
				</a>
			</li>
			<li class="sidebar-header">Data</li>
			<li class="sidebar-item {{ request()->is('admin/users*') ? 'active' : '' }}">
				<a href="#" class="sidebar-link {{ request()->is('admin/users*') ? '' : 'collapsed' }}"
					data-bs-target="#users" data-bs-toggle="collapse" aria-expanded="false">
					<i class="align-middle" data-feather="users"></i>
					<span class="align-middle">Users</span>
				</a>
				<ul id="users" class="sidebar-dropdown list-unstyled collapse {{ request()->is('admin/users*') ? 'show' : '' }}"
					data-bs-parent="#sidebar">
					<li class="sidebar-item {{ request()->is('admin/users/admins*') ? 'active' : '' }}">
						<a href="{{ route('admin.admins.index') }}" class="sidebar-link">Admin</a>
					</li>
					<li class="sidebar-item {{ request()->is('admin/users/students*') ? 'active' : '' }}">
						<a href="{{ route('admin.students.index') }}" class="sidebar-link">Student</a>
					</li>
					<li class="sidebar-item {{ request()->is('admin/users/instructors*') ? 'active' : '' }}">
						<a href="{{ route('admin.instructors.index') }}" class="sidebar-link">Instructor</a>
					</li>
				</ul>
			</li>
			<li class="sidebar-item {{ request()->is('admin/roles*') ? 'active' : '' }}">
				<a class="sidebar-link" href="{{ route('admin.roles.index') }}">
					<i class="align-middle" data-feather="tool"></i> <span class="align-middle">Roles</span>
				</a>
			</li>
			<li class="sidebar-item {{ request()->is('admin/category*') ? 'active' : '' }}">
				<a class="sidebar-link {{ request()->is('admin/category*') ? '' : 'collapsed' }}" data-bs-target="#category"
					href="#" data-bs-toggle="collapse" aria-expanded="false">
					<i class="align-middle" data-feather="grid"></i>
					<span class="align-middle">Categories</span>
				</a>
				<ul id="category"
					class="sidebar-dropdown list-unstyled collapse {{ request()->is('admin/category*') ? 'show' : '' }}"
					data-bs-parent="#sidebar">
					<li class="sidebar-item {{ request()->is('admin/category/course-categories*') ? 'active' : '' }}">
						<a href="{{ route('admin.course-categories.index') }}" class="sidebar-link">Course Category</a>
					</li>
					<li class="sidebar-item {{ request()->is('admin/category/price-types*') ? 'active' : '' }}">
						<a href="{{ route('admin.price-types.index') }}" class="sidebar-link">Price Type</a>
					</li>
					<li class="sidebar-item {{ request()->is('admin/category/class-types*') ? 'active' : '' }}">
						<a href="{{ route('admin.class-types.index') }}" class="sidebar-link">Class Type</a>
					</li>
					<li class="sidebar-item {{ request()->is('admin/category/course-levels*') ? 'active' : '' }}">
						<a href="{{ route('admin.course-levels.index') }}" class="sidebar-link">Course Level</a>
					</li>
				</ul>
			</li>

			<li class="sidebar-item {{ request()->is('admin/masterclasses*') ? 'active' : '' }}">
				<a class="sidebar-link" href="{{ route('admin.masterclasses.index') }}">
					<i class="align-middle" data-feather="book"></i> <span class="align-middle">Masterclasses</span>
				</a>
			</li>

			<li class="sidebar-header">Pages</li>
			<li class="sidebar-item">
				<a class="sidebar-link" href="{{ route('home') }}">
					<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Home Page</span>
				</a>
				<a class="sidebar-link" href="{{ route('help') }}">
					<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Help Page</span>
				</a>
			</li>
		</ul>
	</div>
</nav>
