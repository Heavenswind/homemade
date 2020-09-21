<style type="text/css">
.request-row, .deliver-row {
	border-bottom: 1px solid rgb(210, 210, 210);
	padding: 2px;
}

.record-image {
	width: 75px;
}

.record-dish {
	font-weight: normal;
}
.comment {
	font-weight: normal;
	color: gray;

}
#status {
	text-align: center;
}

</style>
<div style="padding-top: 30px;" class="container">
	<div class="chef-container"> 
		<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<?php 
			 $img = $cook['Cook']['cook_photo'];
			 if ($img) {
				 ?>
				<img class="cook_profile_img" src=<?php echo "'/" . $cook['Cook']['cook_photo'] . "'"; ?> />
				 <?php 
			 }
			 ?>
			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<h1><?php echo $cook['Cook']['first_name'] . ' ' . $cook['Cook']['last_name']; ?></h1>
			<h4><?php echo "About me" ?></h4>
				<p class='description'>
				<?php if ($cook['Cook']['cook_description']) {
					echo $cook['Cook']['cook_description'];
				} else {
					echo "write something about yourself.";
				} ?>
				
				</p>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
			<div class="pull-right">
				<?php 
					// The cook's current status
					$status = $cook['CookStatus']['cook_status_name'];

					// the class we will add to the toggle text
					$class;
					// The text of the toggle button
					$toggle_button;
					// The class of the toggle button
					$toggle_class = 'btn btn-block';
					// The cook is currently available
					if ($status == 'Available') {
						$class = 'online';
						// Button text and style
						$toggle_button = 'Not Available';
						$toggle_class = $toggle_class . ' btn-danger';
					} else { // The cook is currently not available
						$class = 'offline';
						// Button text and style
						$toggle_button = 'Available';
						$toggle_class = $toggle_class . ' btn-success';
					}
				 ?>
				<h5 id="status">Status: <span class=<?php echo "'" . $class . "'";?>><?php echo $status ?></span></h5>

				<?php echo $this->Html->link('Set to ' . $toggle_button , array('controller'=>'cooks', 'action'=>'updateStatus', $cook['Cook']['cook_id']), array('class'=>$toggle_class)); ?>

				<?php echo $this->Html->link('Edit Profile', array('controller'=>'cooks', 'action'=>'edit', $cook['Cook']['cook_id']), array('class'=>'pull-right btn btn-primary btn-block')); ?>

			<?php echo $this->Html->link('Add Dish', array('controller'=>'dishes', 'action'=>'add'), array('class'=>'pull-right btn btn-primary btn-block')); ?>

			</div>
		</div>
	</div>


	</div>

	<div class="row">
		<div class="col-lg-12">
			<h2 class="center">Your Dishes</h2>
		</div>
	</div>

	<div class="row">
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
						<?php echo $this->Html->link(__('Edit'), array('controller' => 'dishes', 'action' => 'edit', $dish['dish_id']), array('class'=>'btn btn-sm btn-primary')); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'dishes', 'action' => 'delete', $dish['dish_id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $dish['dish_name'])); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>	
	</div>
	
	<div class='row'>
		<!-- Dish Requests -->
		<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
			<h3 class="center">Dish Requests</h3>
			<div class="requests">

				<?php if(count($status_awaiting) == 0) {
					echo "<h5>No new orders</h5>";
				} else { ?>
				<?php foreach ($status_awaiting as $order): ?>
				<div data-ordertype="request" data-orderid=<?php echo "'" . $order['Order']['order_id'] . "'"; ?> class="request-row">
					<div class="row">
						<div class="col-lg-2">
							 <img class="record-image" src=<?php echo "'/" . $order['Dish']['photo_path'] . "'"; ?> />
						</div>
						<div class="col-lg-6">
							<h3><?php echo $order['User']['first_name'] . ' ' . $order['User']['last_name']; ?><h3>
							<h4 class="record-dish "><?php echo $order['Dish']['dish_name']; ?></h4>
							<p class="comment">Extra comments: <?php echo $order['Order']['order_comment']; ?></p>
							
						</div>
						<div class="col-lg-4">

							<?php echo $this->Form->create('Order', array('url' => array('controller' => 'orders', 
							                                                             'action' =>'updateStatus',
							                                                              $order['Order']['order_id'],
							                                                              Order::$status_deliver))); ?>
								<?php echo $this->Form->submit('Accept Order', array('class'=>'btn btn-primary btn-xs btn-block')); ?>
							<?php echo $this->Form->end(); ?>

							<?php echo $this->Form->create('Order', array('url' => array('controller' => 'orders', 
							                                                             'action' =>'updateStatus',
							                                                              $order['Order']['order_id'],
							                                                              -1))); ?>
								<?php echo $this->Form->submit('Decline Order', array('class'=>'btn btn-danger btn-xs btn-block')); ?>
							<?php echo $this->Form->end(); ?>

						
							
						</div>
					</div>
				</div>
				
				<?php endforeach; ?>
				<?php } ?>
			</div>
		</div>

		<!-- Currently Cooking -->
		<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
			<h3 class="center">Currently Making</h3>
			<div class="current">
				<?php if(count($status_deliver) == 0) {
					echo "<h5>No food to deliver</h5>";
				} else { ?>
				<?php foreach ($status_deliver as $order): ?>
				<div data-ordertype='deliver' data-orderid=<?php echo "'" . $order['Order']['order_id'] . "'"; ?> class="deliver-row">
					<div class="row">
						<div class="col-lg-2">
							 <img class="record-image" src=<?php echo "'/" . $order['Dish']['photo_path'] . "'"; ?> />

						</div>
						<div class="col-lg-6">
							<h3> <?php echo $order['User']['first_name'] . ' ' . $order['User']['last_name']; ?><h3>
							<h4 class="record-dish "><?php echo $order['Dish']['dish_name']; ?></h4>
							<p class="comment">Extra comments: <?php echo $order['Order']['order_comment']; ?></p>
							
						</div>
						<div class="col-lg-4">
								<?php echo $this->Form->create('Order', array('url' => array('controller' => 'orders', 
							                                                             'action' =>'updateStatus',
							                                                              $order['Order']['order_id'],
							                                                              Order::$status_complete))); ?>
								<?php echo $this->Form->submit('Deliver Order', array('class'=>'btn btn-primary btn-xs btn-block')); ?>
							<?php echo $this->Form->end(); ?>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
