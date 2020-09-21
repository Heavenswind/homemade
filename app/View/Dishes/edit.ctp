<style type="text/css">
body {
	text-align: center;
}
.input {
	text-align: left;
}

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
			<?php echo $this->Form->create('Dish', array('enctype'=>'multipart/form-data')); ?>
				<fieldset>
				<h1>Edit Dish</h1>
				<div style="display: none" class="col-lg-12">
					<?php
						echo $this->Form->input('cook_id', array('class'=>'hide'));
					?>
				</div>
				<div class="col-lg-12">
					<?php
						echo $this->Form->input('dish_id', array('class'=>'hide'));
					?>
				</div>
				<div class="col-lg-12">
					<?php
						echo $this->Form->input('category_id' , array('class' => 'form-control'));
					?>
				</div>
				<div class="col-lg-12">
					<?php
						echo $this->Form->input('dish_name' , array('class' => 'form-control'));
					?>
				</div>
				<div class="col-lg-12">
					<?php
						echo $this->Form->input('dish_price' , array('class' => 'form-control'));
					?>
				</div>
				<div class="col-lg-12">
					<?php
						echo $this->Form->input('dish_description', array('class' => 'form-control', 'type' => 'textarea'));
					?>
				</div>
				</fieldset>
				<div class="col-lg-12">
					<input id="submit-btn" type="submit" value="Save Dish" class="btn btn-primary btn-lg btn-block">
				</div>
				</form>
			</div>
		</div>
	</div>
</div>