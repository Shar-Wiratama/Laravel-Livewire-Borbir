<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('backend/plugins/toastr/toastr.min.css')}}">

  <livewire:styles />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
    @include('layouts.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{ $slot }}
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('layouts.partials.footer')
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>

<script type="text/javascript" src="{{asset('backend/plugins/toastr/toastr.min.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  window.addEventListener('show-delete-confirmation', 
  event=>{
    Swal.fire({
    title: 'Apakah kamu yakin?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        Livewire.emit('deleteConfirmed')
      }
    })
  })

  window.addEventListener('deleted', event =>{
     Swal.fire(
      'Deleted!',
      event.detail.message,
      'Success'
     )
  })
</script>

<script>
  $(document).ready(function(){
    toastr.options= {
      "positionClass": "toast-bottom-right",
      "progressBar": true,
    }

    window.addEventListener('hide-form', event => {
    $('#form').modal('hide');
    toastr.success(event.detail.message, 'Berhasil!');
  })
  })
</script>

<script>
  window.addEventListener('show-form', event => {
    $('#form').modal('show');
  })

  window.addEventListener('show-delete-modal', event => {
    $('#confirmationModal').modal('show');
  })

  window.addEventListener('hide-delete-modal', event =>{
    $('#confirmationModal').modal('hide');
    toastr.success(event.detail.message, 'Success!');
  })
</script>

<script>
  window.addEventListener('show-pencatatan-form', event => {
    $('#form').modal('show');
  })
</script>

<script>
  $(document).ready(function(){
    toastr.options= {
      "positionClass": "toast-bottom-right",
      "progressBar": true,
    }

    window.addEventListener('hide-pencatatan-form', event => {
    $('#form').modal('hide');
    toastr.success(event.detail.message, 'Berhasil!');
  })
  })
</script>

{{-- <script>
  $(document).ready(function(){
    toastr.options= {
      "positionClass": "toast-bottom-right",
      "progressBar": true,
    }

    window.addEventListener('show-exist-pencatatan', event => {
    $('#form').modal('hide');
    toastr.success(event.detail.message, 'Berhasil!');
  })
  })
</script> --}}

<script>
  window.addEventListener('show-pengumuman-modal', (pengumumanId) => {
    $('#confirmationModal' + pengumumanId.detail).modal('show');
  })
</script>

<livewire:scripts />
</body>
</html>
