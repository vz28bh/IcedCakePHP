<div class="carmodels index row">
  <div class="actions span2">
    <ul class="nav nav-list">
      <li class="nav-header"><?php echo __('Actions'); ?></li>
      <li><?php echo $this->JqueryDialog->link(__('New Carmodel'), array('action' => 'add'), array('data-callback' => 'reload_window')); ?></li>
      <li><?php echo $this->Html->link(__('List Makes'), array('controller' => 'makes', 'action' => 'index')); ?> </li>
      <li><?php echo $this->JqueryDialog->link(__('New Make'), array('controller' => 'makes', 'action' => 'add'), array('data-callback' => 'reload_window')); ?> </li>
      <li><?php echo $this->Html->link(__('List Options'), array('controller' => 'options', 'action' => 'index')); ?> </li>
      <li><?php echo $this->JqueryDialog->link(__('New Option'), array('controller' => 'options', 'action' => 'add'), array('data-callback' => 'reload_window')); ?> </li>
    </ul>
  </div>
  <div class="span10">
    <h2><?php echo __('Carmodels'); ?></h2>
    <table class="table table-condensed table-striped">
      <tr>
        <th><?php echo $this->Paginator->sort('id'); ?></th>
        <th><?php echo $this->Paginator->sort('name'); ?></th>
        <th><?php echo $this->Paginator->sort('make_id'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
      </tr>
      <?php foreach ($carmodels as $carmodel): ?>
        <tr>
          <td><?php echo h($carmodel['Carmodel']['id']); ?>&nbsp;</td>
          <td><?php echo h($carmodel['Carmodel']['name']); ?>&nbsp;</td>
          <td>
            <?php echo $this->Html->link($carmodel['Make']['name'], array('controller' => 'makes', 'action' => 'view', $carmodel['Make']['id'])); ?>
          </td>
          <td class="actions">
            <div class="btn-group">
              <?php echo $this->Html->link('<i class="icon-eye-open"></i>', array('action' => 'view', $carmodel['Carmodel']['id']), array('escape' => false, 'title' => __('View'), 'class' => 'btn btn-mini')); ?>
              <?php echo $this->JqueryDialog->link('<i class="icon-edit"></i>', array('action' => 'edit', $carmodel['Carmodel']['id']), array('escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-mini', 'data-callback' => 'reload_window')); ?>
              <?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('action' => 'delete', $carmodel['Carmodel']['id']), array('escape' => false, 'title' => __('Delete'), 'class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $carmodel['Carmodel']['id'])); ?>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    <div class="well">
      <?php
      echo $this->Paginator->counter(array(
          'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
      ));
      ?>    </div>

    <div class="paging btn-group">
      <?php
      echo $this->Paginator->prev('< ' . __('previous'), array('class' => 'prev btn'), null, array('class' => 'prev disabled btn'));
      echo $this->Paginator->numbers(array('separator' => '', 'class' => 'btn', 'currentClass' => 'active'));
      echo $this->Paginator->next(__('next') . ' >', array('class' => 'next btn'), null, array('class' => 'next disabled btn'));
      ?>
    </div>
  </div>
</div>

