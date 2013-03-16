<script type="text/javascript">
	$(document).ready(function(){
		$('form.rating').stars({
			cancelShow:true,
			callback: function(ui, type, new_value) {
				var values = ui.$form.serializeArray();
				values.push({
					'name': 'rating',
					'value': new_value
				});
				values = jQuery.param(values);
				var msg = ui.$form.attr('update-msg');
				$(msg).removeClass('hidden');
				$(msg).show();
				$(msg).find('div.msg-default').show();
				$(msg).find('div.msg-result').hide();
				$.ajax({
					'type': 'POST',
					'dataType': 'json',
					'url': ui.$form.attr('action'),
					'data': values
				}).done(function(data) { 
					var overall_rating = ui.$form.attr('update-overall');
					if(overall_rating && data['overall_rating']){
						$(overall_rating).html(data['overall_rating']);
					}
					if(msg){
						$(msg).find('div.msg-default').hide();
						if(data['msg']) {
							$(msg).find('div.msg-result').show();
							$(msg).find('div.msg-result').html(data['msg']);
							window.setTimeout(function() {
								$(msg).addClass('hidden');
							}, 2000);
						} else {
							$(msg).addClass('hidden');
						}
					}
					if(data['user_rating'] && data['user_rating']>0) {
						ui.select(parseInt(data['user_rating']));
					}
				});
			}
		});
	})
</script>
<style type="text/css">
	form.rating > div.control-group {
		display: none;		
	}
</style>
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
				<th><?php echo __('Overall Rating'); ?></th>
				<th><?php echo __('Your Rating'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php $ctr = 0; ?>
			<?php foreach ($carmodels as $carmodel): ?>
				<tr>
					<td><?php echo h($carmodel['Carmodel']['id']); ?>&nbsp;</td>
					<td><?php echo h($carmodel['Carmodel']['name']); ?>&nbsp;</td>				
					<td>
						<?php echo $this->Html->link($carmodel['Make']['name'], array('controller' => 'makes', 'action' => 'view', $carmodel['Make']['id'])); ?>
					</td>
					<td>
						<?php $overall_div = 'overall-rating' . $carmodel['Carmodel']['id']; ?>
						<div id="<?php echo $overall_div; ?>">
							<?php
							echo $this->element('rating', array('rating' => $carmodel['Carmodel']['rating']));
							?>
						</div>
					</td>	
					<td>

						<?php
						$msg_div = 'rating-msg' . $carmodel['Carmodel']['id'];
						$rating = 0;
						if (!empty($carmodel['Rating'])) {
							$rating = $carmodel['Rating'][0]['value'];
						}
						echo $this->Rating->display(array(
							'item' => $carmodel['Carmodel']['id'],
							'type' => 'radio',
							'stars' => 5,
							'value' => $rating,
							'submit' => false,
							'createForm' => array(
								'id' => 'CarmodelsRatingsDemoForm' . $carmodel['Carmodel']['id'],
								'url' => array('action' => 'ratings_update', $carmodel['Carmodel']['id']),
								'class' => 'rating',
								'update-overall' => '#' . $overall_div,
								'update-msg' => '#' . $msg_div,
								)));
						?>	
						<div id="<?php echo $msg_div; ?>" class="label label-info hidden">
							<button class="close" data-dismiss="alert" type="button">×</button>
							<div class="msg-default"><?php echo __('One moment...'); ?></div>
							<div class="msg-result"></div>
						</div>
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


