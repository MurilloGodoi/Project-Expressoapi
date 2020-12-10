var ctx = document.getElementById('chartSms1').getContext('2d');

var chart = new Chart(ctx, {

    type: 'pie',
    data: {
        labels: ['Usado', 'Livre',],


        datasets: [{
            label: 'Gráfico',
            backgroundColor: ['blue', 'white'],
            borderColor: 'rgb(255, 99, 132)',
            data: [20, 80]

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
});

var ctx = document.getElementById('chamadasExcedentes').getContext('2d');

var chart = new Chart(ctx, {

    type: 'pie',
    data: {
        labels: ['Usado', 'Livre',],


        datasets: [{
            label: 'Número Chamadas Excedentes',
            backgroundColor: ['blue', 'white'],
            borderColor: 'rgb(255, 99, 132)',
            data: [50, 50]

        }]
    },

    options:{
        responsive: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctx = document.getElementById('numDiarioSms').getContext('2d');

var chart = new Chart(ctx, {

    type: 'bar',
    data: {
        labels: ['Seg.', 'Ter.', 'Qua.', 'Qui.', 'Sex.', 'Sáb.', 'Dom.'],

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
});



var ctx = document.getElementById('numDiarioChamadas').getContext('2d');

var chart = new Chart(ctx, {

    type: 'bar',
    data: {
        labels: ['Seg.', 'Ter.', 'Qua.', 'Qui.', 'Sex.', 'Sáb.', 'Dom.'],

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
});

