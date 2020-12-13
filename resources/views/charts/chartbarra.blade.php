<div class="row">
    <canvas class="col-12 flex-fill chart" id="numDiarioSms" ></canvas>
</div>

<script>

    var chartoptionsbarra = {

        type: 'bar',
        data: {
            labels: ['Dom.','Seg.', 'Ter.', 'Qua.', 'Qui.', 'Sex.', 'Sáb.'],

            datasets: [{
                label: 'Números Diários de SMS' ,
                backgroundColor: ['green','green','green','green','green','green','green',],
                borderColor: 'rgb(255, 99, 132)',
                data: [50, 20, 30, 10, 70, 18, 29]

            }]
        },

        options: {
            responsive: false,
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
        var ctxbarra = document.getElementById('numDiarioSms').getContext('2d');
        window.myPie = new Chart(ctxbarra,chartoptionsbarra);
    });
</script>
