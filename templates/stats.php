<?php
    include_once "header.php";
?>

<!-- Introductory for stats -->
<div class="container" style="width:100%%;margin-top:3%;">
    <div class="main-border" style="text-align:center;width:100%;height:230px;">
        <h5 style="margin-top: 2%;margin-bottom:5%;font-family: Script MT Bold;">Jerry's reading stats</h5>

        <p style="margin-top:2%;margin-left:-10%;">Viewing stats for</p>
        
        <!-- Book Status Selector -->
        <div class="dropdown" style="margin-top:-4%;margin-left:13%;">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid black;">
                Read Books
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="#" class="dropdown-item active">Read Books</a>
                <a href="#" class="dropdown-item">To-Read Pile</a>
                <a href="#" class="dropdown-item">Currently Reading Books</a>
            </div>
        </div>

        <!-- Time Frame Selector -->
        <div class="dropdown" style="margin-top:2%;">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid black;">
                All Time
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="#" class="dropdown-item active">All Time</a>
                <a href="#" class="dropdown-item">2023</a>
                <a href="#" class="dropdown-item">2022</a>
            </div>
        </div>
        
        </div>
    </div>
</div>



<!-- Begin stats -->
<div class="stats" style="width:100%;">
    <!-- First container -->
    <div class="container" style="width:100%;margin-top:3%;">
        <div class="main-border" style="text-align:center;width:100%;height:3600px;">
            <h5 style="margin-top: 2%;font-family: Script MT Bold;">Read</h5>
            <a href="#" style="color:#034694;;margin-left:-10%;">1800 Books</a>
            <p style="margin-top:-2.15%;margin-left:7.1%;">, 439,571 pages</p>
            <hr style="margin-left: auto;margin-right:auto;width:90%;">

            <!-- First pie chart -->
            
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
            

            <p style="margin-top:5%;font-size:14px;"><em>Click on any chart segment to view the books</em></p>
            <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">


            <!-- Second pie chart -->
            
            <figure class="highcharts-figure">
                <div id="second-container"></div>
            </figure>

            <p style="margin-top:5%;font-size:14px;"><em>Click on any chart segment to view the books</em></p>
            <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">



            <!-- Third pie chart -->
            <figure class="highcharts-figure">
                <div id="third-container"></div>
            </figure>

            <p style="margin-top:5%;font-size:14px;"><em>Click on any chart segment to view the books</em></p>
            <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">



            <!-- Fourth pie chart -->
            <figure class="highcharts-figure">
                <div id="fourth-container"></div>
            </figure>

            <p style="margin-top:5%;font-size:14px;"><em>Click on any chart segment to view the books</em></p>
            <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">


            <!-- my code begin -->
                <script>
                    // Radialize Colors
                    Highcharts.setOptions({
                            colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                                return {
                                    radialGradient: {
                                        cx: 0.5,
                                        cy: 0.3,
                                        r: 0.7
                                    },
                                    stops: [
                                        [0, color],
                                        [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                                    ]
                                };
                            })
                        });


                    function generatePieChart(container, title, data) {
                        Highcharts.chart(container, {
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false,
                                type: 'pie'
                            },
                            title: {
                                text: title,
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                            },
                            accessibility: {
                                point: {
                                    valueSuffix: '%'
                                }
                            },

                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: true,
                                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                        connectorColor: 'silver'
                                    }
                                }
                            },
                            series: [{
                                name: 'Share',
                                data: data,
                                point:{
                                        events:{
                                            click: function(){
                                                // Take me to book section with associated mood
                                                // required url is of the form /books/{this.name} where this.name is the category search parameter
                                                window.location.href = "#";
                                                console.log("Name: " + this.name + ", Value: " + this.y);   
                                            }
                                        }
                                }
                            }]
                        });
                    }

                    // Generate first pie chart
                    generatePieChart('container', 'Mood', [
                        { name: 'Chrome', y: 61.41 },
                        { name: 'Internet Explorer', y: 11.84 },
                        { name: 'Firefox', y: 10.85 },
                        { name: 'Edge', y: 4.67 },
                        { name: 'Safari', y: 4.18 },
                        { name: 'Other', y: 7.05 }
                    ]);

                    // Generate second pie chart
                    generatePieChart('second-container', 'Pace', [
                        { name: 'Chrome', y: 73.24 },
                        { name: 'Edge', y: 12.93 },
                        { name: 'Firefox', y: 4.73 },
                        { name: 'Safari', y: 2.50 },
                        { name: 'Internet Explorer', y: 1.65 },
                        { name: 'Other', y: 4.93 }
                    ]);

                    // Generate third pie chart
                    generatePieChart('third-container', 'Page Number', [
                        { name: 'Chrome :sad:', y: 73.24 },
                        { name: 'Edge', y: 12.93 },
                        { name: 'Firefox', y: 4.73 },
                        { name: 'Safari', y: 2.50 },
                        { name: 'Internet Explorer', y: 1.65 },
                        { name: 'Other', y: 4.93 }
                    ]);

                    // Generate fourth pie chart
                    generatePieChart('fourth-container', 'Fiction/Non Fiction', [
                        { name: 'Chrome ', y: 73.24 },
                        { name: 'Edge', y: 12.93 },
                        { name: 'Firefox', y: 4.73 },
                        { name: 'Safari', y: 2.50 },
                        { name: 'Internet Explorer', y: 1.65 },
                        { name: 'Other', y: 4.93 }
                    ]);


                    generatePieChart('fourth-container', 'Fiction/Non Fiction', [
                        { name: 'Chrome ', y: 73.24 },
                        { name: 'Edge', y: 12.93 },
                        { name: 'Firefox', y: 4.73 },
                        { name: 'Safari', y: 2.50 },
                        { name: 'Internet Explorer', y: 1.65 },
                        { name: 'Other', y: 4.93 }
                    ]);
                        
                    
                </script>

            <!-- my code end -->





            <!-- First Bar chart -->
            <h4 style="font-weight:630;">Genres</h4>
            <div>
                <canvas id="first-chart"></canvas>
            </div>
            <p style="margin-top:5%;font-size:14px;"><em>Click on any chart segment to view the books</em></p>
            <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">

            <!-- Second Bar chart -->
            <h4 style="font-weight:630;">Most Read Authors</h4>
            <div>
                <canvas id="second-chart"></canvas>
            </div>
            <p style="margin-top:5%;font-size:14px;"><em>Click on any chart segment to view the books</em></p>
        </div>
    </div>


    <!-- Second container -->
    <div class="container" style="width:100%;margin-top:3%;">
        <div class="main-border" style="text-align:center;width:100%;height:870px;margin-bottom:50px;">
                <h5 style="margin-top: 2%;font-family: Script MT Bold;">Star Ratings</h5>
                <p>1337 Reviews</p>
                <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">
                <p style="font-size:20px;margin-top:3%;">Average Rating: 3.75 &#11088</h3>

                <div>
                    <canvas id="third-chart"></canvas>
                </div>
                <p style="margin-top:5%;font-size:14px;"><em>Click on any chart segment to view the books</em></p>


                <!-- javascript code -->
                <script>
                    function generateChart(id,labels,label,data,isHorizontal){
                        const ctx = document.getElementById(id);

                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                            labels: labels,
                            datasets: [{
                                label: label,
                                data: data,
                                borderWidth: 1,
                                backgroundColor: 'rgba(54, 162, 235, 0.3)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                hoverBackgroundColor: 'rgba(54, 162, 235, 0.6)',
                                hoverBorderColor: 'rgba(54, 162, 235, 1)'
                            }]
                            },
                            options: {
                                onClick: function(evt, item) {
                                    if (item.length > 0) {
                                        const index = item[0].index;
                                        console.log(index);
                                        window.location.href = '#';
                                        console.log(item);
                                    }
                                },
                                indexAxis: isHorizontal ? 'y' : 'x',
                                scales: {
                                    y: {
                                    beginAtZero: true
                                    }
                                }
                                }
                            });
                    }
                    const label = "Number of books";
                    const label1= "test";
                    const labels = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
                    const data = [12,19,3,5,2,3];
                    generateChart('first-chart',labels,label,data,true);
                    generateChart('second-chart',labels,label1,data,true);
                    generateChart('third-chart',labels,label,data,false);
                </script>
            <!-- end javascript code -->



        </div>
    </div>



</div>