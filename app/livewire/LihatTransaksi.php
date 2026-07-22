<?php

namespace App\Livewire;

use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class LihatTransaksi extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    #[On('lihat-transaksi')] 
    public function render()
    {
        $data['transaksi'] = Transaksi::paginate(3);
        return view('components.lihat-transaksi', $data);
    }

    public function proses($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'status' => 'PROSES'
        ]);
        session()->flash('success', 'Berhasil proses data');
    }

    public function selesai($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'status' => 'SELESAI'
        ]);
        session()->flash('success', 'Berhasil proses data');
    }

}