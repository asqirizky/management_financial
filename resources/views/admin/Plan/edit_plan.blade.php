<!--begin::Modal - Edit user details-->
<div class="modal fade" id="kt_modal_edit_details{{ $item->id }}" tabindex="-1" aria-hidden="true">
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
        <!--begin::Modal body-->
        <div class="pt-0 modal-body scroll-y px-15 px-lg-15 pb-15">
            <!--begin:Form-->
            <form id="kt_modal_edit_form" class="form" method="POST" enctype="multipart/form-data" action="">
                @csrf
                @method('PUT')
                <!--begin::Heading-->
                <div class="text-center mb-13">
                    <!--begin::Title-->
                    <h1 class="mb-3">Edit Cash Outflow</h1>
                    <div class="text-muted fw-semibold fs-5">Management Financial</div>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row">
                    <label class="mb-2 required fw-semibold fs-6">Item/Nama Barang</label>
                        <input type="text" class="form-control form-control-lg" name="item" placeholder="Item" value="{{ $item->item }}" required>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row">
                    <label class="mb-2 required fw-semibold fs-6">Price</label>
                        <input type="number" class="form-control form-control-lg" name="quantity" placeholder="Price" value="{{ $item->price ? number_format($item->price, 0, ',', '.') : '-' }}" required>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Category</label>
                    <!--end::Label-->
                    <!--begin::Input-->
					<select name="category" class="form-select" data-control="select2" data-hide-search="true" required>
                        @foreach ($plans as $item)
                            <option value="Primary" {{ $item->status ==  'Primary' ? 'selected' : ''}}>Primary</option>                            
                            <option value="Secondary" {{ $item->status ==  'Secondary' ? 'selected' : ''}}>Secondary</option>                            
                            <option value="Tertiery" {{ $item->status ==  'Tertiery' ? 'selected' : ''}}>Tertiery</option>                            
                        @endforeach
                    </select>
					<!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row">
                    <!--begin::Label-->
                    <label class="mb-2 required fw-semibold fs-6">Status</label>
                    <!--end::Label-->
                    <!--begin::Input-->
					<select name="category" class="form-select" data-control="select2" data-hide-search="true" required>
                        @foreach ($plans as $item)
                            <option value="Plan" {{ $item->status ==  'Plan' ? 'selected' : ''}}>Plan</option>                            
                            <option value="Purchase" {{ $item->status ==  'Purchase' ? 'selected' : ''}}>Purchase</option>                            
                            <option value="Already" {{ $item->status ==  'Already' ? 'selected' : ''}}>Already</option>                            
                        @endforeach
                    </select>
					<!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
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
        </div>
    </div>
</div>
<!--end::Modal - Edit user details-->

<script>
document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('kt_modal_edit_details');
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var nominal = button.getAttribute('data-nominal');
        var sumberDana = button.getAttribute('data-sumber_dana');
        var keterangan = button.getAttribute('data-keterangan');
        var tanggalMasuk = button.getAttribute('data-tanggal_masuk');

        document.getElementById('edit_nominal').value = nominal;
        document.getElementById('edit_sumber_dana').value = sumberDana;
        document.getElementById('edit_keterangan').value = keterangan;
        document.getElementById('edit_tanggal_masuk').value = tanggalMasuk;

        document.getElementById('kt_modal_edit_form').action = "{{ url('admin/inflow') }}/" + id;
    });
});
</script>
