
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
						<?php echo $__env->make('admin.Plan.add_plan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
									<?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td class="ps-4">
											<!--begin::Info-->
											<div class="d-flex flex-column justify-content-center">
												<a class="fs-6 text-gray-800 text-hover-primary"><?php echo e($item->item); ?></a>
											</div>
											<!--end::Info-->
										</td>
										<td class="text-center">Rp. <?php echo e(number_format($item->price, 0, ',', '.')); ?></td>
										<td class="text-center"><?php echo e($item->category); ?></td>
										<td class="text-center">
											<?php if($item->status == 'purchase'): ?>
												<span class="badge badge-light-primary"><?php echo e($item->status); ?></span>
											<?php elseif($item->status == 'already'): ?>
												<span class="badge badge-light-success"><?php echo e($item->status); ?></span>
											<?php else: ?>
												<span class="badge badge-light-warning"><?php echo e($item->status); ?></span>
											<?php endif; ?>
										</td>
										<td class="text-center pe-4">
											<a type="button" class="btn btn-light-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_details<?php echo e($item->id); ?>">
												<i class="ki-outline ki-pencil fs-2"></i>
											</a>
											<a href="<?php echo e(route('plan.hapus', $item->id)); ?>" type="submit" class="btn btn-light-danger btn-sm delete-button">
												<i class="ki-outline ki-trash fs-2"></i>
											</a>
										</td>
										<?php echo $__env->make('admin.Plan.edit_plan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<tr>
										<td colspan="5" class="text-center text-muted py-5">No plan data available.</td>
									</tr>
									<?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.sidebarnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/Plan/plan_spending.blade.php ENDPATH**/ ?>