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
<div class="actions span2">
  <ul class="nav nav-list">
    <li class="nav-header"><?php echo __('Actions'); ?></li>
    <li><?php echo $this->Html->link(__d('users', 'List Details'), array('action' => 'index')); ?></li>
    <li><?php echo $this->Html->link(__d('users', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link(__d('users', 'New User'), array('controller' => 'users', 'action' => 'add')); ?></li>
  </ul>
</div>
<div class="user_details form span10">
  <?php echo $this->Form->create('UserDetail'); ?>
  <fieldset>
    <legend><?php echo __d('users', 'Add User Detail'); ?></legend>
    <?php
    echo $this->Form->input('user_id');
    echo $this->Form->input('position');
    echo $this->Form->input('field');
    echo $this->Form->input('value');
    ?>
    <div class="form-actions">
      <?php
      echo $this->Form->end(array(
          'label' => __d('users', 'Submit'),
          'class' => 'btn btn-primary'));
      ?>
    </div>
  </fieldset>
</div>

