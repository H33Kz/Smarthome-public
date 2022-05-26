<?php
    session_start();
    
    //Sprawdź flagę zalogowania
    If(!isset($_SESSION['loggedin'])){
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard_style.css">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.js"></script>
    <title>Humidity graph</title>
</head>
<body onload="initialDownload()">
    
<div class="sidebar">
        <div class="sidebar-brand">
            <h1><a href="userpanel.php"><img class="img" src="https://puu.sh/Im5Rd/506e4631da.png"></a></h1>
        </div>
        <img class="whitebar-line" src="whitebar.png">
        <div class="sidebar-menu">
            <ul>
                <li><a href="tempgraph.php"><img class="sidebaricon" src="https://puu.sh/Im2pg/1699a1b89e.png"><span>Temperature</span></a></li>
            </ul>
            <ul>
                <li><a href="humigraph.php" class="active"><img class="sidebaricon" src="https://puu.sh/Im35b/2945fe3e3b.png"><span>Humidity</span></a></li>
            </ul>
            <ul>
                <li><a href="controls.php"><img class="sidebaricon" src="https://puu.sh/Im3A8/4fe19452d0.png"><span>Controls</span></a></li>
            </ul>
            <ul>
                <li><a href="alerts.php"><img class="sidebaricon" src="https://puu.sh/Imugx/f7736adf7d.png"><span>Alerts</span></a></li>
            </ul>
            <ul>
                <li><a href="user.php"><img class="sidebaricon" src="https://puu.sh/Im35j/00932d1d2f.png"><span>User</span></a></li>
            </ul>
            <ul>
                <li><a href="contact.php"><img class="sidebaricon" src="https://puu.sh/Im3dL/0de59df947.png"><span>Contact</span></a></li>
            </ul>
            <ul>
                <li><a href="logout.php"><img class="sidebaricon" src="https://puu.sh/Im44k/9ea019f209.png"><span>Log out</span></a></li>
            </ul>
        </div>
        
        
</div>
    <div class="main-content">
        <br>
        <div class="container">
            <canvas id="chart"></canvas>
        </div>
        <center>
        <button class="btn-less" onclick="showLess()">Show less(-1)</button>
        <button class="btn-default" onclick="window.location.reload()">Default</button>
        <button class="btn-more" onclick="showMore()">Show more(+1)</button>
        <br>
        <button class="btn-leftshift" onclick="shiftLeft()"><- Shift left</button>
        <button class="btn-showfifty" onclick="showFifty()">Show 50 measurments</button>
        <button class="btn-rightshift" onclick="shiftRight()">Shift right -></button>
        </center>
    </div>
        <h1>
            <label for="">
                <span></span>
            </label>
        </h1>
    
        <script type="text/javascript">
            const labels = [];
            //Data and its options
            const data = {
                //Using previously set labels
                labels: labels,
                //Dataset configuration
                datasets: [{
                    label: 'Humidity',
                    backgroundColor: 'rgb(102, 204, 255)',
                    borderColor: 'rgb(102, 204, 255)',
                    fill:true,
                    data:[]
                }]
            };
            //Chart configuration
            const config = {
                type: 'line', //Graph type
                data: data, //Data used in graph - we use data set before
                //Additional options to graph - animations, title etc.
                options: {
                    //Animation set to tension - blocked to achieve smoother graph
                    animations:{
                        tension:{
                            easing: 'linear',
                            from: 0.3,
                            to: 0.3,
                        }
                    },
                    plugins:{
                        title:{
                            display:true,
                            text:'Humidity graph',
                            font:{size:32}
                        },
                        legend:{
                            display:false
                        }
                    },
                    scales:{
                        y:{
                            suggestedMin: 20,
                            suggestedMax: 80
                        }
                    }
                }
            };

            var myChart = document.getElementById('chart').getContext('2d');
            var lineChart = new Chart(myChart,config);
            var ajax = new XMLHttpRequest();
            var numberOfIndexes = 6;
            var shiftIndex = 0;


            function initialDownload(){
                ajax.open("POST", "graphsData.php", true);
                //sending ajax request
                ajax.send();
                //response
                ajax.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        var dbData = JSON.parse(this.responseText);
                        console.log(dbData);
                        var maxIndex = dbData.length - 1;
                        var tempData = [];
                        var tempLabels = [];


                        for(var i = numberOfIndexes-1 ; i >= 0 ; i--){
                            tempData.push(dbData[maxIndex - i - shiftIndex].humi);
                            tempLabels.push(dbData[maxIndex - i - shiftIndex].timestamp);
                        }
                        
                        lineChart.data.datasets[0].data = tempData;
                        lineChart.data.labels = tempLabels; 

                        // lineChart.data.datasets[0].data = [
                        //     dbData[maxIndex - 5].humi,
                        //     dbData[maxIndex - 4].humi,
                        //     dbData[maxIndex - 3].humi,
                        //     dbData[maxIndex - 2].humi,
                        //     dbData[maxIndex - 1].humi,
                        //     dbData[maxIndex].humi];

                        // lineChart.data.labels = [
                        //     dbData[maxIndex - 5].timestamp,
                        //     dbData[maxIndex - 4].timestamp,
                        //     dbData[maxIndex - 3].timestamp,
                        //     dbData[maxIndex - 2].timestamp,
                        //     dbData[maxIndex - 1].timestamp,
                        //     dbData[maxIndex].timestamp
                        // ];

                        lineChart.update();
                    }
                }
                setTimeout(initialDownload,1000);
            }

            function showFifty(){
                numberOfIndexes = 50;
            }
            function showLess(){
                numberOfIndexes--;
            }
            function defaultView(){
                numberOfIndexes = 6;
            }
            function showMore(){
                numberOfIndexes++;
            }
            function shiftLeft(){
                shiftIndex++;
            }
            function shiftRight(){
                shiftIndex--;
            }
        </script>

</body>
</html>