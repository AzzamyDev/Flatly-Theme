<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class ModalConfirm extends Component
{
    protected $listeners = ['openModalDelete'];
    public $user;

    public function render()
    {
        return view('livewire.admin.user.modal-confirm');
    }

    public function openModalDelete(User $user)
    {
        $this->user = $user;
        $this->dispatchBrowserEvent('toggleModalDelete');
    }

    public function destroy()
    {
        $this->user->delete();
        $this->dispatchBrowserEvent('success', ['message' => 'Berhasil dihapus', 'key' => '#modal_confirmation']);
    }
}
