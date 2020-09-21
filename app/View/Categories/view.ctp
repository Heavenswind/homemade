<style type="text/css">
	.category-container{
		margin-top: 50px;
	}
</style>
<div class="container">	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="center"><?php echo h($category['Category']['category_name']) . ' Dishes'; ?></h1>
		</div>
	</div>
	<div class="category-container">
		<div class="row">
			<?php foreach($related_dishes as $dish): ?>
				<div class="col-md-4 col-md-4 col-sm-6 col-xs-12">
				  	<div class='meal-card'>
			            <?php echo "<img src='/" . $dish['Dish']['photo_path'] . "'/>";?>
			            <div class="row data">
			                <div class="col-md-12">
			                    <h3><?php echo $this->Html->link($dish['Dish']['dish_name'], array('controller' => 'dishes', 'action' => 'view', $dish['Dish']['dish_id'] )) ?></h3>
			                </div>
			            </div>
			        </div>    
				</div>
			<?php unset($dish); ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>






