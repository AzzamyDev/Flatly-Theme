<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $listUser = [];
    protected $listeners  = ['getData'];
    public $query;

    public function render()
    {
        return view('livewire.admin.user.index');
    }

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->listUser = User::role('user')->get();
    }

    public function filter()
    {
        if ($this->query) {
            return $this->listUser = User::where('name', 'like', '%' . $this->query . '%')->orWhere('username', 'like', '%' . $this->query . '%')->role('user')->get();
        }
        return $this->listUser = User::role('user')->get();
    }
}
