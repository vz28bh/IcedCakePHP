<div class="row span2">
  <ul class="nav nav-list">
    <li class="nav-header"><?php echo __('Actions'); ?></li>
    <?php if (!$this->Session->read('Auth.User.id')) : ?>
      <li><?php echo $this->Html->link(__d('users', 'Login'), array('controller'=>'users','action' => 'login')); ?></li>
      <?php if (!empty($allowRegistration) && $allowRegistration) : ?>
        <li><?php echo $this->Html->link(__d('users', 'Register an account'), array('controller'=>'users','action' => 'add')); ?></li>
      <?php endif; ?>
    <?php else : ?>
      <li><?php echo $this->Html->link(__d('users', 'Logout'), array('controller'=>'users','action' => 'logout')); ?>
      <li><?php echo $this->Html->link(__d('users', 'My Account'), array('controller'=>'users','action' => 'edit')); ?>
      <li><?php echo $this->Html->link(__d('users', 'Change password'), array('controller'=>'users','action' => 'change_password')); ?>
      <?php endif ?>
      <?php if ($this->Session->read('Auth.User.is_admin')) : ?>
      <li><hr></li>
      <li><?php echo $this->Html->link(__d('users', 'List Users'), array('controller'=>'users','action' => 'index')); ?></li>
    <?php endif; ?>
  </ul>
</div>
