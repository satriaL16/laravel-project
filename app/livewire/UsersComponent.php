<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UsersComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $addPage = false;
    public $editPage = false;
    public $nama, $email, $password, $role, $id;

    public function render()
    {
        $data['user'] = User::paginate(5);
        return view('components.users-component', $data);
    }

    public function create()
    {
        $this->addPage = true;
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email salah',
            'password.required' => 'Password tidak boleh kosong',
            'role.required' => 'Wajib pilih role'
        ]);

        User::create([
            'name' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role
        ]);

        session()->flash('success', 'Berhasil Menambahkan data!');
        $this->reset();
    }

    public function destroy($id)
    {
        $cari = User::find($id);
        $cari->delete();
        session()->flash('success', 'Data berhasil dihapus');
        $this->reset();
    }

    public function edit($id)
    {
        $this->reset();
        $cari = User::find($id);
        $this->nama = $cari->name;
        $this->email = $cari->email;
        $this->role = $cari->role;
        $this->id = $cari->id;
        $this->editPage = true;
    }

    public function update()
    {
        $cari = User::find($this->id);
        if ($this->password == '') {
            $cari->update([
                'name' => $this->nama,
                'email' => $this->email,
                'role' => $this->role
            ]);
        } else {
            $cari->update([
                'name' => $this->nama,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => $this->role
            ]);
        }
        session()->flash('success', 'Data berhasil diubah');
        $this->reset();
    }
}
