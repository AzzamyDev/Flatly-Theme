<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-primary">
        <div class="modal-header">
            <h5 class="modal-title text-white" id="modal_user">{{ $user ? 'Edit' : 'Tambah' }} User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-white" aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <input wire:model='name' class="rounded-pill form-control px-3 py-2 @error('name') is-invalid @enderror"
                    type="text" placeholder="Full Name">
                @error('name')
                    <small class="ml-3 text-danger">
                        <i class="fas fa-info-circle text-danger"></i> {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-3">
                <input wire:model='email'
                    class="rounded-pill form-control px-3 py-2 @error('email') is-invalid @enderror" type="email"
                    placeholder="Email Address">
                @error('email')
                    <small class="ml-3 text-danger">
                        <i class="fas fa-info-circle text-danger"></i> {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-3">
                <input wire:model='username'
                    class="rounded-pill form-control px-3 py-2 @error('username') is-invalid @enderror" type="text"
                    placeholder="Username">
                @error('username')
                    <small class="ml-3 text-danger">
                        <i class="fas fa-info-circle text-danger"></i> {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="input-group">
                        <input wire:model='password'
                            class="form-control px-3 py-2 @error('password') is-invalid @enderror" type="password"
                            style="font-size: 13;border-top-left-radius: 25px;border-bottom-left-radius: 25px;border-width: 0px;"
                            placeholder="Password">
                        <span class="border-success input-group-text"
                            style="border-top-right-radius: 25px;border-bottom-right-radius: 25px;background: #2aa198;border-width: 0px;"><i
                                class="text-white fas fa-eye" style="; cursor:pointer;"></i>
                        </span>
                    </div>
                    @error('password')
                        <small class="ml-3 text-danger">
                            <i class="fas fa-info-circle text-danger"></i> {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <div class="input-group">
                        <input wire:model='password_confirmation'
                            class="form-control px-3 py-2 @error('password_confirmation') is-invalid @enderror"
                            type="password"
                            style="font-size: 13;border-top-left-radius: 25px;border-bottom-left-radius: 25px;border-width: 0px;font-family: Nunito, sans-serif;"
                            placeholder="Repeat Password">
                        <span class="input-group-text"
                            style="border-top-right-radius: 25px;border-bottom-right-radius: 25px;background: #2aa198;border-width: 0px;">
                            <i class="fas fa-eye text-white" style=" cursor:pointer;"></i>
                        </span>
                    </div>
                    @error('password_confirmation')
                        <small class="ml-3 text-danger">
                            <i class="fas fa-info-circle text-danger"></i> {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button wire:click='submit' class="btn btn-success">{{ $user ? 'Simpan' : 'Submit' }}</button>
        </div>
    </div>
</div>
