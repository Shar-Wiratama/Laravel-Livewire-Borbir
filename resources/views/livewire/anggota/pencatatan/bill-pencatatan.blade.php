<div class="card">
    <div class="card-body mx-4">
      <div class="container">
        <p class="my-5 mx-5" style="font-size: 30px;">Biaya Penggunaan Air</p>
        <div class="row">
          <ul class="list-unstyled">
            <li class="text-black">{{$pencatatans->user->name}}</li>
            <li class="text-black">{{$pencatatans->user->address}}</li>
            <li class="text-muted mt-1"><span class="text-black">Invoice</span> </li>
            {{-- <li class="text-black mt-1">{{$pencatatans->payments->tanggal_konfirmasi}}</li> --}}
            {{-- <li class="text-black mt-1">{{$pencatatans->payments->jam_konfirmasi}}</li> --}}
          </ul>
          <hr>
          <div class="col-xl-10">
            <p>Pembayaran meteran</p>
          </div>
          <div class="col-xl-2">
            <p class="float-end">{{$pencatatans->initial_price}}
            </p>
          </div>
          <hr>
        </div>
        <div class="row">
          <div class="col-xl-10">
            <p>Abondemen</p>
          </div>
          <div class="col-xl-2">
            <p class="float-end">Rp 10.000,00
            </p>
          </div>
          <hr>
        </div>
        <div class="row">
          <div class="col-xl-10">
            <p>Denda</p>
          </div>
          <div class="col-xl-2">
            <p class="float-end">{{$pencatatans->fine}}
            </p>
          </div>
          <hr style="border: 2px solid black;">
        </div>
        <div class="row text-black">
  
          <div class="col-xl-12">
            <p class="float-end fw-bold">Total: {{$pencatatans->total_price}}
            </p>
          </div>
          <hr style="border: 2px solid black;">
        </div>
        <div class="text-center" style="margin-top: 90px;">
          <a><u class="text-info">View in browser</u></a>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>
  
      </div>
    </div>
  </div> 