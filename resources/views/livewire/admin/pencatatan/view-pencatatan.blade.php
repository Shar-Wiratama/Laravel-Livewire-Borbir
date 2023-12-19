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
                        <div class="card">
                            <div class="card card-primary card-outline">
                            <div class="card-header">
                                @if($pencatatans->isEmpty())
                                    <p>No data available.</p>
                                @else
                              <table class="table table-hover">
                                  <thead>
                                  <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Nama</th>
                                      <th scope="col">Alamat</th>
                                      <th scope="col">Meteran Akhir</th>
                                      <th scope="col">Penggunaan Air</th>
                                      <th scope="col">Harga Meteran</th>
                                      <th scope="col">Denda</th>
                                      <th scope="col">Harga Total Bulan Ini</th>
                                      <th scope="col">Dibuat Tanggal</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Invoice</th>
                                      <th scope="col">Foto</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                            </div>
                            <div class="card-body">
                                  @foreach($pencatatans as $pencatatan)
                                  <tr>
                                      <th scope="row">{{$loop->iteration}}</th>
                                      <td>{{$pencatatan->user->name}}</td>
                                      <td>{{$pencatatan->user->address}}</td>
                                      <td>{{$pencatatan->updated_meter}}</td>
                                      <td>{{$pencatatan->usage_meter}}</td>
                                      <td>{{$pencatatan->initial_price}}</td>
                                      <td>{{$pencatatan->fine}}</td>
                                      <td>{{$pencatatan->total_price}}</td>
                                      <td>{{$pencatatan->tanggal_buat}}</td>
                                      <td>{{$pencatatan->status}}</td>
                                      @if($pencatatan->status == 'Diterima')
                                      <td>
                                        <a href="{{ url('../storage/invoice_meteran')}}/invoice{{$pencatatan->id}}.pdf" class="btn btn-success">
                                            Lihat Invoice
                                        </a>
                                      </td>
                                      <td>
                                        <img src="{{ url('../storage/foto_meteran') }}/{{ $pencatatan->photo }}" style="width: 120px; height: 120px;" class="img-square mr-1">
                                      </td>
                                      @elseif($pencatatan->status == 'Ditolak')
                                      <td>
                                      <p>
                                        Kosong
                                      </p>
                                    </td>
                                    @elseif($pencatatan->status == 'Menunggu')
                                    <td>
                                    <p>
                                      Kosong
                                    </p>
                                  </td>
                                    @endif
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




        </div>
    </div>
</div>


