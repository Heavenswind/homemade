<style type="text/css">
body {
	text-align: center;
}
.input {
	text-align: left;
}
:;
.input label {
	font-size: 18px;
}


#footer {
	display: none;
}

#submit-btn {
	margin-top: 20px;
}

</style>
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<div class="users form">
			<h1>Edit Your Profile</h1>
			<?php echo  $this->Form->create('Cook');?>
			<div style="display: none" class="col-lg-12">
					<?php
						echo $this->Form->input('cook_id', array('class'=>'hide'));
					?>
				</div>

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
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php 
					echo $this->Form->input('cook_description', array('class' => 'form-control', 'type' => 'textarea'));
					?>
				</div>
				<div class="col-lg-12">
					<input id="submit-btn" type="submit" value="Save Profile" class="btn btn-primary btn-lg btn-block">
				</div>		 
			</div>
		</div>
	</div>
</div>