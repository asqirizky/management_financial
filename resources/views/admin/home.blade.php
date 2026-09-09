@extends('layout.sidebarnavbar')
@section('admin-konten')

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
                @include('layout.preview')
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
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">{{ number_format($sisaSaldo, 0, ',', '.') }}</span>
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
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body pt-0">
								<!--begin::Items-->
								<div class="mb-0">
									@forelse ($lastPurchases as $purchase)
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
												<a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $purchase->item_jenis_barang }}</a>
												<!--end::Title-->
												<!--begin::Desc-->
												<span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">{{ $purchase->quantity }} x Rp. {{ number_format($purchase->harga_satuan, 0, ',', '.') }} &middot; {{ Carbon\Carbon::parse($purchase->tanggal_pembelian)->format('d M Y') }}</span>
												<!--end::Desc-->
											</div>
											<!--end::Content-->
										</div>
										<!--end::Section-->
										<!--begin::Wrapper-->
										<div class="d-flex align-items-center">
											<!--begin::Number-->
											<span class="text-gray-800 fw-bold fs-6 me-3">Rp. {{ number_format($purchase->quantity * $purchase->harga_satuan, 0, ',', '.') }}</span>
											<!--end::Number-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Item-->
									@if (!$loop->last)
									<!--begin::Separator-->
									<div class="separator separator-dashed my-3"></div>
									<!--end::Separator-->
									@endif
									@empty
									<div class="d-flex flex-stack">
										<span class="text-gray-500 fw-semibold fs-7">Belum ada pembelian</span>
									</div>
									@endforelse
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
								<h3 class="m-0 text-gray-900">Pemasukan dan Pengeluaran</h3>
							</div>
							<!--end::Title-->
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
												<span class="fs-4 fw-semibold text-success d-block">Saldo</span>
												<span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="{{ $sisaSaldo }}">0</span>
											</div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col">
											<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
												<span class="fs-4 fw-semibold text-primary d-block">Pemasukan</span>
												<span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="{{ $totalInflow }}">0</span>
											</div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col">
											<div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
												<span class="fs-4 fw-semibold text-danger d-block">Pengeluaran</span>
												<span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="{{ $totalOutflow }}">0</span>
											</div>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
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

    @include('layout.footer')
	</div>
</div>

<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="admin/assets/plugins/global/plugins.bundle.js"></script>
<script src="admin/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="assets/js/widgets.bundle.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->

@endsection
