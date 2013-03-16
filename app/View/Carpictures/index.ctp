<script type="text/javascript">
  $(document).ready(function(){
	// Show pics one at a time
	$('a.lightbox').each(function(){
	  $(this).lightBox();
	});
  });
</script>
<style type="text/css">
  /* Must be above bootstrap navbar */
  #jquery-overlay {
	z-index: 1031 !important;
  }
  #jquery-lightbox {
	z-index: 1032 !important;
  }
</style>

<div class="carmodels index row">
  <div class="actions span2">
    <ul class="nav nav-list">
      <li class="nav-header"><?php echo __('Actions'); ?></li>
    </ul>
  </div>
  <div class="span10">
    <h2><?php echo __('Carpictures'); ?></h2>
    <table class="table table-condensed table-striped">
      <tr>
        <th><?php echo $this->Paginator->sort('id'); ?></th>
        <th><?php echo $this->Paginator->sort('Carmodel.name'); ?></th>
        <th><?php echo $this->Paginator->sort('path'); ?></th>
        <th><?php echo __('Image'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
      </tr>
	  <?php foreach ($carpictures as $carpicture): ?>
  	  <tr>
  		<td><?php echo h($carpicture['Carpicture']['id']); ?>&nbsp;</td>
  		<td><?php echo $this->Html->link($carpicture['Carmodel']['name'], array('controller' => 'carmodels', 'action' => 'view', $carpicture['Carmodel']['id'])); ?>&nbsp;</td>
  		<td><?php echo h($carpicture['Carpicture']['path']); ?>&nbsp;</td>
  		<td>
			<?php
			$thumbnail = $this->Html->image($carpicture['Carpicture']['thumbpath']);
			$image = Router::url($carpicture['Carpicture']['path'], true);
			echo $this->Html->link($thumbnail, $image, array('escape' => false, 'class' => 'lightbox'));
			?>&nbsp;
  		</td>
  		<td class="actions">
  		  <div class="btn-group">
			  <?php echo $this->Html->link('<i class="icon-eye-open"></i>', array('action' => 'view', $carpicture['Carpicture']['id']), array('escape' => false, 'title' => __('View'), 'class' => 'btn btn-mini')); ?>
			  <?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('action' => 'delete', $carpicture['Carpicture']['id']), array('escape' => false, 'title' => __('Delete'), 'class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $carpicture['Carpicture']['id'])); ?>
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

