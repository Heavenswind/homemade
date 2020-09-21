<style type="text/css">
.name a {
	color: black;
}
.name a:hover {
	text-decoration: none;
}

.description {
	margin-top: 30px;
}

#title {
	font-size: 48px;
	font-weight: normal;
}

.order_request {
	background-color: white;
	margin-top: 30px;
	padding: 10px;
}

#commentBox {
	font-size: 24px;

}

#orderButton {
}

.form {
	padding: 0px;
}


</style>


<div style="margin-top: 30px;">

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php echo "<img class='dish_jumbotron ' src='/" . $dish['Dish']['photo_path'] . "' />"; ?>
			</div>

		</div>
		<div class="row description">
			<div class="col-lg-8">
				<div class="dish-info">
					<!-- Dish name and price -->
					
						<h1 id="title"><?php echo $dish['Dish']['dish_name']; ?></h1>
						<h4 class="price"><?php echo '$' . $dish['Dish']['dish_price']; ?></h4>
					
					<!-- Dish description -->
						<pre><?php  echo $dish['Dish']['dish_description']; ?></pre>
					<!-- Request Button -->
				</div>

				<div class="order_request">
					<?php 
						$user = $this->Session->read('Auth.User');
						if (isset($user['user_id']) ) { 
					?>
					<h1>Order this dish</h1>

					<div class="orders form">
						<?php echo $this->Form->create('Order', array('controller' => 'orders', 'action' => 'add')); ?>
							
							
							<div style="display: none" class="col-lg-12">
								<?php
									echo $this->Form->input('cook_id', array('class'=>'hide', 'type'=>'hidden', 'value' => $dish['Cook']['cook_id']));
									echo $this->Form->input('user_id', array('class'=>'hide', 'type'=>'hidden', 'value' => $user['user_id']));
									echo $this->Form->input('dish_id', array('class'=>'hide', 'type'=>'hidden', 'value' => $dish['Dish']['dish_id']));
								?>
							</div>
							<?php 
								echo $this->Form->input('order_comment', array('class' => 'form-control', 'type' => 'textarea', 'placeholder' => 'Leave special comments you want the chef to know about.'));
							?>
						<?php echo $this->Form->submit("Place Order", array('class' => 'btn btn-primary btn-lg btn-block'));
							  echo $this->Form->end(); 
					   ?>
					</div>

					<?php 
						} else {
							if (!isset($user['cook_id'])) {
							echo $this->Html->link('Login / Sign up to place an order', array('controller' => 'users', 'action' => 'join'), array('class' => 'btn btn-primary btn-lg btn-block'));
							} else {
								echo '<style type="text/css">.order_request {display: none;}</style>';

							}
						}
					?>
				</div>
			</div>
			<div class="col-lg-4 ">
				<div class="chef-info">

				<!-- Chef Description -->
				<div class="chef-description">
					<div class="col-lg-12">
						<img src=<?php  echo "'/" . $dish["Cook"]["cook_photo"]. "'"?> />
						<h2 class="name"><?php echo $this->Html->link($dish['Cook']['first_name'] . ' ' . $dish['Cook']['last_name'], array('controller' =>'cooks', 'action' =>'profile' , $cook['Cook']['cook_id'])); ?></h2>

						<p>
							<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
							<?php echo $dish['Cook']['phone_number']; ?>
						</p>
						<?php  
							if (isset($cook_rating['CookRating']['rating'])) {
								$stars = $cook_rating['CookRating']['rating'];
								$class;
								if ($stars > 3) {
									$class = 'under_5_star_rating_color';
								} else {
									$class = 'under_3_star_rating_color';
								}
								echo "<h3 class='" . $class . "'>";
								for ($i=0; $i < $stars; $i++) { 
										echo "<span class='glyphicon glyphicon-star'></span>";
								}
								echo "</h3>";

							} else {
								echo "<h5> No Rating </h5>";
							}

							$status = $cook['CookStatus']['cook_status_name'];
							$class;
							if ($status == 'Available') {
								$class = 'online';
							} else {
								$class = 'offline';
							}

							echo "<h6 class='" . $class ."'> Status: $status </h6>";
							
						?>

					</div>
					
				</div>
					<pre><?php echo $cook['Cook']['cook_description']?></pre>
				</div>
			</div>
		</div>
	</div>
</div>


