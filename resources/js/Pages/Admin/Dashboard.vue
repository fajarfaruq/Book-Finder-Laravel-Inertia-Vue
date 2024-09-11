<template>
	<div class="app-wrapper"> <!--begin::Header-->
		<nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
			<div class="container-fluid"> <!--begin::Start Navbar Links-->
				<ul class="navbar-nav">
					<li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i
								class="bi bi-list"></i> </a> </li>
				</ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
				<ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
					<li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle"
							data-bs-toggle="dropdown"> <img src="https://adminlte-v4.netlify.app/dist/assets/img/user2-160x160.jpg"
								class="user-image rounded-circle shadow" alt="User Image"> <span
								class="d-none d-md-inline">Alexander Pierce</span> </a>
						<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
							<li class="user-header text-bg-primary"> <img src="https://adminlte-v4.netlify.app/dist/assets/img/user2-160x160.jpg"
									class="rounded-circle shadow" alt="User Image">
								<p>
									Alexander Pierce - Web Developer
									<small>Member since Nov. 2023</small>
								</p>
							</li> <!--end::User Image--> <!--begin::Menu Body-->
							<li class="user-footer"> <a href="#" class="btn btn-default btn-flat">Profile</a> <a
									href="#" class="btn btn-default btn-flat float-end">Sign out</a> </li>
							<!--end::Menu Footer-->
						</ul>
					</li> <!--end::User Menu Dropdown-->
				</ul> <!--end::End Navbar Links-->
			</div> <!--end::Container-->
		</nav> <!--end::Header--> <!--begin::Sidebar-->
		<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
			<div class="sidebar-brand"> <!--begin::Brand Link--> <a class='brand-link' href='/dist/pages/'>
					<!--begin::Brand Image--> <img src="https://adminlte-v4.netlify.app/dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
						class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span
						class="brand-text fw-light">BookFinder</span> <!--end::Brand Text--> </a> <!--end::Brand Link-->
			</div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
			<div class="sidebar-wrapper">
				<nav class="mt-2"> <!--begin::Sidebar Menu-->
					<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
						data-accordion="false">
						<li class="nav-header">MAIN NAVIGATION</li>
						<li class="nav-item"> <a class='nav-link' href='/dist/pages/docs/introduction'> <i
									class="nav-icon bi bi-book"></i>
								<p>Master Books</p>
							</a> </li>
					</ul> <!--end::Sidebar Menu-->
				</nav>
			</div> <!--end::Sidebar Wrapper-->
		</aside> <!--end::Sidebar--> <!--begin::App Main-->
		<main class="app-main"> <!--begin::App Content Header-->

		</main> <!--end::App Main--> <!--begin::Footer-->
	</div> <!--end::App Wrapper-->
</template>