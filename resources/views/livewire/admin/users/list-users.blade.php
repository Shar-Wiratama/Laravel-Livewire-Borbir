
<div>
<div>
<div>
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.users') }}">User</a></li>
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
            <div class="d-flex justify-content-between mb-3">
                <button type="button" wire:click.prevent="addUser" class="btn btn-primary"><i class="fa fa-plus circle mr-1"></i>
                Tambah Anggota
                </button>
                <div>
                  <input wire:model="searchTerm" type="text" class="form -control" placeholder="Search">
                </div>
            </div>    

            <div class="card">
              <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($users as $user)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->address}}</td>
                        <td>{{ $user->email}}</td>
                        <td>Anggota</td>
                        <td>{{ $user->created_at}}</td>
                        <td>
                        <a href="" wire:click.prevent="edit({{$user}})">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="" wire:click.prevent="confirmUserRemoval({{$user->id}})">
                            <i class="fa fa-trash text-danger"></i>
                        </a>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center">
                      <td colspan="5">No Result Found</td>
                    </tr>
                    @endforelse

                    </tbody>
                </table>
              </div>
              <div class="card-footer d-flex justify-content-end">
                {{ $users->links()}}
              </div>
            </div>
          


            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

   <!-- Modal -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog" role="document">
  <form autocomplete="off" wire:submit.prevent="{{$showEditModal ? 'updateUser' : 'createUser'}}">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">
        @if($showEditModal)
        <span>Ubah User</span>
        @else
        <span>Tambah User Baru</span>
        @endif
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama Lengkap">
                  @error('name')
                    <div class="invalid-feedback">
                    {{  $message  }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="address">Alamat</label>
                  <input type="text" wire:model.defer="state.address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Masukkan Alamat">
                   @error('address')
                    <div class="invalid-feedback">
                    {{  $message  }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="initialMeter">Meteran Awal</label>
                  <input type="text" wire:model.defer="state.initial_meter" class="form-control" id="initialMeter" placeholder="Masukkan Meteran Awal">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" wire:model.defer="state.email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email">
                   @error('email')
                    <div class="invalid-feedback">
                    {{  $message  }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" wire:model.defer="state.password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password">
                   @error('password')
                    <div class="invalid-feedback">
                    {{  $message  }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="passwordConfirmation">Konfirmasi Password</label>
                  <input type="password" wire:model.defer="state.password_confirmation" class="form-control" id="passwordConfirmation" placeholder="Konfirmasi Password">
                </div>
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Batalkan</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
              @if($showEditModal)
              <span>Simpan Perubahan</span>
              @else
              <span>Simpan</span>
              @endif
              </button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>


     <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Hapus User</h5>
                </div>

                <div class="modal-body">
                    <h4>Anda yakin menghapus user ini?</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Batalkan</button>
                    <button type="button" wire:click.prevent="deleteUser" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus User</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

