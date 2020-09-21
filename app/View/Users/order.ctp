

<style type="text/css">
.info-box {
	background-color: white;
	padding: 10px;
	width: 100%;
}

.info-box h3 {
	margin-top: 0px;
}

.info-box h3 a, .info-box h4 a, .info-box h3 a:hover, .info-box h4 a:hover {
	color:black;
	text-decoration: none;
	font-weight: normal;
}
.row {
	margin-top: 30px;
}

.record-image {
	width: 100%;
}

.record-dish {
	font-weight: normal;
}

.star-rating {
  line-height:32px;
  font-size:1.25em;
  cursor: pointer;
  color: #dfb532;
}


</style>
<div class="container">
	<div class="row equal">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 class="center"> <?php echo $user['User']['first_name'] . ' '. $user['User']['last_name'];?>
			</h1>
		</div>
	</div>

	<!-- Requested Orders -->
	<div class="row equal">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="info-box">
				<h3>
					Requested Orders
				</h3>
				<?php 
					if ($requested_orders) {
				?>
						
				<?php foreach ($requested_orders  as $order): ?>
					<div class="row">
						<div class="col-lg-2">
							 <img class="record-image" src=<?php echo "'/" . $order['Dish']['photo_path'] . "'"; ?> />

						</div>
						<div class="col-lg-10">
							<h3> <?php echo $this->Html->link($order['Cook']['first_name'] . ' ' . $order['Cook']['last_name'], array('controller' => 'cooks', 'action' => 'profile', $order['Cook']['cook_id'])) ?><h3>
							<h4> <?php echo $this->Html->link($order['Dish']['dish_name'], array('controller' => 'dishes', 'action' => 'view', $order['Dish']['dish_id'])) ?><h4>
						</div>
					</div>
			<?php endforeach; ?>
			<?php  
			} else {
				echo "No Orders yet";
			}?>
			</div>
		</div>
		<!-- Deliver Orders -->
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="info-box">
				<h3>
					Accepted Orders
				</h3>
				<?php 
					if ($delivering_orders) {
				?>
						
				<?php foreach ($delivering_orders  as $order): ?>
					<div class="row">
						<div class="col-lg-2">
							 <img class="record-image" src=<?php echo "'/" . $order['Dish']['photo_path'] . "'"; ?> />

						</div>
						<div class="col-lg-10">
							<h3> <?php echo $this->Html->link($order['Cook']['first_name'] . ' ' . $order['Cook']['last_name'], array('controller' => 'cooks', 'action' => 'profile', $order['Cook']['cook_id'])) ?><h3>
							<h4> <?php echo $this->Html->link($order['Dish']['dish_name'], array('controller' => 'dishes', 'action' => 'view', $order['Dish']['dish_id'])) ?><h4>
						</div>
					</div>
			<?php endforeach; ?>
			<?php  
			} else {
				echo "No Orders yet";
			}?>
			</div>
		</div>
	</div>

<!-- Past Orders -->
	<div class="row equal">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<div  class="info-box">
				<h3>
					Past Orders
				</h3>
				<?php 
					if ($complete_orders) {
				?>
						
				<?php foreach ($complete_orders  as $order): ?>
					<div class="row">
						<div class="col-lg-2">
							 <img class="record-image" src=<?php echo "'/" . $order['Dish']['photo_path'] . "'"; ?> />
						</div>
						<div class="col-lg-10">
							<h3> <?php echo $this->Html->link($order['Cook']['first_name'] . ' ' . $order['Cook']['last_name'], array('controller' => 'cooks', 'action' => 'profile', $order['Cook']['cook_id'])) ?><h3>
							<h4> <?php echo $this->Html->link($order['Dish']['dish_name'], array('controller' => 'dishes', 'action' => 'view', $order['Dish']['dish_id'])) ?><h4>
						</div>
					</div>
			<?php endforeach; ?>
			<?php  
			} else {
				echo "No Orders yet";
			}?>
					
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<div  class="info-box">
				<h3>
					Chefs you eat from
				</h3>
				<?php 
					if ($linked_cooks_without_ratings) {
				?>
						
				<?php foreach ($linked_cooks_without_ratings  as $cook): ?>
				<?php $cook = $cook['hm_cook']; ?>
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
							 <img class="record-image" src=<?php echo "'/" . $cook['cook_photo'] . "'"; ?> />
						</div>

						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
							 <h5>Leave a rating for <?php echo $cook['first_name'] . ' ' . $cook['last_name']; ?></h5>
							 <form id="ratingForm" method="post" action=<?php echo "'/cooks/rate/" . $cook['cook_id'] . "'"; ?>>
							 	<select name="user_rating">
							 		<option value="rating_5_star">5 Stars</option>
							 		<option value="rating_4_star">4 Stars</option>
							 		<option value="rating_3_star">3 Stars</option>
							 		<option value="rating_2_star">2 Stars</option>
							 		<option value="rating_1_star">1 Star</option>
								</select>
								<input type="submit" value="Rate" class="btn btn-primary btn-xs">
							 </form>
						</div>
					</div>
			<?php endforeach; ?>
			<?php  
			} else {
				echo "No Chefs to rate yet.";
			}?>
					
			</div>
		</div>
	</div>
</div>



