<div class="carmodels">
  <?php echo $this->JqueryValidation->createHorizontal('Carmodel');?>
  <fieldset>
    <legend><?php echo __('Edit Carmodel'); ?></legend>
    	<?php
		echo $this->JqueryValidation->input('id');
		echo $this->JqueryValidation->input('name');
		echo $this->JqueryValidation->input('make_id');
		echo $this->Form->input('Option');
	?>
    <div class="form-actions">
    <?php echo $this->Form->submit(__('Submit'),array('name'=>'ok','class'=>'btn btn-primary','div'=>array('class'=>'span1')));?>
<?php echo $this->Form->submit(__('Cancel'),array('name'=>'cancel','class'=>'btn btn-cancel cancel','div'=>array('class'=>'span1')));?>
    </div>
  </fieldset>
  <?php echo $this->Form->end();?>
</div>
