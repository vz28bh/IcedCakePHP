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
	<?php
		echo $this->Form->create($model, array(
			'action' => 'search'));
		echo $this->Form->input('username', array(
			'label' => __d('users', 'Username')));
		echo $this->Form->input('email', array(
			'label' => __d('users', 'Email')));
		echo $this->Form->input('Profile.name', array(
			'label' => __d('users', 'Name')));
    ?>
  <div class="form-actions">
  <?php
		echo $this->Form->end(array(
            'label'=>__d('users', 'Search'),
            'class'=>'btn btn-primary'));
	?>
  </div>
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
			<td><?php echo $user[$model]['username']; ?></td>
			<td><?php echo $user[$model]['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__d('users', 'View'), array('action' => 'view', $user[$model]['id']),array('class'=>'btn btn-mini')); ?>
				<?php echo $this->Html->link(__d('users', 'Edit'), array('action' => 'edit', $user[$model]['id']),array('class'=>'btn btn-mini')); ?>
				<?php echo $this->Html->link(
					__d('users', 'Delete'),
					array('action' => 'delete', $user[$model]['id']),
					array('class'=>'btn btn-mini'),
					sprintf(__d('users', 'Are you sure you want to delete # %s?'), $user[$model]['id'])
				); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php echo $this->element('paging'); ?>
	<?php echo $this->element('pagination'); ?>
</div>
