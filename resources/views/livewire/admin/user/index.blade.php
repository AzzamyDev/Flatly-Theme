@section('title', 'Users')
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('node_modules/izitoast/dist/css/iziToast.min.css') }}">
@endpush
<section class="section">
    <div wire:ignore>
        <div class="modal " id="modal_user" tabindex="-1" aria-labelledby="modal_user" aria-hidden="true">
            @livewire('admin.user.modal')
        </div>
        <div class="modal " id="modal_confirmation" tabindex="-1" aria-labelledby="modal_confirmation"
            aria-hidden="true">
            @livewire('admin.user.modal-confirm')
        </div>
    </div>
    <div class="section-header row mx-1">
        <div class="col-lg col-sm-12">
            <h4 class="m-0">Users</h4>
        </div>
        <div class="col-lg-2 col-sm-12">
            <button wire:click="$emitTo('admin.user.modal', 'openModal')" type="button" name="" id=""
                class="rounded-pill btn btn-block btn-primary">Add
                User</button>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>List of Users</h4>
                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <input wire:model.defer="query" type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button wire:click='filter' type="button"
                                    class="btn btn-primary shadow-none border border-dark"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                {{-- <th>
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                            class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th> --}}
                                <th class="text-center">No</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th class="text-center">Action</th>
                            </tr>
                            {{-- Tbody --}}
                            @forelse ($listUser as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <div class="badge badge-success">Active</div>
                                    </td>
                                    <td>{{ now()->parse($item->created_at)->format('d-m-Y') }}</td>
                                    <td>{{ now()->parse($item->updated_at)->format('d-m-Y') }}</td>
                                    <td class="text-center">
                                        <button
                                            wire:click="$emitTo('admin.user.modal', 'openModal', {{ $item->id }})"
                                            class="btn btn-primary btn-sm ">
                                            <i class="fas fa-edit text-white"></i>
                                        </button>
                                        <button
                                            wire:click="$emitTo('admin.user.modal-confirm', 'openModalDelete', {{ $item }})"
                                            class="btn btn-danger btn-sm ">
                                            <i class="fas fa-trash text-white"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@push('javascript')
    <script src="{{ asset('node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>

    <script>
        window.addEventListener('toggleModal', event => {
            $('#modal_user').appendTo('body');
            $('#modal_user').modal('toggle');
        })
        window.addEventListener('toggleModalDelete', event => {
            $('#modal_confirmation').appendTo('body');
            $('#modal_confirmation').modal('toggle');
        })
        window.addEventListener('success', event => {
            $(event.detail.key).appendTo('body');
            $(event.detail.key).modal('toggle');
            Livewire.emit('getData');
            iziToast.success({
                message: event.detail.message,
                position: 'bottomCenter'
            });
        })
    </script>
@endpush
