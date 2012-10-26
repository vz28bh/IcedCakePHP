<div class="makes view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->JqueryDialog->link(__('Edit Make'), array('action' => 'edit', $make['Make']['id']),array('data-callback'=>'reload_window')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Make'), array('action' => 'delete', $make['Make']['id']), null, __('Are you sure you want to delete # %s?', $make['Make']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Makes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->JqueryDialog->link(__('New Make'), array('action' => 'add'),array('data-callback'=>'reload_window')); ?> </li>
		<li><?php echo $this->Html->link(__('List Carmodels'), array('controller' => 'carmodels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->JqueryDialog->link(__('New Carmodel'), array('controller' => 'carmodels', 'action' => 'add'),array('data-callback'=>'reload_window')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('Make');?></h2>
		<dl class="list-horizontal">
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($make['Make']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($make['Make']['name']); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
	<div class="row">
		<div class="related span10 offset2">
			<hr>
			<h3><?php echo __('Related Carmodels');?></h3>
			<div class="btn-toolbar">
			<?php echo $this->JqueryDialog->link(__('New Carmodel'), array('controller' => 'carmodels', 'action' => 'add'), array('class'=>'btn btn-mini','data-callback'=>'reload_window'));?>			</div>
	<?php if (!empty($make['Carmodel'])):?>
			<table class="table">
				<tr>
							<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Make Id'); ?></th>
					<th class="actions"><?php echo __('Actions');?></th>
				</tr>
					<?php
		$i = 0;
		foreach ($make['Carmodel'] as $carmodel): ?>
		<tr>
			<td><?php echo $carmodel['id'];?></td>
			<td><?php echo $carmodel['name'];?></td>
			<td><?php echo $carmodel['make_id'];?></td>
			<td class="actions">
				<div class="btn-group">
				<?php echo $this->Html->link('<i class="icon-eye-open"></i>', array('controller' => 'carmodels', 'action' => 'view', $carmodel['id']), array('escape' => false, 'title' => __('View'), 'class' => 'btn btn-mini')); ?>
				<?php echo $this->JqueryDialog->link('<i class="icon-edit"></i>', array('controller' => 'carmodels', 'action' => 'edit', $carmodel['id']), array('escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-mini','data-callback'=>'reload_window')); ?>
				<?php echo $this->Html->link('<i class="icon-remove"></i>', array('controller' => 'carmodels', 'action' => 'delete', $carmodel['id']), array('escape' => false, 'title' => __('Delete'), 'class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $carmodel['id'])); ?>
				</div>
			</td>
		</tr>
	<?php endforeach; ?>
			</table>
	<?php endif; ?>

		</div>
	</div>
