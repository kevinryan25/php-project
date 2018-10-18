<script src="view/scripts/Chart.js"></script>
<script src="view/scripts/jquery.js"></script>
<h1>Projet php</h1>
<div style="height: 70vh; width:100%;">
<canvas id="myChart"></canvas>
</div><br><br><br><br>
<div style="height: 70vh; width:100%;">
<canvas id="myChart2"></canvas>
</div>

<script>
$(function(){
    var dataHoraire = [];
    var nom = [];
    var horaire = [];
    var salaire = [];
    var bg = [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(76,175,80,0.2)',
        'rgba(224,64,251 ,0.2)',
        'rgba(21,101,192 ,0.2)',
        'rgba(255,171,64 ,0.2)',
        'rgba(233,30,99,0.2)',
        'rgba(0,150,136,0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
    ];
    var bgToAdd = [];
    function getNomAndHoraire(data) {
        var i = 0;
        data.forEach(function(elem){
            nom.push(elem.teacher);
            horaire.push(elem.horaire);
            salaire.push(elem.salary);
            bgToAdd.push(bg[i]);
            i++;
        });
    }
    $.ajax({
        url: 'controller/volumeHoraire.php',
        type: 'get',
        dataType: 'json',
        success: function (data) {
            getNomAndHoraire(data);
        }
    });
setTimeout(() => {
    var ctx = document.getElementById("myChart").getContext('2d');
    var ctx2 = document.getElementById("myChart2").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: nom,
        datasets: [{
            label: "Nombre d'heure",
            data: horaire,
            backgroundColor: bgToAdd,
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
var myChart = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: nom,
        datasets: [{
            label: "Salaire",
            data: salaire,
            backgroundColor: bgToAdd,
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
}, 2000);

});
</script>
<style>
    .images{
        text-align: center;
    }
    .images img{
        width: 250px;
        margin: 0em;
        vertical-align: middle;
    }

</style>