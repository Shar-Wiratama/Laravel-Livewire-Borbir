<div>
        <div class="row mt-4">
            @foreach($pencatatans as $pencatatan)
            @if($pencatatan->status == 'Menunggu')
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ url('../storage/foto_meteran') }}/{{ $pencatatan->photo }}" style="width: 120px; height: 120px;" class="img-square mr-1">
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <p style="margin: 0px">Nama: {{ $pencatatan->user->name }}</p>
                                <p style="margin: 0px">Alamat:{{ $pencatatan->user->address}}</p>
                                <p style="margin: 0px">Meteran Bulan Lalu: {{$pencatatan->user->initial_meter}}</p>
                                <p style="margin: 0px">Meteran Bulan Ini: {{ $pencatatan->updated_meter }}</p>
                                <p style="margin: 0px">Dibuat pada: {{ \Carbon\Carbon::parse($pencatatan->created_date)->format('l, j F Y') }}</p>
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
            @elseif($pencatatan->status == 'Diterima')
            @if($pencatatan->paying_status == 'Belum Lunas')
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ url('../storage/foto_meteran') }}/{{ $pencatatan->photo }}" style="width: 120px; height: 120px;" class="img-square mr-1">
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <p style="margin: 0px">Nama: {{ $pencatatan->user->name }}</p>
                                <p style="margin: 0px">Alamat:{{ $pencatatan->user->address}}</p>
                                <p style="margin: 0px">Meteran Yang digunakan: {{ $pencatatan->usage_meter }}</p>
                                <p style="margin: 0px">Dibuat pada: {{ \Carbon\Carbon::parse($pencatatan->created_date)->format('l, j F Y') }}</p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="" wire:click.prevent="acceptPayment({{ $pencatatan->id }})" class="btn btn-primary btn-block"><i class="fas fa-check"></i> Lunas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @elseif($pencatatan->paying_status == 'Lunas')
                <div class="col-md-3 mb-3">
                    <div class="card" hidden></div>
                </div>
                @endif
            @endif
            @endforeach
        </div>

        <div class="card-footer d-flex justify-content-center">
                {{ $pencatatans->links() }}
        </div>


</div>
