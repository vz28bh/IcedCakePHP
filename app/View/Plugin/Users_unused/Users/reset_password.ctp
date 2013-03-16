<?php echo $this->element('Users/sidebar'); ?>
<div class="users form span10">
  <h2><?php echo __d('users', 'Reset your password'); ?></h2>
  <?php
  echo $this->JqueryValidation->createVertical($model, array(
      'url' => array(
          'action' => 'reset_password',
          $token)));
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
