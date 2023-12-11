
<div>
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Anggota Dashboard Page</h1>
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
   <div class="content">
    <div class="container-fluid">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Hello,</h3>
            </div>
            <div class="card-body">
              <p class="card-text">
                Welcome {{ auth()->user()->name}}
              </p>
            </div>
          </div><!-- /.card -->
        </div>  
        </div>
        
    <!-- /.content -->
    </div>
