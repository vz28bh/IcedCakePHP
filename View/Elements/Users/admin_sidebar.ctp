<div class="row span2">
  <ul class="nav nav-list">
    <li class="nav-header"><?php echo __('Actions'); ?></li>
    <li><?php echo $this->Html->link(__d('users', 'Logout'), array('admin' => false, 'action' => 'logout')); ?>
    <li><?php echo $this->Html->link(__d('users', 'My Account'), array('admin' => false, 'action' => 'edit')); ?>
    <li><hr></li>
    <li><?php echo $this->Html->link(__d('users', 'Add Users'), array('admin' => true, 'action' => 'add')); ?></li>
    <li><?php echo $this->Html->link(__d('users', 'List Users'), array('admin' => true, 'action' => 'index')); ?></li>
    <li><hr></li>
    <li><?php echo $this->Html->link(__d('users', 'Frontend'), array('admin' => false, 'action' => 'index')); ?></li>
  </ul>
</div>