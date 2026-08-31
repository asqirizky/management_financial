<?php $__env->startSection('admin-konten'); ?>

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Beranda</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Management Financial</li>
                    </ul>
                </div>
                <?php echo $__env->make('layout.preview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
				<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
					<!--begin::Col-->
					<div class="col-xxl-12 mb-xxl-10">
						<!--begin::List widget 7-->
						<div class="card card-flush h-md-100">
							<!--begin::Header-->
							<div class="card-header py-7">
								<!--begin::Statistics-->
								<div class="m-0">
									<!--begin::Heading-->
									<div class="d-flex align-items-center mb-2">
									<span class="fs-4 fw-semibold text-gray-500 align-self-start me-1">Rp.</span>
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1"><?php echo e(number_format($sisaSaldo, 0, ',', '.')); ?></span>
                                        <span class="badge badge-light-success fs-base">
                                            Sisa Saldo
                                        </span>
                                    </div>
									<!--end::Heading-->
									<!--begin::Description-->
									<span class="fs-6 fw-semibold text-gray-500">5 Pembelian terakhir</span>
									<!--end::Description-->
								</div>
								<!--end::Statistics-->
								<!--begin::Toolbar-->
								<div class="card-toolbar">
									<!--begin::Menu-->
									<button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
										<i class="ki-duotone ki-dots-square fs-1 text-gray-500 me-n1">
											<span class="path1"></span>
											<span class="path2"></span>
											<span class="path3"></span>
											<span class="path4"></span>
										</i>
									</button>
									<!--begin::Menu 2-->
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="separator mb-3 opacity-75"></div>
										<!--end::Menu separator-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3">New Ticket</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3">New Customer</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
											<!--begin::Menu item-->
											<a href="#" class="menu-link px-3">
												<span class="menu-title">New Group</span>
												<span class="menu-arrow"></span>
											</a>
											<!--end::Menu item-->
											<!--begin::Menu sub-->
											<div class="menu-sub menu-sub-dropdown w-175px py-4">
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<a href="#" class="menu-link px-3">Admin Group</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<a href="#" class="menu-link px-3">Staff Group</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<a href="#" class="menu-link px-3">Member Group</a>
												</div>
												<!--end::Menu item-->
											</div>
											<!--end::Menu sub-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3">New Contact</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="separator mt-3 opacity-75"></div>
										<!--end::Menu separator-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<div class="menu-content px-3 py-3">
												<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
											</div>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu 2-->
									<!--end::Menu-->
								</div>
								<!--end::Toolbar-->
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body pt-0">
								<!--begin::Items-->
								<div class="mb-0">
									<?php $__empty_1 = true; $__currentLoopData = $lastPurchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<!--begin::Item-->
									<div class="d-flex flex-stack">
										<!--begin::Section-->
										<div class="d-flex align-items-center me-5">
											<!--begin::Symbol-->
											<div class="symbol symbol-30px me-5">
												<span class="symbol-label">
													<i class="ki-duotone ki-basket fs-3 text-gray-600">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
													</i>
												</span>
											</div>
											<!--end::Symbol-->
											<!--begin::Content-->
											<div class="me-5">
												<!--begin::Title-->
												<a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6"><?php echo e($purchase->item_jenis_barang); ?></a>
												<!--end::Title-->
												<!--begin::Desc-->
												<span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0"><?php echo e($purchase->quantity); ?> x Rp. <?php echo e(number_format($purchase->harga_satuan, 0, ',', '.')); ?> &middot; <?php echo e(Carbon\Carbon::parse($purchase->tanggal_pembelian)->format('d M Y')); ?></span>
												<!--end::Desc-->
											</div>
											<!--end::Content-->
										</div>
										<!--end::Section-->
										<!--begin::Wrapper-->
										<div class="d-flex align-items-center">
											<!--begin::Number-->
											<span class="text-gray-800 fw-bold fs-6 me-3">Rp. <?php echo e(number_format($purchase->quantity * $purchase->harga_satuan, 0, ',', '.')); ?></span>
											<!--end::Number-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Item-->
									<?php if(!$loop->last): ?>
									<!--begin::Separator-->
									<div class="separator separator-dashed my-3"></div>
									<!--end::Separator-->
									<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<div class="d-flex flex-stack">
										<span class="text-gray-500 fw-semibold fs-7">Belum ada pembelian</span>
									</div>
									<?php endif; ?>
								</div>
								<!--end::Items-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::List widget 7-->
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
                <!--begin::Col-->
				<div class="col-xxl-8">
					<!--begin::Security summary-->
					<div class="card card-xxl-stretch mb-5 mb-xl-10">
						<!--begin::Header-->
						<div class="card-header card-header-stretch">
							<!--begin::Title-->
							<div class="card-title">
								<h3 class="m-0 text-gray-900">Security Summary</h3>
							</div>
							<!--end::Title-->
							<!--begin::Toolbar-->
							<div class="card-toolbar">
								<ul class="nav nav-tabs nav-line-tabs nav-stretch border-transparent fs-5 fw-bold" id="kt_security_summary_tabs">
									<li class="nav-item">
										<a class="nav-link text-active-primary active" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_security_summary_tab_pane_hours">12 Hours</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-active-primary" data-kt-countup-tabs="true" data-bs-toggle="tab" id="kt_security_summary_tab_day" href="#kt_security_summary_tab_pane_day">Day</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-active-primary" data-kt-countup-tabs="true" data-bs-toggle="tab" id="kt_security_summary_tab_week" href="#kt_security_summary_tab_pane_week">Week</a>
									</li>
								</ul>
							</div>
							<!--end::Toolbar-->
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-7 pb-0 px-0">
							<!--begin::Tab content-->
							<div class="tab-content">
								<!--begin::Tab panel-->
								<div class="tab-pane fade active show" id="kt_security_summary_tab_pane_hours" role="tabpanel">
									<!--begin::Row-->
									<div class="row p-0 mb-5 px-9">
										<!--begin::Col-->
										<div class="col">
											<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
												<span class="fs-4 fw-semibold text-success d-block">User Sign-in</span>
												<span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="36899">0</span>
											</div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col">
											<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
												<span class="fs-4 fw-semibold text-primary d-block">Admin Sign-in</span>
												<span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="72">0</span>
											</div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col">
											<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
												<span class="fs-4 fw-semibold text-danger d-block">Failed Attempts</span>
												<span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="291">0</span>
											</div>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--begin::Container-->
									<div class="pt-2">
										<!--begin::Tabs-->
										<div class="d-flex align-items-center pb-6 px-9">
											<!--begin::Title-->
											<h3 class="m-0 text-gray-900 flex-grow-1">Activity Chart</h3>
											<!--end::Title-->
											<!--begin::Nav pills-->
											<ul class="nav nav-pills nav-line-pills border rounded p-1">
												<li class="nav-item me-2">
													<a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" id="kt_security_summary_tab_hours_agents" href="#kt_security_summary_tab_pane_hours_agents">Agents</a>
												</li>
												<li class="nav-item">
													<a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_security_summary_tab_hours_clients" href="#kt_security_summary_tab_pane_hours_clients">Clients</a>
												</li>
											</ul>
											<!--end::Nav pills-->
										</div>
										<!--end::Tabs-->
										<!--begin::Tab content-->
										<div class="tab-content px-3">
											<!--begin::Tab pane-->
											<div class="tab-pane fade active show" id="kt_security_summary_tab_pane_hours_agents" role="tabpanel">
												<!--begin::Chart-->
												<div id="kt_security_summary_chart_hours_agents" style="height: 300px"></div>
												<!--end::Chart-->
											</div>
											<!--end::Tab pane-->
											<!--begin::Tab pane-->
											<div class="tab-pane fade" id="kt_security_summary_tab_pane_hours_clients" role="tabpanel">
												<!--begin::Chart-->
												<div id="kt_security_summary_chart_hours_clients" style="height: 300px"></div>
												<!--end::Chart-->
											</div>
											<!--end::Tab pane-->
										</div>
										<!--end::Tab content-->
									</div>
									<!--end::Container-->
								</div>
								<!--end::Tab panel-->
								<!--begin::Tab panel-->
								<div class="tab-pane fade" id="kt_security_summary_tab_pane_day" role="tabpanel">
									<!--begin::Row-->
									<div class="row p-0 mb-5 px-9">
										<!--begin::Col-->
										<div class="col">
											<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
												<span class="fs-4 fw-semibold text-success d-block">User Sign-in</span>
												<span class="fs-2hx fw-bold text-gray-800" data-kt-countup="true" data-kt-countup-value="30467">0</span>
											</div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col">
											<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
												<span class="fs-4 fw-semibold text-primary d-block">Admin Sign-in</span>
												<span class="fs-2hx fw-bold text-gray-800" data-kt-countup="true" data-kt-countup-value="120">0</span>
											</div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col">
											<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
												<span class="fs-4 fw-semibold text-danger d-block">Failed Attempts</span>
												<span class="fs-2hx fw-bold text-gray-800" data-kt-countup="true" data-kt-countup-value="23">0</span>
											</div>
										</div>
									</div>
									<!--end::Row-->
									<!--begin::Container-->
									<div class="pt-2">
										<!--begin::Tabs-->
										<div class="d-flex align-items-center pb-9 px-9">
											<h3 class="m-0 text-gray-800 flex-grow-1">Activity Chart</h3>
											<!--begin::Nav pills-->
											<ul class="nav nav-pills nav-line-pills border rounded p-1">
												<li class="nav-item me-2">
													<a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" id="kt_security_summary_tab_day_agents" href="#kt_security_summary_tab_pane_day_agents">Agents</a>
												</li>
												<li class="nav-item">
													<a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_security_summary_tab_day_clients" href="#kt_security_summary_tab_pane_day_clients">Clients</a>
												</li>
											</ul>
											<!--end::Nav pills-->
										</div>
										<!--end::Tabs-->
										<!--begin::Tab content-->
										<div class="tab-content">
											<div class="tab-pane fade active show" id="kt_security_summary_tab_pane_day_agents" role="tabpanel">
												<!--begin::Chart-->
												<div id="kt_security_summary_chart_day_agents" style="height: 300px"></div>
												<!--end::Chart-->
											</div>
											<div class="tab-pane fade" id="kt_security_summary_tab_pane_day_clients" role="tabpanel">
												<!--begin::Chart-->
												<div id="kt_security_summary_chart_day_clients" style="height: 300px"></div>
												<!--end::Chart-->
											</div>
										</div>
										<!--end::Tab content-->
									</div>
									<!--end::Container-->
								</div>
								<!--end::Tab panel-->
								<!--begin::Tab panel-->
								<div class="tab-pane fade" id="kt_security_summary_tab_pane_week" role="tabpanel">
									<!--begin::Row-->
									<div class="row p-0 mb-5 px-9">
										<!--begin::Col-->
										<div class="col">
											<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
												<span class="fs-lg-4 fs-6 fw-semibold text-success d-block">User Sign-in</span>
												<span class="fs-lg-2hx fs-2 fw-bold text-gray-800" data-kt-countup="true" data-kt-countup-value="340">0</span>
											</div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col">
											<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
												<span class="fs-lg-4 fs-6 fw-semibold text-primary d-block">Admin Sign-in</span>
												<span class="fs-lg-2hx fs-2 fw-bold text-gray-800" data-kt-countup="true" data-kt-countup-value="90">0</span>
											</div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col">
											<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
												<span class="fs-lg-4 fs-6 fw-semibold text-danger d-block">Failed Attempts</span>
												<span class="fs-lg-2hx fs-2 fw-bold text-gray-800" data-kt-countup="true" data-kt-countup-value="230">0</span>
											</div>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--begin::Container-->
									<div class="pt-2">
										<!--begin::Tabs-->
										<div class="d-flex align-items-center pb-9 px-9">
											<h3 class="m-0 text-gray-800 flex-grow-1">Activity Chart</h3>
											<!--begin::Nav pills-->
											<ul class="nav nav-pills nav-line-pills border rounded p-1">
												<li class="nav-item me-2">
													<a class="nav-link btn btn-active-light py-2 px-5 fs-6 btn-active-color-gray-700 btn-color-gray-500 fw-semibold active" data-bs-toggle="tab" id="kt_security_summary_tab_week_agents" href="#kt_security_summary_tab_pane_week_agents">Agents</a>
												</li>
												<li class="nav-item">
													<a class="nav-link btn btn-active-light py-2 px-5 btn-active-color-gray-700 btn-color-gray-500 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_security_summary_tab_week_clients" href="#kt_security_summary_tab_pane_week_clients">Clients</a>
												</li>
											</ul>
											<!--end::Nav pills-->
										</div>
										<!--end::Tabs-->
										<!--begin::Tab content-->
										<div class="tab-content">
											<div class="tab-pane fade active show" id="kt_security_summary_tab_pane_week_agents" role="tabpanel">
												<!--begin::Chart-->
												<div id="kt_security_summary_chart_week_agents" style="height: 300px"></div>
												<!--end::Chart-->
											</div>
											<div class="tab-pane fade" id="kt_security_summary_tab_pane_week_clients" role="tabpanel">
												<!--begin::Chart-->
												<div id="kt_security_summary_chart_week_clients" style="height: 300px"></div>
												<!--end::Chart-->
											</div>
										</div>
										<!--end::Tab content-->
									</div>
									<!--end::Container-->
								</div>
								<!--end::Tab panel-->
							</div>
							<!--end::Tab content-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Security summary-->
				</div>
				<!--end::Col-->
                
            </div>
    	</div>

    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
</div>

<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="assets/js/custom/pages/user-profile/general.js"></script>
<script src="assets/js/custom/account/settings/signin-methods.js"></script>
<script src="assets/js/custom/account/security/security-summary.js"></script>
<script src="assets/js/custom/account/security/license-usage.js"></script>
<script src="assets/js/custom/account/settings/deactivate-account.js"></script>
<script src="assets/js/widgets.bundle.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="assets/js/custom/utilities/modals/create-app.js"></script>
<script src="assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
<script src="assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
<script src="assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
<script src="assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
<script src="assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
<script src="assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.sidebarnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/home.blade.php ENDPATH**/ ?>