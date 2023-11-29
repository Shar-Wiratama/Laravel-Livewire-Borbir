<div>
        <div class="row mt-4">
            @foreach($pencatatans as $pencatatan)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ url('../storage/foto_meteran') }}/{{ $pencatatan->photo }}" style="width: 75px; height: 75px;" class="img-square mr-1">
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <p>Nama: {{ $pencatatan->user->name }}</p>
                                <p>Alamat:{{ $pencatatan->user->address}}</p>
                                <p>Meteran Terbaru: {{ $pencatatan->updated_meter }}</p>
                                <p>Dibuat pada: {{ $pencatatan->tanggal_buat }}</p>
                            </div>
                        </div>
                        @if ($pencatatan->status != 'accept' && $pencatatan->status != 'refuse')
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="" wire:click.prevent="acceptPencatatan({{ $pencatatan->id }})" class="btn btn-primary btn-block"><i class="fas fa-check"></i> Terima</a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="" wire:click.prevent="refusedPencatatan({{ $pencatatan->id }})" class="btn btn-danger btn-block"><i class="fas fa-times"></i> Tolak</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="card-footer d-flex justify-content-center">
                {{ $pencatatans->links() }}
        </div>


</div>
