<div>
     <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark">Appointments</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.pengumuman') }}">Pengumuman</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form wire:submit="updatePengumuman" autocomplete="off">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ubah Pengumuman</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                             <label for="title">Judul</label>
                                            <input type="text" wire:model.defer="state.title" class="form-control" id="title" placeholder="Masukkan Judul">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="content">Konten</label>
                                            <textarea id="content" wire:model.defer="state.content" class="form-control" id="content" placeholder="Masukkan Isi Konten"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('admin.pengumuman') }}">
                                    <button type="button" class="btn btn-secondary"><i class="fa fa-times mr-1"></i> Batalkan</button>
                                </a>
                                <button id="submit" type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
