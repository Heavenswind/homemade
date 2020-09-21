
<style type="text/css">

body {
	text-align: center;
}
#wrap{
	background-image: url('/img/kitchenchef.jpg');
	background-size: cover;
}
h1, h3, p {
	color: white;
}

.navbar-default {
	background-color: transparent;
}

.input {
	text-align: left;
	color: white;
}

.input label {
	color: white;
	font-size: 18px;
}


#footer {
	display: none;
}

#submit-btn {
	margin-top: 20px;
}




</style>
<h1>Become one of our Homemade's Chefs</h1>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="cooks form">
					
						<?php echo $this->Form->create('Cook', array('role' => 'form', 'enctype'=>'multipart/form-data')); ?>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<?php
								echo $this->Form->input('first_name', array('class' => 'form-control'));
								?>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<?php 
								echo $this->Form->input('last_name', array('class' => 'form-control'));
								?>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<?php
									echo $this->Form->input('email', array('class' => 'form-control'));
								?>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<?php
									echo $this->Form->input('password', array('class' => 'form-control'));
								?>
							</div>
						
						
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<?php
								echo $this->Form->input('phone_number', array('class' => 'form-control'));
								?>
							</div>
							<div style="padding-bottom: 20px" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<?php 
								echo $this->Form->input('address', array('class' => 'form-control'));
								?>
							</div>

							<div style="padding-bottom: 20px" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<?php 
								echo $this->Form->input('cook_photo', array('class' => 'form-control', 'type'=>'file', 'id'=>'upload_btn'));
								?>
							</div>

							<div class="col-lg-12">
								<input id="submit-btn" type="submit" value="Join" class="btn btn-primary btn-lg btn-block">
							</div>
							<div class="col-lg-12">
								<h3>Already a chef?<?php echo $this->Html->link('Login', array('controller'=>'cooks', 'action' => 'login'));?></h3>
							</div>
					</div>
					
				</div>
			</div>
		</div>

