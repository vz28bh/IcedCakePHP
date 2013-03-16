<div class="carmodelsOptions view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->JqueryDialog->link(__('Edit Carmodels Option'), array('action' => 'edit', $carmodelsOption['CarmodelsOption']['id']),array('data-callback'=>'reload_window')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Carmodels Option'), array('action' => 'delete', $carmodelsOption['CarmodelsOption']['id']), null, __('Are you sure you want to delete # %s?', $carmodelsOption['CarmodelsOption']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Carmodels Options'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->JqueryDialog->link(__('New Carmodels Option'), array('action' => 'add'),array('data-callback'=>'reload_window')); ?> </li>
		<li><?php echo $this->Html->link(__('List Carmodels'), array('controller' => 'carmodels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->JqueryDialog->link(__('New Carmodel'), array('controller' => 'carmodels', 'action' => 'add'),array('data-callback'=>'reload_window')); ?> </li>
		<li><?php echo $this->Html->link(__('List Options'), array('controller' => 'options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->JqueryDialog->link(__('New Option'), array('controller' => 'options', 'action' => 'add'),array('data-callback'=>'reload_window')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('Carmodels Option');?></h2>
		<dl class="list-horizontal">
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($carmodelsOption['CarmodelsOption']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Carmodel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($carmodelsOption['Carmodel']['name'], array('controller' => 'carmodels', 'action' => 'view', $carmodelsOption['Carmodel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Option'); ?></dt>
		<dd>
			<?php echo $this->Html->link($carmodelsOption['Option']['name'], array('controller' => 'options', 'action' => 'view', $carmodelsOption['Option']['id'])); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
