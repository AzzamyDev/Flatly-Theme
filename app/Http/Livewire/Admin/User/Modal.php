<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class Modal extends Component
{
    protected $listeners = ['openModal'];
    // protected $rules = [
    //     'name' => ['required', 'string', 'max:255'],
    //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users, '],
    //     'username' => ['required', 'string', 'max:255', 'unique:users'],
    //     'password' => ['required', 'string', 'min:8'],
    //     'password_confirmation' => ['same:password', 'string',],
    // ];
    public $user;
    public $name, $email, $username, $password, $password_confirmation;

    protected function rules()
    {
        return
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user ? $this->user->id : null, 'id')],
                'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->user ? $this->user->id : null, 'id')],
                'password' => [Rule::requiredIf($this->user == null)],
                'password_confirmation' => [Rule::requiredIf($this->password != null), 'same:password'],
            ];
    }

    public function render()
    {
        return view('livewire.admin.user.modal');
    }

    public function openModal($id = null)
    {
        $this->reset();
        $this->resetErrorBag();
        $this->user = User::find($id);
        if ($this->user) {
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            $this->username = $this->user->username;
        }
        $this->dispatchBrowserEvent('toggleModal');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validated = $this->validate();
        if ($this->user) {
            $this->user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'username' => $validated['username'],
            ]);
            if (strlen($this->password) >= 8) {
                if (!Hash::check($this->password, $this->user->password)) {
                    $this->user->update([
                        'password' => Hash::make($this->password)
                    ]);
                }
            } else {
                $this->addError('password', 'Panjang karakter password minimal 8.');
            }
            return $this->dispatchBrowserEvent('success', ['message' => 'Berhasil mengedit user', 'key' => '#modal_user']);
        }
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => bcrypt($validated['password']),
        ]);
        $user->assignRole('user');
        $this->dispatchBrowserEvent('success', ['message' => 'Berhasil menambahkan user', 'key' => '#modal_user']);
    }
}
