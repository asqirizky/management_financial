<!--begin::Modal - Purchase List-->
<div class="modal fade" id="kt_modal_purchase_details" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header pb-0 border-0 justify-content-end">
				<!--begin::Close-->
				<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
					<i class="ki-duotone ki-cross fs-1">
						<span class="path1"></span>
						<span class="path2"></span>
					</i>
				</div>
				<!--end::Close-->
			</div>
			<!--begin::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
				<!--begin::Heading-->
				<div class="text-center mb-13">
					<!--begin::Title-->
					<h1 class="mb-3">Purchase List</h1>
					<!--end::Title-->
					<!--begin::Description-->
					<div class="text-muted fw-semibold fs-5">Select the items you want to check out
					<!--end::Description-->
				</div>
				<!--end::Heading-->
				<!--begin::Form-->
				<form method="POST" action="{{ route('outflow.buy') }}">
					@csrf
					<!--begin::Users-->
					<div class="mb-15">
						<!--begin::List-->
						<div class="mh-375px scroll-y me-n7 pe-7">
							@if ($purchases->count() > 0)
								@foreach ($purchases as $purchase)
								<!--begin::User-->
								<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Checkbox-->
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" name="selected[]" value="{{ $purchase->id }}">
										</div>
										<!--end::Checkbox-->
										<!--begin::Details-->
										<div class="ms-6">
											<!--begin::Name-->
											<a class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
											{{ $purchase->item }}</a>
											<!--end::Name-->
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Stats-->
									<div class="d-flex">
										<!--begin::Price-->
										<div class="text-end">
											<div class="fs-5 fw-bold text-gray-900">Rp. {{ number_format($purchase->price, 0, ',', '.') }}</div>
										</div>
										<!--end::Price-->
									</div>
									<!--end::Stats-->
								</div>
								<!--end::User-->
								@endforeach
							@else
								<div class="text-center text-muted py-10 fw-semibold">No items in purchase list.</div>
							@endif
						</div>
						<!--end::List-->
					</div>
					<!--end::Users-->
					<!--begin::Actions-->
					<div class="text-center">
						<button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary" {{ $purchases->count() == 0 ? 'disabled' : '' }}>
							<i class="ki-outline ki-purchase fs-2"></i>
							Buy
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--begin::Modal body-->
		</div>
		<!--begin::Modal content-->
	</div>
	<!--begin::Modal dialog-->
</div>
<!--end::Modal - Purchase List-->
