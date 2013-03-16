<?php
/**
 * Copyright 2010 - 2011, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2011, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php echo $this->element('Users/sidebar'); ?>
<div class="users index span10">
	<h2><?php echo __d('users', 'Users'); ?></h2>
	<table class="table table-condensed table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('username'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('users', 'Actions'); ?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		?>
		<tr>
			<td><?php echo $this->Html->link($user[$model]['username'], array('controller'=>'users','action' => 'view', $user[$model]['id'])); ?></td>
			<td><?php echo $user[$model]['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__d('users', 'View'), array('controller'=>'users','action' => 'view', $user[$model]['id']),array('class'=>'btn btn-mini')); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php echo $this->element('paging'); ?>
	<?php echo $this->element('pagination'); ?>
</div>

