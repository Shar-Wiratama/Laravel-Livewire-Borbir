
<div>
<div>
<div>
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengumuman Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.pengumuman') }}">Pengumuman</a></li>
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
            <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.pengumuman.create')}}">
                <button class="btn btn-primary"><i class="fa fa-plus circle mr-1"></i>
                Tambah Pengumuman
                </button>
                </a>
            </div>    

            <div class="card">
              <div class="card-body">
                @if($pengumumans->isEmpty())
                  <p>No data available.</p>
                @else
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Isi Konten</th>
                        <th scope="col">Dibuat Tanggal</th>
                        <th scope="col">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($pengumumans as $pengumuman)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$pengumuman->title}}</td>
                        <td>{{$pengumuman->content}}</td>
                        <td>{{$pengumuman->created_at}}</td>
                        <td>
                        <a href="{{ route('admin.pengumuman.edit', $pengumuman) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="" wire:click.prevent="confirmPengumumanRemoval({{ $pengumuman->id }})">
                            <i class="fa fa-trash text-danger"></i>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
              </div>
              <div class="card-footer d-flex justify-content-end">   
                {{ $pengumumans->links() }}
              </div>
            </div>            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <x-confirmation-alert />

</div>
</div>
</div>

