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
				<h1>Add Dish</h1>

				
				<div  style="display: none" class="col-lg-12">
				
					<?php
						echo $this->Form->input('cook_id', array('class'=>'hide', 'type'=>'hidden', 'value' =>$this->Session->read('Auth.User')['cook_id']));
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
						echo $this->Form->input('dish_description' , array('class' => 'form-control', 'type' => 'textarea'));
					?>
				</div>
				<div class="col-lg-12">
					<?php
						echo $this->Form->input('photo_path', array('type'=>'file') );
					?>
				</div>
				</fieldset>
				<input id="submit-btn" type="submit" value="Add dish" class="btn btn-primary btn-lg btn-block">
				</form>
			</div>
		</div>
	</div>
</div>