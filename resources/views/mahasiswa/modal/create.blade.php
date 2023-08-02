<!-- Add Mahasiswa -->
<div id="add-mhs" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/mahasiswa" method="post">
            @csrf
                <div class="modal-header">						
                    <h4 class="modal-title">Add Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" id="nim" class="form-control @error('nim') is-invalid @enderror" 
                            name="nim" value="{{ old('nim') }}">
                    </div>
                    @error('nim')
                        <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" 
                            name="nama" value="{{ old('nama') }}">
                    </div>
                    @error('nama')
                        <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                            name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    </div>
                    @error('tanggal_lahir')
                        <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    @error('jeniskelamin')
                        <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <select name="kota_id" id="kota_id" class="form-control">
                            <option value="">Pilih Kota</option>
                            @foreach ($kotas as $item )
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('kota_id')
                        <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
                    @enderror

                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>