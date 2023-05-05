<?php
    include_once "header.php";
?>


<div class="container" style="margin-bottom: 20px;width:100%;">
    <div class="row" style="width:100%;">
        <div class="col-4" style="display:flex;align-items:flex-start;justify-content: sapce-between;">

            <img src="pictures/schopenhauer.jpg" alt="image not found" style="margin-top:18%;margin-left:50px;margin-right:30px;width:270px;height:330px;">
            
            <button class="btn" style="margin-top:125%;margin-left:-70%;font-size:15px;border: 1px solid black;">Follow Author</button>

        </div>

        <div class="col-4">
            <h1 class="username" style="margin-top: 50px;margin-left:-20px;color:#490206; font-family: Script MT Bold; ">Arthur Schopenhauer</h1>
            <hr style="margin-top:105px;margin-left:-18px;opacity:10;">

            <h6 style="margin-left:-18px;color:#490206;">Born</h1>
            <p style="margin-top:-8.75%;margin-left:70px;">February 22nd, 1788 in Crown of the Kingdom of Poland</p>

            <h6 style="margin-left:-18px;color:#490206;margin-top:-13px;">Died</h1>
            <p style="margin-top:-8.75%;margin-left:70px;">September 21st, 1860 (aged 72) in German Confederation</p>

            <h6 style="margin-left:-18px;color:#490206;margin-top:-13px;">Genre</h1>
            <a href="#"><p style="margin-top:-8.75%;margin-left:70px;color:#034694;">Philosophy</p></a>

            
            <div class="bio-container" style="margin-top:5%;margin-left:-5%;">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae velit, et ab aperiam minima harum eligendi saepe in tenetur eius, soluta non sit sequi expedita facilis nisi neque rerum distinctio?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae velit, et ab aperiam minima harum eligendi saepe in tenetur eius, soluta non sit sequi expedita facilis nisi neque rerum distinctio?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae velit, et ab aperiam minima harum eligendi saepe in tenetur eius, soluta non sit sequi expedita facilis nisi neque rerum distinctio?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit laboriosam necessitatibus corporis ipsa, autem architecto doloremque quaerat? Mollitia asperiores eos exercitationem qui! Enim possimus quaerat aliquid provident eveniet cupiditate beatae.</p>
            </div>
            <a href="#" class="more-link" style="display:block;color:#034694;margin-left:-5%;">..more</a>


            <!-- Script to make the more button show more of the bio -->
            <script>
                const BioContainer = document.querySelector('.bio-container');
                const moreLink = document.querySelector(".more-link");

                // Hiden extra content initially
                BioContainer.classList.add('hide');


                moreLink.addEventListener('click',()=>{
                    // Toggle hide class on bio-container to show or hide the extra information
                    BioContainer.classList.toggle('hide');


                    // Update the text in more-link
                    if (BioContainer.classList.contains('hide')){
                        moreLink.textContent = '..more';
                    }else{
                        moreLink.textContent = 'less';
                    }
                });
            </script>

            <style>
                .hide{
                    height: 300px;
                    overflow: hidden;
                }
            </style>




        </div>


        <div class="col-4">


        </div>
    </div>
</div>


<div class="container">
    <div class="row" style="width:100%;margin-bottom:20px">
        <div class="col-12">
            <hr style="opacity:10;">
        </div>
    </div>
</div>


<!-- FIRST ROW -->
<div class="container" style="margin-bottom: 20px;">
    <div class="row" style="width:100%;">
        <div style="width:65%;word-wrap: break-word;">
            <div class="main-border" style="text-align:center;">
                <h5 style="margin-top: 5%;margin-bottom:5%;font-family: Script MT Bold;">Books(17)</h5>



                <img class="current-read" id="cover" src="pictures/playdead.jpg" alt="not found">



                <div style="display: flex; justify-content: center;margin-bottom: 10%;">
                    <button id='view-all' class="writereview" style="font-family: Script MT Bold;">View All</button>
                </div>
            </div>
        </div>


        <div  style="word-wrap: break-word;width:1%;">
        </div>


        <div  style="width:32%;word-wrap: break-word;">
            <div class="side-border" style="text-align:center;">
               
                <!-- code -->
                <div id="myCarousel" class="carousel slide " data-ride="carousel" data-interval="6000">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ul>


                <!-- Slideshow -->
                <div class="carousel-inner">












                    <div class="carousel-item active">
                        <h5 style="margin-top:10%;font-family: Script MT Bold;">Quotes</h5>
                            <div style="display: flex; justify-content: center;margin-top: 23%;">
                                <button id='view-all' class="writereview" style="font-family: Script MT Bold;">View All</button>
                            </div>
                        </div>
                        
                    </div>





                    <div class="carousel-item ">
                        <h5 style="margin-top:10%;margin-bottom:20%;font-family: Script MT Bold;">to-read</h5>

                        <script type="text/javascript">
                            google.charts.load('current', {'packages':['corechart']});
                            google.charts.setOnLoadCallback(drawChart);
                            

                            function drawChart() {

                                var data = google.visualization.arrayToDataTable([
                                ['Genre', 'Number of books'],
                                ['Action',     11],
                                ['Adventure',      2],
                                ['Drama',  2],
                                ['Mystery', 2],
                                ['Comedy',    7]
                                ]);

                                var options = {
                                chartArea:  {
                                    width: '100%',
                                    height: '100%'
                                }
                                };
                                
                                
                                
                                

                                
                                var chart1 = new google.visualization.PieChart(document.getElementById('piechart2'));
                                

                                
                                chart1.draw(data, options);
                                
                            }
                        </script>    




                        <div class="chart-container">
                            <div id="piechart2" style="height:300px;"></div>
                            <div style="display: flex; justify-content: center;margin-top: 5%;">
                                <button id='view-all' class="writereview" style="font-family: Script MT Bold;">Stats</button>
                            </div>
                        </div>
                        
                    </div>








                    <div class="carousel-item ">
                        <h5 style="margin-top:10%;margin-bottom:20%;font-family: Script MT Bold;">current-read</h5>

                        <script type="text/javascript">
                            google.charts.load('current', {'packages':['corechart']});
                            google.charts.setOnLoadCallback(drawChart);
                            

                            function drawChart() {

                                var data = google.visualization.arrayToDataTable([
                                ['Genre', 'Number of books'],
                                ['Action',     11],
                                ['Adventure',      2],
                                ['Drama',  2],
                                ['Mystery', 2],
                                ['Comedy',    7]
                                ]);

                                var options = {
                                chartArea:  {
                                    width: '100%',
                                    height: '100%'
                                }
                                };
                                

                                
                                var chart1 = new google.visualization.PieChart(document.getElementById('piechart3'));
                                

                                
                                chart1.draw(data, options);
                                
                            }
                        </script>    




                        <div class="chart-container">
                            <div id="piechart3" style="height:300px;"></div>
                            <div style="display: flex; justify-content: center;margin-top: 5%;">
                                <button id='view-all' class="writereview" style="font-family: Script MT Bold;">Stats</button>
                            </div>
                        </div>
                        
                    </div>







                    <!-- end code -->



            </div>
        </div>
    </div>
</div>



<!-- SECOND ROW -->

<div class="container" style="margin-bottom: 20px;margin-top:5%;">
    <div class="row" style="width:110%">
        <div  style="word-wrap: break-word;width:65%">
            <div class="main-border" style="text-align:center;">
                <h5 style="margin-top: 5%;margin-bottom:5%;font-family: Script MT Bold;">Read Recently</h5>
                <img class="recent-read" id="cover" src="pictures/playdead.jpg" alt="not found">
                <div style="display: flex; justify-content: center;margin-bottom: 10%;">
                    <button id='view-all' class="writereview" style="font-family: Script MT Bold;">View All</button>
                    <button id='reviews' style="margin-left:5px;font-family: Script MT Bold;" class="writereview">Reviews</button>
                    
                </div>
            </div>
        </div>


        <div  style="word-wrap: break-word;width:1%;">
        </div>


        <div  style="word-wrap: break-word;width:32%;">
            <div class="side-border" style="text-align:center;">
                <h5 style="margin:10%;font-family: Script MT Bold;">To-Read Pile</h5>
                <ul id="no-bulletpoints" style="text-align:left;margin-left: 10%;margin-bottom:10px;">
                    <li style="font-size:17px;"><strong>Harry Potter</strong></li>
                    <li>J.K.Rowling</li>
                </ul>
                
                <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">   


                <ul id="no-bulletpoints" style="text-align:left;margin-left: 10%;margin-bottom:10px;">
                    <li style="font-size:17px;"><strong> Broken Half</strong></li>
                    <li>Jessie Cave</li>
                </ul>

                <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">   


                <ul id="no-bulletpoints" style="text-align:left;margin-left: 10%;margin-bottom:10%;">
                    <li style="font-size:17px;"><strong> Sea Of Tranquility</strong></li>
                    <li>Emily St.John Mandel</li>
                </ul>
                
                <div style="display: flex; justify-content: left;margin-bottom: 10%;margin-left:10%;">
                    <button id='view-all' class="writereview" style="font-family: Script MT Bold;">View All</button>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- THIRD ROW -->
<div class="container" style="margin-bottom: 20px;margin-top:5%;">
    <div class="row" style="width:110%">
        <div  style="word-wrap: break-word;width:65%;">
            <div class="main-border" style="text-align:center;">
                <h5 style="margin-top: 5%;margin-bottom:5%;font-family: Script MT Bold;">Favorites</h5>
                <img class="favorites" id="cover" src="pictures/playdead.jpg" alt="not found">
                <div style="display: flex; justify-content: center;margin-bottom: 10%;">
                    <button id='view-all' class="writereview" style="font-family: Script MT Bold;">View All</button>
                </div>
            </div>
        </div>


        <div  style="word-wrap: break-word;width:1%">
        </div>


        <div style="word-wrap: break-word;width:32%;">
            <div class="side-border" style="text-align:center;">
                
                
            











                
            </div>
        </div>
    </div>
</div>