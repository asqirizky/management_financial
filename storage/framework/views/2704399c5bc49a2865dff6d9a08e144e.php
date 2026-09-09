
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
                            <a href="admin/home" class="text-muted text-hover-primary">Dashboard</a>
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
											<i class="ki-duotone ki-plus fs-2"></i> Add Saldo
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
							<div class="fs-6 text-gray-500">Total registered income</div>
						</div>
						<!--begin::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar my-1">
							<form method="GET" class="d-flex align-items-center gap-3">
                                <div>
                                    <select name="bulan" id="bulan" class="form-select" data-control="select2" data-hide-search="true">
                                        <?php $__currentLoopData = range(1, 12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($b); ?>" <?php echo e(request('bulan', now()->month) == $b ? 'selected' : ''); ?>>
                                                <?php echo e(\Carbon\Carbon::create()->month($b)->translatedFormat('F')); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div>
                                    <select name="tahun" id="tahun" class="form-select" data-control="select2" data-hide-search="true">
                                        <?php $__currentLoopData = range(now()->year - 5, now()->year + 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($t); ?>" <?php echo e(request('tahun', now()->year) == $t ? 'selected' : ''); ?>>
                                                <?php echo e($t); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-danger">
                                    <i class="ki-outline ki-filter fs-5"></i> Filter
                                </button>
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
								<thead class="fs-7 text-gray-100 bg-success text-uppercase">
									<tr>
										<th class="rounded-start text-start ps-4 min-w-250px">Source Of Found</th>
										<th class="text-center min-w-150px">Date</th>
										<th class="text-center min-w-90px">Debit</th>
										<th class="rounded-end text-center pe-4 min-w-50px">Option</th>
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
											<a type="button" class="btn btn-center btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_details" data-id="<?php echo e($item->id); ?>" data-nominal="<?php echo e($item->nominal); ?>" data-sumber_dana="<?php echo e($item->sumber_dana); ?>" data-keterangan="<?php echo e($item->keterangan); ?>" data-tanggal_masuk="<?php echo e($item->tanggal_masuk); ?>">
												<i class="ki-outline ki-pencil fs-2"></i> Edit
											</a>
											<a href="<?php echo e(route('inflow.hapus', $item->id)); ?>" type="submit" class="btn btn-center btn-light-danger btn-sm delete-button">
												<i class="ki-outline ki-trash fs-2"></i> Delete
											</a>
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

		<?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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