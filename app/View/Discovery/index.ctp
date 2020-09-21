<!-- Header -->
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Just like mom makes it!</h1>
                        <h3>Eat like you're at home.</h3>
                        
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                        
                               <p><?php 
                               echo $this->Html->link('Discover new tastes!', array('controller'=>'discovery', 'action'=>'discovery'), array('class'=>'btn btn-primary btn-lg')); ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="body-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                	<div class='body-message'>
                        <h1>Dishes we love</h1>
                    </div>
                    <div class="row">
					<?php foreach ($dishes as $dish): ?>
                        <div class="col-md-4 col-md-4 col-sm-6 col-xs-12">
    					  	<div class='meal-card'>
                                <?php 
                                echo "<img src='" . $dish['Dish']['photo_path'] . "'/>";
                                ?>
                                <div class="row data">
                                    <div class="col-md-12">
                                        <h3><?php echo $this->Html->link($dish['Dish']['dish_name'], array('controller' => 'dishes', 'action' => 'view', $dish['Dish']['dish_id'] )) ?></h3>
                                    </div>
                                    <div class="col-md-12">
                                        <?php echo $this->Html->link($dish['Cook']['first_name'] . ' ' . $dish['Cook']['last_name'], 
                                                    array('controller' => 'cooks', 'action' => 'profile', $dish['Cook']['cook_id'] ))?>    
                                    </div>
                                </div>
                            </div>    
    					  </div>
                          <?php unset($dish); ?>
                    <?php endforeach; ?>
					</div>
                </div>
            </div>
              <div class="row">
                <div class="col-lg-12">
                    <div class='body-message'>
                        <h1>Explore New cultures</h1>
                    </div>
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
                        <!-- More categories -->
                        <a class="category" href=<?php echo "'".$this->Html->url(array('controller'=>'categories', 'action'=>'index')) . "'";?>>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class='category-card' style="background-image: url('img/category/more.jpg'); background-size:cover;">
                                    <h3 class="vcenter">More</h3>
                                </div>    
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- /.container -->