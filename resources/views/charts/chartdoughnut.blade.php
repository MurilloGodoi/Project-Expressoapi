<div class="row">
    <canvas class="col-12 flex-fill chartSms1" id="chartSms1" ></canvas>
</div>


<script>
    var chartoptionspizza = {

    type: 'doughnut',
    data: {
    labels: ['Livre', 'Utilizado', 'Ultrapassado'],
    datasets: [{
    label: 'Gráfico',
    backgroundColor: ['#003f5c', '#ffa600', '#ff6361'],
    data: [
        {{$requests_available}},
        @if ($extras > 0)
            {{$requests_quantity}},
        @else
            {{$requests_consumed}},
        @endif
        {{$extras}},
    ]

    }]
    },

    options: {
        responsive:false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
          }
        }
    };

    window.addEventListener('load',function() {
        var ctxpizza = document.getElementById('chartSms1').getContext('2d');
        window.myPie = new Chart(ctxpizza,chartoptionspizza);
    });

</script>

