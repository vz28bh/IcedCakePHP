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
<div class="users form span10">
  <?php echo $this->JqueryValidation->createVertical($model); ?>
  <fieldset>
    <legend><?php echo __d('users', 'Edit User'); ?></legend>
    <?php
    echo $this->Form->input('id');
    echo $this->JqueryValidation->input('username', array(
        'label' => __d('users', 'Username')));
    echo $this->JqueryValidation->input('email', array(
        'label' => __d('users', 'Email')));
    if (!empty($roles)) {
      echo $this->Form->input('role', array(
          'label' => __d('users', 'Role'), 'values' => $roles));
    }
    ?>
    <div class="checkbox">
      <?php
      echo $this->Form->input('is_admin', array(
          'div' => false,
          'label' => false));
      echo __d('users', 'Is Admin');
      ?>

    </div>
    <div class="checkbox">
      <?php
      # echo __d('users', 'Is Admin');
      echo $this->Form->input('active', array(
          'div' => false,
          'label' => false));
      echo __d('users', 'Active');
      ?>
    </div>
    <div class="form-actions">
      <?php
      echo $this->Form->end(array(
          'label' => __d('users', 'Submit'),
          'class' => 'btn btn-primary'
      ));
      ?>
    </div>
  </fieldset>

</div>
