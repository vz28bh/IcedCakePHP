<script type="text/javascript">
  function some_crap(){}
</script>
<div class="options index row">
  <div class="actions span2">
    <ul class="nav nav-list">
      <li class="nav-header"><?php echo __('Actions'); ?></li>
      <li><?php echo $this->JqueryDialog->link(__('New Option'), array('action' => 'add'),array('data-callback'=>'reload_window')); ?></li>
      <li><?php echo $this->Html->link(__('List Carmodels'), array('controller' => 'carmodels', 'action' => 'index')); ?> </li>
<li><?php echo $this->JqueryDialog->link(__('New Carmodel'), array('controller' => 'carmodels', 'action' => 'add'),array('data-callback'=>'reload_window')); ?> </li>
    </ul>
  </div>
  <div class="span10">
    <h2><?php echo __('Options');?></h2>
    <table class="table table-condensed table-striped">
      <tr>
                  <th><?php echo $this->Paginator->sort('id');?></th>
                  <th><?php echo $this->Paginator->sort('name');?></th>
                <th class="actions"><?php echo __('Actions');?></th>
      </tr>
      <?php foreach ($options as $option): ?>
	<tr>
		<td><?php echo h($option['Option']['id']); ?>&nbsp;</td>
		<td><?php echo h($option['Option']['name']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-group">
				<?php echo $this->Html->link('<i class="icon-eye-open"></i>', array('action' => 'view', $option['Option']['id']), array('escape' => false, 'title' => __('View'), 'class' => 'btn btn-mini')); ?>
				<?php echo $this->JqueryDialog->link('<i class="icon-edit"></i>', array('action' => 'edit', $option['Option']['id']), array('escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-mini','data-callback'=>'reload_window')); ?>
				<?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('action' => 'delete', $option['Option']['id']), array('escape' => false, 'title' => __('Delete'), 'class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $option['Option']['id'])); ?>
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

