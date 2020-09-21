<h1 style="text-align:center">Explore New Cultures</h1>
<div class="container">
	<div class="row">

		

		<?php foreach ($categories as $category): ?>
		    <a class="category" href=<?php echo "'".$this->Html->url(array('controller'=>'categories', 'action'=>'view', $category['Category']['category_id'])) . "'"; ?>>
		        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		            <div class='category-card' style="background-image: url('<?php echo $category['Category']['category_image'];?>'); background-size:cover;">
		                <h3 class="vcenter"><?php echo $category['Category']['category_name']; ?></h3>
		            </div>    
		          </div>
		    </a>
		    <?php unset($category); ?>
		<?php endforeach; ?>
	</div>
</div>