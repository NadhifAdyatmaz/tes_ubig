@foreach ($mahasiswas as $item)
<!-- Edit Modal HTML -->
<div id="edit-mhs{{ $item->id }}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="/mahasiswa/{{ $item->id }}" method="post">
                                                @csrf
                                                @method('put')
                                                    <div class="modal-header">						
                                                        <h4 class="modal-title">Edit Mahasiswa</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" 
                                                                name="nama" value="{{ old('nama', $item->nama) }}">
                                                        </div>
                                                        @error('nama')
                                                            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
                                                        @enderror

                                                        <div class="form-group">
                                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                                            <input type="date" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                                                name="tanggal_lahir" value="{{ old('tanggal_lahir', $item->tanggal_lahir) }}">
                                                        </div>
                                                        @error('tanggal_lahir')
                                                            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
                                                        @enderror

                                                        <div class="form-group">
                                                            <label for="jeniskelamin">Jenis Kelamin</label>
                                                            <select name="jeniskelamin" id="jeniskelamin" class="form-control @error('jeniskelamin') is-invalid @enderror">
                                                                @if($item->jeniskelamin == 'Laki-laki')
                                                                <option value="Laki-Laki">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                                @elseif ($item->jeniskelamin == 'Perempuan')
                                                                <option value="Perempuan">Perempuan</option>
                                                                <option value="Laki-Laki">Laki-laki</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @error('jeniskelamin')
                                                            <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
                                                        @enderror

                                                        <div class="form-group">
                                                            <label for="kota_id">Kota</label>
                                                            <select name="kota_id" class="form-control">
                                                            <option value="{{ $item->kotas->id }}">
                                                                    {{ $item->kotas->nama }}
                                                                </option>
                                                            @foreach ($kotas as $key)
                                                                <option value="{{ $key->id }}">
                                                                    {{ $key->nama }}
                                                                </option>
                                                            @endforeach
                                                            </select>
                                                        </div>

                                                        @error('kota_id')
                                                        <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
                                                        @enderror

                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                            <input type="submit" class="btn btn-info" value="Save">
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach