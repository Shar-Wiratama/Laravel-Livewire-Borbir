
    <div>
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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
          <!-- /.col-md-6 -->
        {{-- </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div> --}}

    <div>
      <canvas id="AdminDashboardController" width="400" height="400"></canvas>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <script>
        document.addEventListener('livewire:load', function () {
            var ctx = document.getElementById('meterUsageChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Meter Usage per Month',
                        data: @json($data),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    </div>

    <livewire:meter-usage-chart />
