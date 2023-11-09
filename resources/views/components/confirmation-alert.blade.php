@push('js')

<script>
  window.addEventListener('show-delete-confirmation', 
  event=>{
    Swal.fire({
    title: 'Apakah kamu yakin?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#dc3646',
    cancelButtonColor: '#6c757d',
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
@endpush