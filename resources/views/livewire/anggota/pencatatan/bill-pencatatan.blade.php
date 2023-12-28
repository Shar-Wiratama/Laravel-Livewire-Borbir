<div class="card">
  <div class="card-body mx-4">
    <div class="container">
      <p class="my-5 mx-5" style="font-size: 30px;">Swadaya Mandiri Borbir</p>
      <p class="my-5 mx-5" style="font-size: 20px;">Biaya Pembayaran Air</p>
      <div class="row">
        <hr>
        <ul class="list-unstyled">
          <li class="text-black">Nama  : {{$pencatatans->user->name}}</li>
          <li class="text-black">Alamat: {{$pencatatans->user->address}}</li>
          <li class="text-black">Tanggal Konfirmasi: {{$pencatatans->report_date}}</li>
       
        </ul>
        <hr>
        <div class="col-xl-10">
          <p>Pembayaran meteran: {{ 'Rp ' . number_format($pencatatans->initial_price, 0, ',', '.').',00'}}
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-10">
          <p>Abondemen: Rp 10.000,00
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-10">
          <p>Denda: {{ 'Rp ' . number_format($pencatatans->fine, 0, ',', '.').',00'}}
          </p>
        </div>
        <hr style="border: 2px solid black;">
      </div>
      <div class="row text-black">

        <div class="col-xl-12">
          <p class="float-end fw-bold">Total: {{ 'Rp ' . number_format($pencatatans->total_price, 0, ',', '.'). ',00'}}
          </p>
        </div>
      </div>

    </div>
  </div>
</div> 