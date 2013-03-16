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
  <h2><?php echo __d('users', 'Change your password'); ?></h2>
  <div class="well">
    <?php echo __d('users', 'Please enter your old password because of security reasons and then your new password twice.'); ?>
  </div>
  <?php
  echo $this->JqueryValidation->createVertical($model, array('action' => 'change_password'));
  echo $this->JqueryValidation->input('old_password', array(
      'label' => __d('users', 'Old Password'),
      'type' => 'password'));
  echo $this->JqueryValidation->input('new_password', array(
      'label' => __d('users', 'New Password'),
      'type' => 'password'));
  echo $this->JqueryValidation->input('confirm_password', array(
      'label' => __d('users', 'Confirm'),
      'type' => 'password'));
  ?>
  <div class="form-actions">
    <?php
    echo $this->Form->end(array(
        'label' => __d('users', 'Submit'),
        'class' => 'btn btn-primary',
    ));
    ?>
  </div>
</div>