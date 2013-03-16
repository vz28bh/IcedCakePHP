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
<div class="users form span10">
  <?php echo $this->JqueryValidation->createVertical($model); ?>
  <fieldset>
    <legend><?php echo __d('users', 'Edit User'); ?></legend>
    <?php
    echo $this->JqueryValidation->input('UserDetail.first_name');
    echo $this->JqueryValidation->input('UserDetail.last_name');
    echo $this->JqueryValidation->input('UserDetail.birthday');
    ?>
    <p>
      <?php echo $this->Html->link(__d('users', 'Change your password'), array('action' => 'change_password')); ?>
    </p>
    <div class="form-actions">
      <?php
      echo $this->Form->end(array(
          'label' => __d('users', 'Submit'),
          'class' => 'btn btn-primary',
      ));
      ?>
    </div>
  </fieldset>

</div>