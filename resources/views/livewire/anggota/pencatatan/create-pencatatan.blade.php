<div>
    <div>
        <div>
            <div>
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Pencatatan Page</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ route('anggota.pencatatan.create') }}">User</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center mb-3">
                                <button type="button" wire:click.prevent="addPencatatan" class="btn btn-primary"><i
                                        class="fa fa-plus circle mr-1"></i>
                                    Tambah Pencatatan
                                </button>
                            </div>
                        </div>

                      
                        <div class="card">
                            <div class="card-body">
                                @if($pencatatans->isEmpty())
                                    <p>No data available.</p>
                                @else
                              <table class="table table-hover">
                                  <thead>
                                  <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Meteran Awal</th>
                                      <th scope="col">Dibuat Tanggal</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Invoice</th>
                                  </tr>
                                  </thead>
                                  <tbody>
              
                                  @foreach($pencatatans as $pencatatan)
                                  <tr>
                                      <th scope="row">{{$loop->iteration}}</th>
                                      <td>{{$pencatatan->updated_meter}}</td>
                                      <td>{{$pencatatan->tanggal_buat}}</td>
                                      <td>{{$pencatatan->status}}</td>
                                  </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                              @endif
                            </div>
                            <div class="card-footer d-flex justify-content-end">   
                              {{ $pencatatans->links() }}
                            </div>
                          </div>  
                       

                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>



            <!-- Modal -->
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <form autocomplete="off" wire:submit.prevent="makePencatatan">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    <span>Tambah Pencatatan</span>
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form>
                                
                                    <input type="text" wire:model="user_id" hidden
                                        class="form-control @error('user_id') is-invalid @enderror"
                                        id="user_id" placeholder="Masukkan Nama Terbaru">
  
                                    
                               

                                <div class="form-group">
                                    <label for="updated_meter">Meteran Terbaru </label>
                                    <input type="text" wire:model="updated_meter"
                                        class="form-control @error('updated_meter') is-invalid @enderror"
                                        id="updated_meter" placeholder="Masukkan Meteran Terbaru">
                                    @error('updated_meter')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="customFile">Foto Meteran Terbaru</label>
                                    <div class="custom-file">
                                        <input wire:model="photo" accept="image/png, image/jpg" type="file" class="custom-file-input"
                                            id="customFile">
                                        <label class="custom-file-label" for="customFile">
                                            @if ($photo)
                                                {{ $photo->getClientOriginalName() }}
                                            @else
                                                Pilih Gambar
                                            @endif
                                        </label>
                                    </div>
                                </div>

                                
                                    <input type="date" wire:model="tanggal_buat" hidden
                                        class="form-control @error('tanggal_buat') is-invalid @enderror"
                                        id="tanggal_buat" placeholder="Masukkan Tanggal Terbaru">
                                    

                              </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times mr-1"></i>Batalkan</button>
                                <button type="submit" class="btn btn-primary"><i
                                        class="fa fa-save mr-1"></i>Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

