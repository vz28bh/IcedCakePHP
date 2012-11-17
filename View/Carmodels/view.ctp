<div class="carmodels view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->JqueryDialog->link(__('Edit Carmodel'), array('action' => 'edit', $carmodel['Carmodel']['id']),array('data-callback'=>'reload_window')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Carmodel'), array('action' => 'delete', $carmodel['Carmodel']['id']), null, __('Are you sure you want to delete # %s?', $carmodel['Carmodel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Carmodels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->JqueryDialog->link(__('New Carmodel'), array('action' => 'add'),array('data-callback'=>'reload_window')); ?> </li>
		<li><?php echo $this->Html->link(__('List Makes'), array('controller' => 'makes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->JqueryDialog->link(__('New Make'), array('controller' => 'makes', 'action' => 'add'),array('data-callback'=>'reload_window')); ?> </li>
		<li><?php echo $this->Html->link(__('List Options'), array('controller' => 'options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->JqueryDialog->link(__('New Option'), array('controller' => 'options', 'action' => 'add'),array('data-callback'=>'reload_window')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('Carmodel');?></h2>
		<dl class="list-horizontal">
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($carmodel['Carmodel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($carmodel['Carmodel']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Make'); ?></dt>
		<dd>
			<?php echo $this->Html->link($carmodel['Make']['name'], array('controller' => 'makes', 'action' => 'view', $carmodel['Make']['id'])); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
	<div class="row">
		<div class="related span10 offset2">
			<hr>
			<h3><?php echo __('Related Options');?></h3>
			<div class="btn-toolbar">
			<?php echo $this->JqueryDialog->link(__('New Option'), array('controller' => 'options', 'action' => 'add'), array('class'=>'btn btn-mini','data-callback'=>'reload_window'));?>			</div>
	<?php if (!empty($carmodel['Option'])):?>
			<table class="table">
				<tr>
							<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
					<th class="actions"><?php echo __('Actions');?></th>
				</tr>
					<?php
		$i = 0;
		foreach ($carmodel['Option'] as $option): ?>
		<tr>
			<td><?php echo $option['id'];?></td>
			<td><?php echo $option['name'];?></td>
			<td class="actions">
				<div class="btn-group">
				<?php echo $this->Html->link('<i class="icon-eye-open"></i>', array('controller' => 'options', 'action' => 'view', $option['id']), array('escape' => false, 'title' => __('View'), 'class' => 'btn btn-mini')); ?>
				<?php echo $this->JqueryDialog->link('<i class="icon-edit"></i>', array('controller' => 'options', 'action' => 'edit', $option['id']), array('escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-mini','data-callback'=>'reload_window')); ?>
				<?php echo $this->Html->link('<i class="icon-remove"></i>', array('controller' => 'options', 'action' => 'delete', $option['id']), array('escape' => false, 'title' => __('Delete'), 'class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $option['id'])); ?>
				</div>
			</td>
		</tr>
	<?php endforeach; ?>
			</table>
	<?php endif; ?>

		</div>
	</div>
