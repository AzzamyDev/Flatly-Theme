<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-dark" id="modal_confirmation">Hapus User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-dark">
            Apakah anda yakin untuk menghapus ?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button wire:click='destroy' type="button" class="btn btn-primary px-4">Ya</button>
        </div>
    </div>
</div>
