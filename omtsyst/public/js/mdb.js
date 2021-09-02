var ctx = document.getElementById("myChartFrom").getContext('2d');
var ctx2 = document.getElementById("myChartTo").getContext('2d');

var xhr = new XMLHttpRequest();
    const http = "http://localhost/";
    const url = http + "onlinemoneytransfersyst/omtsyst/public/stats";

    form = new FormData()
    form.append('stat', 'from')
    xhr.open("GET", url);
    xhr.send(form);

    xhr.addEventListener('readystatechange', function(){
        if(xhr.readyState === XMLHttpRequest.DONE) {
            var country = JSON.parse(xhr.responseText);
            console.log(country[0]);
            var labelsfrom = [];
            var datafrom = [];
            var bgColorfrom = []
            var bdColorfrom = []

            var labelsto = [];
            var datato = [];
            var bgColorto = [];
            var bdColorto = [];


            for(var x in country[0]) {
                labelsfrom.push(country[0][x]['name'])
                datafrom.push(country[0][x]['nbr'])
                bgColorfrom.push('rgba(58,104,33, 0.2)');
                bdColorfrom.push('rgba(102,13,13, 0.2)');
            }
            for(var x in country[1]){
                labelsto.push(country[1][x]['name']);
                datato.push(country[1][x]['nbr']);
                bgColorto.push('rgba(35,71,123, 0.2)');
                bdColorto.push('rgba(147,48,48, 0.2)');

            }
            chart(ctx, labelsfrom, datafrom, bgColorfrom, bdColorfrom);
            chart(ctx2,labelsto, datato, bgColorto, bdColorto);

        }
    });

    function chart(ctx, labels, data, bgColor, bdColor)
    {
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '# transaction',
                    data: data,
                    backgroundColor: bgColor,
                    borderColor: bdColor,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
