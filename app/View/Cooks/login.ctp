
<style type="text/css">

body {
	text-align: center;
}
#wrap{
	background-image: url('/img/kitchen.jpg');
	background-size: cover;
}

h1, p {
	color: white;
}
.cooks form{
	margin-top: 82px;
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
<?php echo $this->Session->flash('auth'); ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="cooks form">
						<?php echo $this->Form->create('Cook', array('role' => 'form')); ?>
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
							<div class="col-lg-12">
								<input id="submit-btn" type="submit" value="Login" class="btn btn-primary btn-lg btn-block">
							</div>
							<div class="col-lg-12">
								<h3>Not a Chef?<?php echo $this->Html->link('Join', array('controller'=>'cooks', 'action' => 'join'));?></h3>
							</div>
					</div>
				</div>
			</div>
		</div>

