<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
<base href="../" />
		<title>Admin Management Financial</title>
		<meta charset="utf-8" />
		<meta name="description" content="Admin Management Financial hanya dapat diakses oleh pengelola dan staff yang diberi izin oleh pengelola" />
		<meta name="keywords" content="Admin Management Financial hanya dapat diakses oleh pengelola dan staff yang diberi izin oleh pengelola" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Admin Website - Perpustakaan Ibrahimy" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Metronic by Keenthemes" />

		<link rel="canonical" href="http://preview.keenthemes.comlayouts/light-sidebar.html" />
		<link rel="shortcut icon" href="admin/assets/media/logos/logo perpus icon.png" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<link href="admin/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="admin/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="admin/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        




		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>

        <style>
            /* ===== Background body (default: light mode) ===== */
            body  {
                background-color: #f1f5f9;
                background-image: linear-gradient(135deg, rgba(226,232,240,0.35) 0%, rgba(209,230,222,0.35) 50%, rgba(219,226,242,0.35) 75%, rgba(241,245,249,0.35) 100%);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
                background-size: cover;
            }
            /* ===== Background body (dark mode) ===== */
            [data-bs-theme="dark"] body  {
                background-color: #0f172a;
                background-image: linear-gradient(135deg, rgba(20,34,31,0.35) 0%, rgba(30,27,75,0.35) 50%, rgba(49,46,129,0.35) 75%, rgba(15,23,42,0.35) 100%);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
                background-size: cover;
            }

            /* ===== Active menu link -> hijau terang (badge light) ===== */
            .menu-link.active {
                background-color: rgba(19, 171, 69, 0.12) !important;
                color: #13ab45 !important;
                backdrop-filter: blur(2px);
                -webkit-backdrop-filter: blur(2px);
            }
            .menu-link.active .menu-title,
            .menu-link.active .menu-icon {
                color: #13ab45 !important;
            }
            .menu-link.active .menu-bullet .bullet-dot {
                background-color: #13ab45 !important;
            }
        </style>

    </head>
	<!--end::Head-->
	<!--begin::Body-->
	<body onload="realtimeClock()" id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="true">
					<!--begin::Header container-->
					<div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
						<!--begin::Sidebar mobile toggle-->
						<div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
							<div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
								<i class="ki-outline ki-abstract-14 fs-2 fs-md-1"></i>
							</div>
						</div>
						<!--end::Sidebar mobile toggle-->
						<!--begin::Mobile logo-->
						<div class="flex-1 d-flex align-items-center flex-lg-grow-0">
							<a href="/admin/home" class="d-lg-none">
								<img alt="Logo" src="admin/assets/media/logos/default-small.svg" class="h-30px" />
							</a>
						</div>
						<!--end::Mobile logo-->
						<!--begin::Header wrapper-->
						<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
							<!--begin::Menu wrapper-->
							<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
								<!--begin::Menu-->
								<div class="px-2 my-5 menu menu-rounded menu-column menu-lg-row my-lg-0 align-items-stretch fw-semibold px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
										<!--begin:Menu link-->
										<span class="menu-link">
											<span class="menu-title">System Management Financial</span>
										</span>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end::Menu-->
							</div>
							<!--end::Menu wrapper-->
							<!--begin::Navbar-->
							<div class="shrink-0 app-navbar">
                                <div class="app-navbar-item ms-1 ms-md-4">
									<!--begin::Menu wrapper-->
                                    <?php
                                        $hari = Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y');
                                    ?>
                                    <span class="px-4 py-3 badge fs-7 badge-light-primary">
										<span class="bullet bullet-dot bg-primary h-6px w-6px animation-blink me-2"></span>
										<label class=""><?php echo e($hari); ?> - </label>
                                        <label id="clock" class="ms-2"></label>
                                    </span>
									<!--end::Menu wrapper-->
								</div>
								<!--begin::Theme mode-->
								<div class="app-navbar-item ms-1 ms-md-4">
									<!--begin::Menu toggle-->
									<a href="#" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
										<i class="ki-outline ki-night-day theme-light-show fs-1"></i>
										<i class="ki-outline ki-moon theme-dark-show fs-1"></i>
									</a>
									<!--begin::Menu toggle-->
									<!--begin::Menu-->
									<div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
										<!--begin::Menu item-->
										<div class="px-3 my-0 menu-item">
											<a href="#" class="px-3 py-2 menu-link" data-kt-element="mode" data-kt-value="light">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-outline ki-night-day fs-2"></i>
												</span>
												<span class="menu-title">Light</span>
											</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="px-3 my-0 menu-item">
											<a href="#" class="px-3 py-2 menu-link" data-kt-element="mode" data-kt-value="dark">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-outline ki-moon fs-2"></i>
												</span>
												<span class="menu-title">Dark</span>
											</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="px-3 my-0 menu-item">
											<a href="#" class="px-3 py-2 menu-link" data-kt-element="mode" data-kt-value="system">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-outline ki-screen fs-2"></i>
												</span>
												<span class="menu-title">System</span>
											</a>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu-->
								</div>
								<!--end::Theme mode-->
								<!--begin::User menu-->
								<div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
									<!--begin::Menu wrapper-->
									<div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
										<img src="<?php echo e(auth()->user() ? 'storage/foto/'.auth()->user()->foto : 'assets/media/avatars/blank.png'); ?>" class="rounded-3" alt="user" />
									</div>
									<!--begin::User account menu-->
									<div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold fs-6 w-275px" data-kt-menu="true">
										<!--begin::Menu item-->
										<div class="px-3 menu-item">
											<div class="px-3 menu-content d-flex align-items-center">
												<!--begin::Avatar-->
												<div class="symbol symbol-50px me-5">
													<img alt="Logo" src="<?php echo e(auth()->user() ? 'storage/foto/'.auth()->user()->foto : 'assets/media/avatars/blank.png'); ?>" />
												</div>
												<!--end::Avatar-->
												<!--begin::Username-->
												<div class="d-flex flex-column">
													<div class="fw-bold d-flex align-items-center fs-5"><?php echo e(auth()->user()->name ?? ''); ?>

													<span class="px-2 py-1 badge badge-light-success fw-bold fs-8 ms-2">Active</span></div>
													<a href="#" class="fw-semibold text-muted text-hover-primary fs-7"><?php echo e(auth()->user()->idstaf ?? ''); ?></a>
												</div>
												<!--end::Username-->
											</div>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="my-2 separator"></div>
										<!--end::Menu separator-->
										<!--begin::Menu item-->
										<div class="px-5 menu-item">
											<a href="#" class="px-5 menu-link">Profile</a>
										</div>
										<!--end::Menu item-->

										<!--begin::Menu item-->
										<div class="px-5 menu-item">
											<a href="<?php echo e(route('logout')); ?>" class="px-5 menu-link">Logout</a>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::User account menu-->
									<!--end::Menu wrapper-->
								</div>
								<!--end::User menu-->
								<!--begin::Header menu toggle-->
								<div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
									<div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
										<i class="ki-outline ki-element-4 fs-1"></i>
									</div>
								</div>
								<!--end::Header menu toggle-->
								<!--begin::Aside toggle-->
								<!--end::Header menu toggle-->
							</div>
							<!--end::Navbar-->
						</div>
						<!--end::Header wrapper-->
					</div>
					<!--end::Header container-->
				</div>
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
						<!--begin::Logo-->
						<div class="px-6 app-sidebar-logo" id="kt_app_sidebar_logo">
							<!--begin::Logo text-->
							<a href="index.html" class="text-decoration-none d-flex flex-column lh-1">
								<span class="fs-4 fw-bold text-dark app-sidebar-logo-default theme-light-show">Management</span>
								<span class="fs-4 fw-bold text-dark app-sidebar-logo-default theme-light-show">Financial</span>
								<span class="fs-4 fw-bold text-white app-sidebar-logo-default theme-dark-show">Management</span>
								<span class="fs-4 fw-bold text-white app-sidebar-logo-default theme-dark-show">Financial</span>
								<span class="fs-5 fw-bold text-dark app-sidebar-logo-minimize theme-light-show">MF</span>
								<span class="fs-5 fw-bold text-white app-sidebar-logo-minimize theme-dark-show">MF</span>
							</a>
							<!--end::Logo text-->
							<!--begin::Sidebar toggle-->
							<!--begin::Minimized sidebar setup:
            if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on") {
                1. "src/js/layout/sidebar.js" adds "sidebar_minimize_state" cookie value to save the sidebar minimize state.
                2. Set data-kt-app-sidebar-minimize="on" attribute for body tag.
                3. Set data-kt-toggle-state="active" attribute to the toggle element with "kt_app_sidebar_toggle" id.
                4. Add "active" class to to sidebar toggle element with "kt_app_sidebar_toggle" id.
            }
        -->
							<div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
								<i class="rotate-180 ki-outline ki-black-left-line fs-3"></i>
							</div>
							<!--end::Sidebar toggle-->
						</div>
						<!--end::Logo-->
						<!--begin::sidebar menu-->
						<div class="overflow-hidden app-sidebar-menu flex-column-fluid">
							<!--begin::Menu wrapper-->
							<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
								<!--begin::Scroll wrapper-->
								<div id="kt_app_sidebar_menu_scroll" class="mx-3 my-5 scroll-y" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
									<!--begin::Menu-->
									<div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
										<!--begin:Menu item-->
										<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <a class="menu-link <?php echo e(request()->is('admin/home') ? 'active' : ''); ?>" href="admin/home">
                                                <span class="menu-icon">
													<i class="ki-outline ki-home fs-2"></i>
												</span>
												<span class="menu-title">Dashboard</span>
											</a>
										</div>
										<!--end:Menu item-->
                                        <!--begin:Menu item-->
										<div class="pt-5 menu-item">
											<!--begin:Menu content-->
											<div class="menu-content">
												<span class="menu-heading fw-bold text-uppercase fs-7">Application</span>
											</div>
											<!--end:Menu content-->
										</div>

										<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <a class="menu-link <?php echo e(request()->is('admin/inflow') ? 'active' : ''); ?>" href="admin/inflow">
                                                <span class="menu-icon">
													<i class="ki-outline ki-chart-line-up fs-2"></i>
												</span> 
												<span class="menu-title">Cash Inflow</span>
											</a>
										</div>

										<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <a class="menu-link <?php echo e(request()->is('admin/outflow') ? 'active' : ''); ?>" href="admin/outflow">
                                                <span class="menu-icon">
													<i class="ki-outline ki-chart-line-down fs-2"></i>
												</span> 
												<span class="menu-title">Cash Outflow</span>
											</a>
										</div>

										<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <a class="menu-link <?php echo e(request()->is('admin/plan') ? 'active' : ''); ?>" href="admin/plan">
                                                <span class="menu-icon">
													<i class="ki-outline ki-lots-shopping fs-2"></i>
												</span> 
												<span class="menu-title">Plan Spending</span>
											</a>
										</div>

										<div class="pt-5 menu-item">
											<!--begin:Menu content-->
											<div class="menu-content">
												<span class="menu-heading fw-bold text-uppercase fs-7">Access</span>
											</div>
											<!--end:Menu content-->
										</div>

                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="ki-outline ki-address-book fs-2"></i>
                                                </span>
                                                <span class="menu-title">Users</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <a class="menu-link <?php echo e(request()->is('admin/pengguna') ? 'active' : ''); ?>" href="admin/pengguna">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">User Data</span>
													</a>
                                                </div>
												<div class="menu-item">
													<!--begin:Menu link-->
													<a class="menu-link <?php echo e(request()->is('admin/pengguna-akses') ? 'active' : ''); ?>" href="admin/pengguna-akses">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Access</span>
													</a>
													<!--end:Menu link-->
												</div>
                                            </div>
                                        </div>

										
										<!--end:Menu item-->
									</div>
									<!--end::Menu-->
								</div>
								<!--end::Scroll wrapper-->
							</div>
							<!--end::Menu wrapper-->
						</div>
						<!--end::sidebar menu-->
						<!--begin::Footer-->

						<!--end::Footer-->
					</div>
					<!--end::Sidebar-->
					<!--begin::Main-->
					

					<style>
						.maintenance-alert {
							background-color: #f59e0b; /* Amber */
							animation: pulse 1.5s ease-in-out infinite;
							font-weight: bold;
							position: relative;
							z-index: 9999;
						}

						@keyframes pulse {
							0%, 100% {
								opacity: 1;
							}
							50% {
								opacity: 0.6;
							}
						}
					</style>

					<?php echo $__env->yieldContent('admin-konten'); ?>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
        <?php if(session('success')): ?>
        <script>
            Swal.fire({
                title: 'Alhamdulillah!',
                text: '<?php echo e(session('success')); ?>',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
        </script>
        <?php endif; ?>
        <?php if(session('error')): ?>
        <script>
            Swal.fire({
                title: 'Astaghfirullah!',
                text: '<?php echo e(session('error')); ?>',
                icon: 'error',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
        </script>
        <?php endif; ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.delete-button').forEach(function (button) {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const url = this.getAttribute('href'); // Ambil URL dari atribut href

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "This data will be deleted and cannot be recovered!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, destroy!',
                            cancelButtonText: 'canceled',
                            customClass: {
                                confirmButton: 'btn btn-danger', // Gaya tombol
                                cancelButton: 'btn btn-secondary'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect ke URL untuk menghapus data
                                window.location.href = url;
                            }
                        });
                    });
                });
            });
        </script>
		<!--begin::Script Purchase Button-->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.purchase-button').forEach(function (button) {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const url = this.getAttribute('href');

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Item will be purchased and added to cash outflow!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, purchase!',
                            cancelButtonText: 'Cancel',
                            customClass: {
                                confirmButton: 'btn btn-primary',
                                cancelButton: 'btn btn-secondary'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = url;
                            }
                        });
                    });
                });
            });
        </script>
		<!--end::Script Purchase Button-->
		<!--beign::Script Maintenance-->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.maintenance').forEach(function (button) {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const url = this.getAttribute('href'); // Ambil URL dari atribut href

                        Swal.fire({
                            title: 'Mohon maaf',
                            text: "Halaman ini sedang dalam perbaikan",
                            icon: 'warning',
                            showCancelButton: false,
                            cancelButtonText: 'Kembali',
                            customClass: {
                                confirmButton: 'btn btn-danger', // Gaya tombol
                                cancelButton: 'btn btn-secondary'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect ke URL untuk menghapus data
                                window.location.href = url;
                            }
                        });
                    });
                });
            });
        </script>
		<!--end::Script Maintenance-->
		<!--begin::Script Warning-->
		<script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.warning').forEach(function (button) {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const url = this.getAttribute('href'); // Ambil URL dari atribut href

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Setelah data ini disimpan tidak bisa diedit kembali!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, simpan!',
                            cancelButtonText: 'Batal',
                            customClass: {
                                confirmButton: 'btn btn-danger', // Gaya tombol
                                cancelButton: 'btn btn-secondary'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect ke URL untuk menghapus data
                                window.location.href = url;
                            }
                        });
                    });
                });
            });
        </script>
		<!--end::Javascript-->
		
		<!--begin::Javascript-->
		<script>var hostUrl = "admin/assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="admin/assets/plugins/global/plugins.bundle.js"></script>
		<script src="admin/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
		<script src="admin/assets/plugins/custom/datatables/datatables.bundle.js"></script>
        <script src="admin/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="<?php echo e(asset('admin/assets/js/jam.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/assets/js/custom/widgets.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/assets/js/custom/widgets.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/assets/js/custom/apps/chat/chat.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/assets/js/custom/utilities/modals/upgrade-plan.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/assets/js/custom/utilities/modals/create-app.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/assets/js/custom/utilities/modals/users-search.js')); ?>"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
<?php /**PATH /var/www/html/resources/views/layout/sidebarnavbar.blade.php ENDPATH**/ ?>