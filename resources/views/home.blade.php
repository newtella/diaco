@extends('layouts.app')
@section('body-class', 'singup-page')
@section('content')

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
       
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-signup">

                
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

               <div>
               </div>
                </div>
              
                    <div class="wrapper">
                    <div class="row">
                    <!-- <canvas class="my-4 chartjs-render-monitor" id="bar-chart" width="600" height="250" style="display: block; width: 586px; height: 247px;"></canvas> -->
                      

                    <canvas class="my-4 chartjs-render-monitor" id="bar-chart" style="height: 10rem"></canvas>

                
                    </main>
                
</div>
                </div>
                
               
               

                


            </div>
        </div>
        
    </div>
    <footer class="footer">
    </footer>
</div>


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Quejas Nuevas", "Quejas en Revisión", "Quejas Cerradas"],
      datasets: [
        {
          label: "Quejas (Total)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [{{ $conteoNuevos }},{{ $conteoRevision }},{{ $conteoCerrados }}]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        responsive: true,
        text: 'Conteo de Quejas segun Status'
      },
      scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 1
                    
                }
            }]
        }
    }
});
</script>


@endsection