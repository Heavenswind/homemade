<div class="dishes index">
	<h2><?php echo __('Dishes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('dish_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cook_id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('dish_name'); ?></th>
			<th><?php echo $this->Paginator->sort('dish_description'); ?></th>
			<th><?php echo $this->Paginator->sort('dish_price'); ?></th>
			<th><?php echo $this->Paginator->sort('is_featured'); ?></th>
			<th><?php echo $this->Paginator->sort('photo_path'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($dishes as $dish): ?>
	<tr>
		<td><?php echo h($dish['Dish']['dish_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($dish['Cook']['cook_id'], array('controller' => 'cooks', 'action' => 'view', $dish['Cook']['cook_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($dish['Category']['category_id'], array('controller' => 'categories', 'action' => 'view', $dish['Category']['category_id'])); ?>
		</td>
		<td><?php echo h($dish['Dish']['dish_name']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['dish_description']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['dish_price']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['is_featured']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['photo_path']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dish['Dish']['dish_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dish['Dish']['dish_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dish['Dish']['dish_id']), array(), __('Are you sure you want to delete # %s?', $dish['Dish']['dish_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Dish'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cooks'), array('controller' => 'cooks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cook'), array('controller' => 'cooks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
