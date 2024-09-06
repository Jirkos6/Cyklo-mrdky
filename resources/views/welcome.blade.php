@extends('layouts.app2')

@section('content')


<canvas id="myChart"></canvas>
</div>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: ['Kategorie M', 'Kategorie W', 'Kategorie U23', 'Kategorie J', 'Kategorie E', 'Celkový počet závodů'],
        datasets: [{
            label: 'Počet závodů podle kategorie',
            data: [{{ $kategorieM }}, {{ $kategorieW }}, {{ $kategorieU23 }}, {{ $kategorieJ }}, {{ $kategorieE }}, {{ $totalRaces }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
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

</script>

@endsection