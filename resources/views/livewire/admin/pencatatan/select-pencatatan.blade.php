<div>
        <div class="row mt-4">
            @foreach($pencatatans as $pencatatan)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        {{-- <img src="{{ url('storage/app/public/foto_meteran') }}/{{ $pencatatans->photo }}" class="img-fluid"> --}}
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <p>Nama: {{ $pencatatan->user->name??null }}</p>
                                <p>Alamat:{{ $pencatatan->user->address??null}}</p>
                                <p>Meteran Terbaru: {{ $pencatatan->updated_meter }}</p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="" class="btn btn-primary btn-block"><i class="fas fa-eye"></i> Terima</a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="" class="btn btn-danger btn-block"><i class="fas fa-eye"></i> Tolak</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="card-footer d-flex justify-content-center">
                {{ $pencatatans->links() }}
        </div>


</div>
