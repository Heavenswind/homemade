<style type="text/css">
.chef-container{
	padding-top: 30px;
}
.price{
	color:rgb(194,194,194);
	margin: 5px;
}
</style>
<div style="margin-top: 30px;">
	<div class="container">
		<div class='chef-container'>
			<div class="row">
				<div class="col-lg-4 col-md-8 col-sm-6 col-xs-6">
					<?php 
					 $img = $cook['Cook']['cook_photo'];
					 if ($img) {
						 ?>
						 	<img class="cook_profile_img" src=<?php echo "'/" . $cook['Cook']['cook_photo'] . "'"; ?> />
						 <?php 
					 }
					 ?>
						
				</div>
				<div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
					<h1><?php echo $cook['Cook']['first_name'] . ' ' . $cook['Cook']['last_name']; ?></h1>
					<p>
						<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
						<?php echo $cook['Cook']['phone_number']; ?>
					</p>
					<p>
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						<a href=<?php echo '"mailto:' . $cook['Cook']['email'] .'">' . $cook['Cook']['email']; ?></a>
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
						?>
					<?php  if ($cook['Cook']['cook_description']) { ?>
						<h3><?php echo "About me" ?></h3>
						<p class='description'>
						<?php
							echo $cook['Cook']['cook_description'];
						}
						?>
					</p>
				</div>
			</div>
		</div>	
		<div class="row">
			<div class="col-lg-12">
				<h3><?php  echo $cook['Cook']['first_name'] . "'s Dishes"?></h3>
			</div>
		</div>

		<div class="row">
			<?php if (count($cook['Dish']) == 0) {
				echo '<div class="col-lg-12"><h4>No Dishes yet :(</h4></div>';
			} else { ?>
			<?php foreach ($cook['Dish'] as $dish): ?>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="meal-card">
						<?php echo "<img src='/" . $dish['photo_path'] . "'/>";?>
						<div class='row data'>
							<div class='col-lg-7'>
								<h4 class="dish_name">
									<?php echo $this->Html->link($dish['dish_name'], array('controller' =>'dishes', 'action' =>'view', $dish['dish_id'])); ?>
							</div>
							<div class='col-lg-5 btns'>
									<?php echo "<h2 class='price'>$" . $dish['dish_price'] . "</h2>"; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>	
			<?php } ?>
		</div>
	</div>
</div>


<script type="text/javascript">

//(function() {

	// // The action buttons
	// var $buttons = {
	// 	//'status' : jQuery('#statusButton')
	// 	'status' : 'dsd'
	// };

	// // The action buttons
	// var $functions = {
	// 	'status': function() {
	// 		console.log('dsds');
	// 		return;
	// 	}
	// }

	var viewmodels = [
		{'button': 'status',
		 'callback': function() {

		 }
		},
		{'button': 'deliver',
		 'callback': function() {

		 }
		}

	];

	// Attach all over our event listeners to our buttons
	viewmodels.foreach(function(model) {
		console.log(viewmodels[model]);
	});

	

//}());


</script>