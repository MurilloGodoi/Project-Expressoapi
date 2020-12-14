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
                data: [
                    {{ $weekly_usage[0] }},
                    {{ $weekly_usage[1] }},
                    {{ $weekly_usage[2] }},
                    {{ $weekly_usage[3] }},
                    {{ $weekly_usage[4] }},
                    {{ $weekly_usage[5] }},
                    {{ $weekly_usage[6] }},
                ]

            }]
        },

        options: {
            responsive: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        suggestedMax: 10
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
