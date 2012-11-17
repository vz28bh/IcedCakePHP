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
    <li><?php echo $this->Html->link(__d('users', 'New User Detail'), array('action' => 'add')); ?></li>
    <li><?php echo $this->Html->link(__d('users', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__d('users', 'New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
  </ul>
</div>
<div class="user_details index span10">
  <h2><?php echo __d('users', 'User Details'); ?></h2>
  <table class="table table-condensed table-striped">
    <tr>
      <th><?php echo $this->Paginator->sort('id'); ?></th>
      <th><?php echo $this->Paginator->sort('user_id'); ?></th>
      <th><?php echo $this->Paginator->sort('position'); ?></th>
      <th><?php echo $this->Paginator->sort('field'); ?></th>
      <th><?php echo $this->Paginator->sort('value'); ?></th>
      <th><?php echo $this->Paginator->sort('created'); ?></th>
      <th><?php echo $this->Paginator->sort('modified'); ?></th>
      <th class="actions"><?php echo __d('users', 'Actions'); ?></th>
    </tr>
    <?php
    foreach ($user_details as $user_detail):
      ?>
      <tr>
        <td>
          <?php echo $user_detail['UserDetail']['id']; ?>
        </td>
        <td>
          <?php echo $this->Html->link($user_detail['User']['id'], array('controller' => 'users', 'action' => 'view', $user_detail['User']['id'])); ?>
        </td>
        <td>
          <?php echo $user_detail['UserDetail']['position']; ?>
        </td>
        <td>
          <?php echo $user_detail['UserDetail']['field']; ?>
        </td>
        <td>
          <?php echo $user_detail['UserDetail']['value']; ?>
        </td>
        <td>
          <?php echo $user_detail['UserDetail']['created']; ?>
        </td>
        <td>
          <?php echo $user_detail['UserDetail']['modified']; ?>
        </td>
        <td class="actions">
          <?php echo $this->Html->link(__d('users', 'View'), array('action' => 'view', $user_detail['UserDetail']['id']), array('class' => 'btn btn-mini')); ?>
          <?php echo $this->Html->link(__d('users', 'Edit'), array('action' => 'edit', $user_detail['UserDetail']['id']), array('class' => 'btn btn-mini')); ?>
          <?php echo $this->Html->link(__d('users', 'Delete'), array('action' => 'delete', $user_detail['UserDetail']['id']), array('class' => 'btn btn-mini'), sprintf(__d('users', 'Are you sure you want to delete # %s?'), $user_detail['UserDetail']['id'])); ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <?php echo $this->element('paging'); ?>
  <?php echo $this->element('pagination'); ?>
</div>

