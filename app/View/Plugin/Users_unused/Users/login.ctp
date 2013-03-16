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
<div class="row span10">
  <h2><?php echo __d('users', 'Login x'); ?></h2>
  <?php echo $this->Session->flash('auth'); ?>
  <fieldset>
    <?php
    echo $this->Form->create($model, array(
        'action' => 'login',
        'id' => 'LoginForm'));
    echo $this->Form->input('username', array(
        'label' => __d('users', 'User Name')));
    echo $this->Form->input('password', array(
        'label' => __d('users', 'Password')));
    ?>

    <label class="checkbox">
      <?php
      echo $this->Form->checkbox('remember_me', array(
          'div' => false,
          'label' => false));
      echo __d('users', 'Remember Me');
      ?>
    </label>
    <div class="well well-small">
    <?php
    echo $this->Html->link(__d('users', 'I forgot my password'), array('action' => 'reset_password'));
    ?>
    </div>
    <div class="form-actions">
    <?php
    echo $this->Form->hidden('User.return_to', array(
        'value' => $return_to));
    echo $this->Form->end(array(
        'label' => __d('users', 'Submit'),
        'class' => 'btn btn-primary'));
    ?>
    </div>
  </fieldset>
</div>


