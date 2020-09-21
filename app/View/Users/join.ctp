
<style type="text/css">

body {
	text-align: center;
}
#wrap{
	background-image: url('/img/eating.jpg');
	background-size: cover;
}

h1,h3, p {
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
<h1>Join and eat some of our home cooked dishes</h1>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="users form">
					
						<?php echo $this->Form->create('User', array('role' => 'form')); ?>
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
							<div class="col-lg-12">
								<?php
									echo $this->Form->input('email', array('class' => 'form-control'));
								?>
							</div>

							<div class="col-lg-12">
								<?php
									echo $this->Form->input('password', array('class' => 'form-control'));
								?>
							</div>
						
						
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<?php
								echo $this->Form->input('phone_number', array('class' => 'form-control'));
								?>
							</div>
							<div style="padding-bottom: 20px" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<?php 
								echo $this->Form->input('address', array('class' => 'form-control'));
								?>
							</div>


							<div class="col-lg-12">
								<input id="submit-btn" type="submit" value="Join" class="btn btn-primary btn-lg btn-block">
							</div>

									 
										

						<h3>Already a User?
						<?php echo $this->Html->link('Login', array('controller'=>'users', 'action' => 'login'));?></h3>
					</div>
				</div>
			</div>
		</div>

