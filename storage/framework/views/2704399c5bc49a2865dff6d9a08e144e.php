<?php $__env->startSection('admin-konten'); ?>
    
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
                        Incoming Funds</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="pt-1 my-0 breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="admin/home" class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bg-gray-500 bullet w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Cash Inflow</li>
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
				<!--begin::Navbar-->
				<div class="card mb-6 mb-xl-9">
					<div class="card-body pt-9 pb-0">
						<!--begin::Details-->
						<div class="d-flex flex-wrap flex-sm-nowrap mb-6">
							<!--begin::Wrapper-->
							<div class="flex-grow-1">
								<!--begin::Head-->
								<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
									<!--begin::Details-->
									<div class="d-flex flex-column">
										<!--begin::Status-->
										<div class="d-flex align-items-center mb-1">
											<a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">Cash Inflow Dashboard</a>
											<span class="badge badge-light-success me-auto">In Progress</span>
										</div>
										<!--end::Status-->
									</div>
									<!--end::Details-->
									<!--begin::Actions-->
									<div class="d-flex mb-4">
										<a type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">
											<i class="ki-duotone ki-plus fs-2"></i> Tambah Saldo
										</a>
									</div>
									<!--end::Actions-->
									<?php echo $__env->make('admin.Inflow.tambah_inflow', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
									<?php echo $__env->make('admin.Inflow.edit_inflow', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								</div>
								<!--end::Head-->
								<!--begin::Info-->
								<div class="d-flex flex-wrap justify-content-start">
									<!--begin::Stats-->
									<div class="d-flex flex-wrap">
										<!--begin::Stat-->
										<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
											<!--begin::Number-->
											<div class="d-flex align-items-center">
												<i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>
												<div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="<?php echo e($inflows->sum('nominal')); ?>" data-kt-countup-prefix="Rp."><?php echo e(number_format($inflows->sum('nominal'), 0, ',', '.')); ?></div>
											</div>
											<!--end::Number-->
											<!--begin::Label-->
											<div class="fw-semibold fs-6 text-gray-500">Saldo Debit</div>
											<!--end::Label-->
										</div>
										<!--end::Stat-->
									</div>
									<!--end::Stats-->
								</div>
								<!--end::Info-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Details-->
					</div>
				</div>
				<!--end::Navbar-->
				<!--begin::Table-->
				<div class="card card-flush mt-6 mt-xl-9">
					<!--begin::Card header-->
					<div class="card-header mt-5">
						<!--begin::Card title-->
						<div class="card-title flex-column">
							<h3 class="fw-bold mb-1">Cash Inflow List</h3>
							<div class="fs-6 text-gray-500">Total pemasukan terdaftar</div>
						</div>
						<!--begin::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar my-1">
							<form method="GET" id="kt_filter_form" class="d-flex flex-wrap align-items-center">
								<!--begin::Select-->
								<div class="me-4 my-1">
									<select id="kt_filter_month" name="month" data-control="select2" data-hide-search="true" class="w-150px form-select form-select-solid form-select-sm">
										<option value="">Semua Bulan</option>
										<?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($key); ?>" <?php echo e($month == $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
								<!--end::Select-->
								<!--begin::Select-->
								<div class="me-4 my-1">
									<select id="kt_filter_year" name="year" data-control="select2" data-hide-search="true" class="w-150px form-select form-select-solid form-select-sm">
										<option value="">Semua Tahun</option>
										<?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($y); ?>" <?php echo e($year == $y ? 'selected' : ''); ?>><?php echo e($y); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
								<!--end::Select-->
								<button type="submit" class="btn btn-primary btn-sm my-1 me-2">
									<i class="ki-outline ki-magnifier fs-2"></i> Filter
								</button>
								<?php if($month || $year || $search): ?>
								<a href="<?php echo e(route('inflow.index')); ?>" class="btn btn-light btn-sm my-1">Reset</a>
								<?php endif; ?>
							</form>
						</div>
						<!--begin::Card toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<!--begin::Table container-->
						<div class="table-responsive">
							<!--begin::Table-->
							<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
								<thead class="fs-7 text-gray-500 text-uppercase">
									<tr>
										<th class="text-start ps-4 min-w-250px">Sumber Dana</th>
										<th class="text-center min-w-150px">Tanggal</th>
										<th class="text-center min-w-90px">Debit</th>
										<th class="text-center pe-4 min-w-50px">Option</th>
									</tr>
								</thead>
								<tbody class="fs-6">
									<?php $__currentLoopData = $inflows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td class="ps-4">
											<!--begin::Info-->
											<div class="d-flex flex-column justify-content-center">
												<a class="fs-6 text-gray-800 text-hover-primary"><?php echo e($item->sumber_dana); ?></a>
												<div class="fw-semibold text-gray-500"><?php echo e($item->keterangan); ?></div>
											</div>
											<!--end::Info-->
										</td>
										<td class="text-center"><?php echo e(Carbon\Carbon::parse($item->tanggal_masuk)->format('d M Y')); ?></td>
										<td class="text-center">Rp. <?php echo e(number_format($item->nominal, 0, ',', '.')); ?></td>
										<td class="text-center pe-4">
											<button type="button" class="btn btn-center btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_details" data-id="<?php echo e($item->id); ?>" data-nominal="<?php echo e($item->nominal); ?>" data-sumber_dana="<?php echo e($item->sumber_dana); ?>" data-keterangan="<?php echo e($item->keterangan); ?>" data-tanggal_masuk="<?php echo e($item->tanggal_masuk); ?>">
												<i class="ki-outline ki-pencil fs-2"></i> Edit
											</button>
											<form action="<?php echo e(route('inflow.hapus', $item->id)); ?>" method="POST" style="display: inline;">
												<?php echo csrf_field(); ?>
												<?php echo method_field('DELETE'); ?>
												<button type="submit" class="btn btn-center btn-light-danger btn-sm delete-button">
													<i class="ki-outline ki-trash fs-2"></i> Hapus
												</button>
											</form>
										</td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('kt_filter_form').addEventListener('submit', function () {
        var month = document.getElementById('kt_filter_month').value;
        var year = document.getElementById('kt_filter_year').value;
        if (!month && !year) {
            if (!confirm('Bulan dan tahun kosong, menampilkan semua data?')) {
                event.preventDefault();
            }
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.sidebarnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/Inflow/cash_inflow.blade.php ENDPATH**/ ?>