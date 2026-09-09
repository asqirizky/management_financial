@extends('layout.sidebarnavbar')
@section('admin-konten')
    
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="py-3 app-toolbar py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="flex-wrap page-title d-flex flex-column justify-content-center me-3">
                    <!--begin::Title-->
                    <h1 class="my-0 text-gray-900 page-heading d-flex fw-bold fs-3 flex-column justify-content-center">
                        Plan Spanding</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="pt-1 my-0 breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="admin/home" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bg-gray-500 bullet w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Plan Spanding</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

		<!--begin::Content-->
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<!--begin::Content container-->
			<div id="kt_app_content_container" class="app-container container-xxl">
				<!--begin::Table-->
				<div class="card card-flush mt-6 mt-xl-9">
					<!--begin::Card header-->
					<div class="card-header mt-5">
						<!--begin::Card title-->
						<div class="card-title flex-column">
							<h3 class="fw-bold mb-1">Planning List</h3>
						</div>
						<!--end::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_planning">
								<i class="ki-outline ki-plus fs-2"></i>
								Add Planning
							</button>
						</div>
						<!--end::Card toolbar-->
						@include('admin.Plan.add_plan')
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<!--begin::Table container-->
						<div class="table-responsive">
							<!--begin::Table-->
							<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
								<thead class="fs-7 text-gray-100 text-uppercase bg-success">
									<tr>
										<th class="rounded-start text-start ps-4 min-w-150px">Item</th>
										<th class="text-center min-w-150px">Price</th>
										<th class="text-center min-w-150px">Category</th>
										<th class="text-center min-w-150px">Status</th>
										<th class="rounded-end text-center pe-4 min-w-50px">Option</th>
									</tr>
								</thead>
								<tbody class="fs-6">
									@forelse ($plans as $item)
									<tr>
										<td class="ps-4">
											<!--begin::Info-->
											<div class="d-flex flex-column justify-content-center">
												<a class="fs-6 text-gray-800 text-hover-primary">{{ $item->item }}</a>
											</div>
											<!--end::Info-->
										</td>
										<td class="text-center">Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
										<td class="text-center">{{ $item->category }}</td>
										<td class="text-center">
											@if ($item->status == 'purchase')
												<span class="badge badge-light-primary">{{ $item->status }}</span>
											@elseif ($item->status == 'already')
												<span class="badge badge-light-success">{{ $item->status }}</span>
											@else
												<span class="badge badge-light-warning">{{ $item->status }}</span>
											@endif
										</td>
										<td class="text-center pe-4">
											<a type="button" class="btn btn-light-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_details{{ $item->id }}">
												<i class="ki-outline ki-pencil fs-2"></i>
											</a>
											<a href="{{ route('plan.hapus', $item->id) }}" type="submit" class="btn btn-light-danger btn-sm delete-button">
												<i class="ki-outline ki-trash fs-2"></i>
											</a>
										</td>
										@include('admin.Plan.edit_plan')
									</tr>
									@empty
									<tr>
										<td colspan="5" class="text-center text-muted py-5">No plan data available.</td>
									</tr>
									@endforelse
								</tbody>
							</table>
							<!--end::Table-->
						</div>
						<!--end::Table container-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Content container-->
		</div>
		<!--end::Content-->
	</div>
</div>
@endsection