@extends('layouts.app')
@section('body-class', 'singup-page')
@section('content')

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
       
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

               <div>{{ $conteoNuevos }},{{ $conteoRevision }},{{ $conteoCerrados }}
               </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                     <canvas id="chartProgress"></canvas>
                     </div>
                </div>

</div>
                
               
               

                


            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>
var myChartCircle = new Chart('chartProgress', {
  type: 'doughnut',
  data: {
    datasets: [{
      label: 'Africa / Population (millions)',
      percent: 68,
      backgroundColor: ['#5283ff']
    }]
  },
  plugins: [{
      beforeInit: (chart) => {
        const dataset = chart.data.datasets[0];
        chart.data.labels = [dataset.label];
        dataset.data = [dataset.percent, 100 - dataset.percent];
      }
    },
    {
      beforeDraw: (chart) => {
        var width = chart.chart.width,
          height = chart.chart.height,
          ctx = chart.chart.ctx;
        ctx.restore();
        var fontSize = (height / 150).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.fillStyle = "#9b9b9b";
        ctx.textBaseline = "middle";
        var text = chart.data.datasets[0].percent + "%",
          textX = Math.round((width - ctx.measureText(text).width) / 2),
          textY = height / 2;
        ctx.fillText(text, textX, textY);
        ctx.save();
      }
    }
  ],
  options: {
    maintainAspectRatio: false,
    cutoutPercentage: 85,
    rotation: Math.PI / 2,
    legend: {
      display: false,
    },
    tooltips: {
      filter: tooltipItem => tooltipItem.index == 0
    }
  }
});
</script>


@endsection

