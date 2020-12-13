<div class="row">
    <canvas class="col-12 flex-fill chartSms1" id="chartSms1" ></canvas>
</div>


<script>
    var chartoptionspizza = {

    type: 'pie',
    data: {
    labels: ['Usado', 'Livre',],


    datasets: [{
    label: 'Gráfico',
    backgroundColor: ['red', 'green'],
    borderColor: 'rgb(255, 99, 132)',
    data: [{{$requests_quantity}}, 50]

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

