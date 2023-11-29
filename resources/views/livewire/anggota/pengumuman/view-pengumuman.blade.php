<div>
    <div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Pengumuman Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @foreach ($pengumumans as $pengumuman)
        <div class="col-mb-5 md-5">
            <div class="card mx-auto">
                <a href="" wire:click.prevent="showPengumumanModal({{ $pengumuman->id }})" class="card-link">
                    <div class="card-body text-left">
                        <div class="col-md-12">s
                            <h5 class="card-title">
                                {{ $pengumuman->title }}
                            </h5>
                        </div>
                        <p class="card-text text-right">
                            {{ $pengumuman->created_at }}
                        </p>
                </a>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="confirmationModal{{ $pengumuman->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Pengumuman</h5>
                    </div>
                    <div class="modal-body" id="pengumumanBody">
                        <div>
                            <h4>{{ $pengumuman->title }}</h4>
                        </div>
                        <div>
                            <p>{{ $pengumuman->created_at->format('h:m d-m-y') }}</p>
                        </div>
                        <div>
                            <p>{{ $pengumuman->content }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>



<div class="card-footer d-flex justify-content-center">
    {{ $pengumumans->links() }}
</div>


{{-- <!-- Modal Content -->
        <div class="modal fade" id="confirmationModal" x-show="showPengumumanModal" @show-pengumuman-modal.window="showPengumumanModal($event.detail)">
          <!-- Modal content based on modalId -->
          <p>Modal ID: {{ $modalPengumumanId }}</p>
          <!-- ... other modal content ... -->
          <<div class="modal-footer">
            <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
      </div> --}}

</div>
