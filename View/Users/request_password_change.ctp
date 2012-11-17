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
  <h2><?php echo __d('users', 'Forgot your password?'); ?></h2>
  <div class="well"><?php echo __d('users', 'Please enter the email you used for registration and you\'ll get an email with further instructions.'); ?>
  </div>
  <?php
  echo $this->JqueryValidation->createVertical($model, array(
      'url' => array(
          'admin' => false,
          'action' => 'reset_password')));
  echo $this->JqueryValidation->input('email', array(
      'label' => __d('users', 'Your Email')));
  ?>
  <div class="form-actions">
  <?php
  echo $this->Form->end(array(
      'label' => __d('users', 'Submit'),
      'class' => 'btn btn-primary'
  ));
  ?>
  </div>
</div>
