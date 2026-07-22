<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Mobil</h6>
                <form>
                    <div class="mb-3">
                        <label for="nopolisi" class="form-label">No Polisi</label>
                        <input type="text" wire:model="nopolisi" class="form-control" id="nopolisi"
                            value="{{ @old('nopolisi') }}">
                        @error('nopolisi')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="merk" class="form-label">Merk</label>
                        <input type="text" wire:model="merk" class="form-control" id="merk"
                            value="{{ @old('merk') }}">
                        @error('merk')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Mobil</label>
                        <select name="jenis" class="form-select" wire:model="jenis">
                            <option value="">--Pilih--</option>
                            <option value="sedan">sedan</option>
                            <option value="MPV">MPV</option>
                            <option value="SUV">SUV</option>
                        </select>
                        @error('password')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" wire:model="harga" class="form-control" id="harga"
                            value="{{ @old('harga') }}">
                        @error('harga')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" wire:model="foto" class="form-control" id="foto"
                            value="{{ @old('foto') }}">
                        @error('foto')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="button" wire:click="update()" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
