<div class="options">
  <?php echo $this->JqueryValidation->createHorizontal('Option');?>
  <fieldset>
    <legend><?php echo __('Edit Option'); ?></legend>
    	<?php
		echo $this->JqueryValidation->input('id');
		echo $this->JqueryValidation->input('name');
		echo $this->Form->input('Carmodel');
	?>
    <div class="form-actions">
    <?php echo $this->Form->submit(__('Submit'),array('name'=>'ok','class'=>'btn btn-primary','div'=>array('class'=>'span1')));?>
<?php echo $this->Form->submit(__('Cancel'),array('name'=>'cancel','class'=>'btn btn-cancel cancel','div'=>array('class'=>'span1')));?>
    </div>
  </fieldset>
  <?php echo $this->Form->end();?>
</div>
