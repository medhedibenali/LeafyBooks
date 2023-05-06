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
            <div class="main-border" style="text-align:center;height:1054px;margin-bottom:10%;">
                <h5 style="margin-top: 5%;margin-bottom:5%;font-family: Script MT Bold;">Books(17)</h5>


                <!-- first image row -->
                <div style="display:flex;">
                    <figure style="width:33%;box-sizing:border-box;">
                        <img class="current-read" id="cover" src="pictures/playdead.jpg" alt="not found" style="margin-left:5%;margin-top:5%;margin-right:5%;">
                        <figcaption>This is the caption for the image.</figcaption>
                    </figure>

                    <figure style="width:33%;box-sizing:border-box;">
                        <img class="current-read" id="cover" src="pictures/playdead.jpg" alt="not found" style="margin-top:5%;margin-right:5%;">
                        <figcaption>This is the caption for the image.</figcaption>
                    </figure>

                    <figure style="width:33%;box-sizing:border-box;">
                        <img class="current-read" id="cover" src="pictures/playdead.jpg" alt="not found" style="margin-top:5%;margin-right:5%;">
                        <figcaption>This is the caption for the image.</figcaption>
                    </figure>
                            
                </div>


                
                <!-- second image row -->
                <div style="display:flex;margin-top:5%;">
                    <figure style="width:33%;box-sizing:border-box;">
                        <img class="current-read" id="cover" src="pictures/playdead.jpg" alt="not found" style="margin-left:5%;margin-top:5%;margin-right:5%;">
                        <figcaption>This is the caption for the image.</figcaption>
                    </figure>

                    <figure style="width:33%;box-sizing:border-box;">
                        <img class="current-read" id="cover" src="pictures/playdead.jpg" alt="not found" style="margin-top:5%;margin-right:5%;">
                        <figcaption>This is the caption for the image.</figcaption>
                    </figure style="width:33%;box-sizing:border-box;">

                    <figure style="width:33%;box-sizing:border-box;">
                        <img class="current-read" id="cover" src="pictures/playdead.jpg" alt="not found" style="margin-top:5%;margin-right:5%;">
                        <figcaption>This is the caption for the image.</figcaption>
                    </figure>
                            
                </div>


                



                <div style="display: flex; justify-content: center;margin-top: 8%;">
                    <button id='view-all' class="writereview" style="font-family: Script MT Bold;">View All</button>
                </div>
            </div>
        </div>


        <div  style="word-wrap: break-word;width:1%;">
        </div>


        <div  style="width:32%;word-wrap: break-word;">
            <div class="side-border" style="text-align:center;">
               
                <!-- Carousel -->
                <div id="myCarousel" class="carousel slide " data-ride="carousel" data-interval="1500">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ul>


                <!-- Slideshow -->
                <div class="carousel-inner">











                    <h5 style="margin-top:10%;margin-bottom:10%;font-family: Script MT Bold;">Quotes</h5>
                    <div class="carousel-item active">
                        <div style="word-wrap: break-word;width:101%;margin-top:5%;margin-left:-0.5%;height:447px;">
                            <div style="text-align:center;">
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
                
                                
                            </div>
                        </div>    
                    </div>





                    <div class="carousel-item ">
                    <div style="word-wrap: break-word;width:101%;margin-top:5%;margin-left:-0.5%;height:447px;">
                            <div style="text-align:center;">
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
                
                                
                            </div>
                        </div>
                    </div>








                    <div class="carousel-item ">
                    <div style="word-wrap: break-word;width:101%;margin-top:5%;margin-left:-0.5%;height:447px;">
                            <div style="text-align:center;">
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
                
                                
                            </div>
                        </div>
                    </div>







                    <!-- end Carousel -->

                <div style="display: flex; justify-content: center;margin-top:115%;">
                    <button id='view-all' class="writereview" style="font-family: Script MT Bold;">View All</button>
                </div>

            </div>
            





            <!-- second carousel -->
            <div  style="width:100%;word-wrap: break-word;">
            <div class="side-border" style="text-align:center;">
               
                <!-- Carousel -->
                <div id="myCarousel" class="carousel slide " data-ride="carousel" data-interval="1500">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ul>


                <!-- Slideshow -->
                <div class="carousel-inner">











                    <h5 style="margin-top:10%;margin-bottom:10%;font-family: Script MT Bold;">Followers</h5>
                    <div class="carousel-item active">
                        <div style="word-wrap: break-word;width:101%;margin-top:5%;margin-left:-0.5%;height:447px;">
                            <div style="text-align:center;">
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
                
                                
                            </div>
                        </div>    
                    </div>





                    <div class="carousel-item ">
                    <div style="word-wrap: break-word;width:101%;margin-top:5%;margin-left:-0.5%;height:447px;">
                            <div style="text-align:center;">
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
                
                                
                            </div>
                        </div>
                    </div>








                    <div class="carousel-item ">
                    <div style="word-wrap: break-word;width:101%;margin-top:5%;margin-left:-0.5%;height:447px;">
                            <div style="text-align:center;">
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
                
                                
                            </div>
                        </div>
                    </div>







                    <!-- end Carousel -->

                <div style="display: flex; justify-content: center;margin-top:115%;">
                    <button id='view-all' class="writereview" style="font-family: Script MT Bold;">View All</button>
                </div>

            </div>
            













        </div>
    </div>
</div>