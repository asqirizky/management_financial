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
            <form id="kt_modal_edit_form" class="form" method="POST" enctype="multipart/form-data" action="{{ route('outflow.update', $item->id) }}">
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
                        <input type="text" class="form-control form-control-lg" name="item_jenis_barang" placeholder="Item/Nama Barang" value="{{ $item->item_jenis_barang }}" required>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row">
                    <label class="mb-2 required fw-semibold fs-6">Quantity</label>
                        <input type="number" class="form-control form-control-lg" name="quantity" placeholder="Quantity" value="{{ $item->quantity }}" required>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row">
                    <label class="mb-2 required fw-semibold fs-6">Harga Satuan</label>
                        <input type="text" class="form-control form-control-lg" name="harga_satuan" value="{{ number_format($item->harga_satuan, 0, ',', '.') }}" placeholder="Harga Satuan" required>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-8 fv-row">
                    <label class="mb-2 required fw-semibold fs-6">Tanggal Pembelian</label>
                        <input type="date" class="form-control form-control-lg" name="tanggal_pembelian" value="{{ $item->tanggal_pembelian }}" placeholder="Tanggal Pembelian" required>
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
