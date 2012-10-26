<div class="makes">
  <?php echo $this->JqueryValidation->createHorizontal('Make');?>
  <fieldset>
    <legend><?php echo __('Add Make'); ?></legend>
    	<?php
		echo $this->JqueryValidation->input('name');
	?>
    <div class="form-actions">
    <?php echo $this->Form->submit(__('Submit'),array('name'=>'ok','class'=>'btn btn-primary','div'=>array('class'=>'span1')));?>
<?php echo $this->Form->submit(__('Cancel'),array('name'=>'cancel','class'=>'btn btn-cancel cancel','div'=>array('class'=>'span1')));?>
    </div>
  </fieldset>
  <?php echo $this->Form->end();?>
</div>
