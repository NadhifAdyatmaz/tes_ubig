@foreach ($mahasiswas as $item)
<!-- Delete Modal HTML -->
<div id="delete-mhs{{ $item->id }}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                    <div class="modal-header">						
                                                        <h4 class="modal-title">Hapus</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">					
                                                        <p>Apakah anda yakin ingin menghapus data {{$item->nama}}?</p>
                                                        <p class="text-warning"><small>Tindakan ini tidak dapat diurungkan</small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                        <form action="/mahasiswa/{{ $item->id }}" method="post" id="delete-mhs{{ $item->id }}">
                                                            @csrf
                                                            @method('delete')
                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach