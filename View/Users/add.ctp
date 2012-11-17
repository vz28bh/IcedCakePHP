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
  <h2><?php echo __d('users', 'Add User'); ?></h2>
  <?php echo $this->Session->flash('auth', array('element' => 'flash', 'params' => array('class' => 'alert alert-info'))); ?>
  <fieldset>
    <div class="well well-info">
      <?php echo __d('users','If your username is the same as OutLook, you can use the same password'); ?>
    </div>
    <?php
    echo $this->JqueryValidation->createHorizontal($model);
    echo $this->JqueryValidation->input('username', array(
        'label' => __d('users', 'Username')));
    echo $this->JqueryValidation->input('email', array(
        'label' => __d('users', 'E-mail'),
        'error' => array('isValid' => __d('users', 'Must be a valid email address'),
            'isUnique' => __d('users', 'An account with that email already exists'))));
    echo $this->JqueryValidation->input('password', array(
        'label' => __d('users', 'Password'),
        'type' => 'password'));
    echo $this->Form->input('temppassword', array(
        'label' => __d('users', 'Password (confirm)'),
        'type' => 'password'));
    $tosLink = $this->Html->link(__d('users', 'Terms of Service'), array('controller' => 'users', 'action' => 'tos'));
    ?>
    <label class="checkbox">
    <?php
    echo $this->Form->checkbox('tos', array(
        'div'=>false,
        'label' => false));
    echo __d('users', 'I have read and agreed to ') . $tosLink;
    ?>
    </label>
    <div class="form-actions">
      <?php
      echo $this->Form->end(array(
          'class' => 'btn btn-primary',
          'label' => __d('users', 'Submit')));
      ?>
    </div>
  </fieldset>
</div>
