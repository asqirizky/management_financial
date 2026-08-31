<!--begin::Modal - Update user details-->
<div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
        <div class="pb-0 border-0 modal-header justify-content-end">
            <!--begin::Close-->
            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                <i class="ki-outline ki-cross fs-1">
                </i>
            </div>
            <!--end::Close-->
        </div>
        <!--begin::Modal header-->
        <!--begin::Modal body-->
        <div class="pt-0 modal-body scroll-y px-15 px-lg-15 pb-15">
            <!--begin:Form-->
            <form id="kt_modal_update_details" class="form" method="POST" enctype="multipart/form-data" action="{{ route('inflow.store') }}">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-13">
                    <!--begin::Title-->
                    <h1 class="mb-3">Cash Inflow</h1>
                    <div class="text-muted fw-semibold fs-5">Management Financial</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Nominal</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                        <input type="number" class="form-control form-control-lg" name="nominal" id="nominal" placeholder="Nominal" required>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Sumber Dana</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                        <input type="text" class="form-control form-control-lg" name="sumber_dana" placeholder="Sumber Dana" required>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Keterangan</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                        <input type="text" class="form-control form-control-lg" name="keterangan" placeholder="Keterangan" required>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Tanggal Masuk</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                        <input type="date" class="form-control form-control-lg" name="tanggal_masuk" placeholder="Tanggal Masuk" required>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                    {{--  <button class="btn btn-primary" >  --}}
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Please wait...
                        <span class="align-middle spinner-border spinner-border-sm ms-2"></span></span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end:Form-->
        </div>
        <!--end::Modal body-->

            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - Update user details-->

<script src="admin/assets/plugins/global/plugins.bundle.js"></script>
<script src="admin/assets/js/custom/utilities/modals/bidding.js"></script>

{{-- @include('sweetalert::alert') --}}
