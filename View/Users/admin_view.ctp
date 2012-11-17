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
<?php echo $this->element('Users/admin_sidebar'); ?>
<div class="users view span10">
	<h2><?php echo __d('users', 'User'); ?></h2>
	<dl class="list-horizontal"><?php $i = 0;?>
		<dt><?php echo __d('users', 'Username'); ?></dt>
		<dd>
			<?php echo $user[$model]['username']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('users', 'Created'); ?></dt>
		<dd>
			<?php echo $user[$model]['created']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('users', 'Modified'); ?></dt>
		<dd>
			<?php echo $user[$model]['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
