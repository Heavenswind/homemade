<style type="text/css">

#left {
  height:100%;
}
#map-canvas {
    width: 41.66666667%;
    height:100%;
    position:fixed !important;
    left:0px;
    top:51px;/*top nav height*/
    bottom:60px; /*footer height*/
    overflow:hidden;
}

#discovery-results {
  top:50px;
  padding-left: 30px;
  
}
#dishes-container{
  margin-top: 20px;
}

.meal-card h4{
  font-size: 20px;
  margin-top: 0px;
  margin-bottom: 0px;
}

.meal-card .meal-name a {
  color: black;
}

.meal-card .data{
  padding-top: 10px;
}
.price{
  color: gray;
  font-size:20px;
}
.navbar{
  z-index: 10000;
  position: fixed;
  width:100%;
}
#footer{
  z-index: 1;
  position: fixed;
  bottom: 0;
  width:100%;
}

</style>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js"></script>
<?php echo $this->Html->css('rangeslider.css');
 ?>

<div id="map-canvas"></div>
<div class="container-fluid" id="main">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <!--map-canvas will be postioned here-->
        </div>
        <div class="col-md-7 col-md-7 col-sm-7 col-xs-7" id="discovery-results">
          <div class="">
            <h1>Nearby Dishes</h1>

            <label>Price</label>
            <input id="price_slider" class="form-control" type="range" min="1" max="100">
            
            <label>Distance</label>
            <input id="distance_slider"  type="range" min="0" max="10" step="0.5">

            <label>Rating</label>
            <input id="rating_slider" type="range" min="1" max="5" step="1">
          </div>

            <div id='dishes-container'>
               <!--<?php for ($x = 0; $x <= 6; $x++) {
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class='meal-card'>
                        <?php 
                        echo "<img src='" . "/img/dish/vegetarian_pizza.jpg" . "'/>";
                        ?>
                        <div class="row data">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h4 class="meal-name"><a href="#">Sloppy tacos</a><span class="price pull-right">$9.99</span></h4>
                            <h6 class="meal-cook"><a href="#">Joe Doe</a></h6>
                          </div>
                        </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                -->
            </div> 
       </div>
    </div>
        

    </div>
</div>
<?php 
echo $this->Html->script('rangeslider.min');
echo $this->Html->script('map_discovery');
?>




