<div class="carmodelsOptions">
  <?php echo $this->JqueryValidation->createHorizontal('CarmodelsOption');?>
  <fieldset>
    <legend><?php echo __('Edit Carmodels Option'); ?></legend>
    	<?php
		echo $this->JqueryValidation->input('id');
		echo $this->JqueryValidation->input('carmodel_id');
		echo $this->JqueryValidation->input('option_id');
	?>
    <div class="form-actions">
    <?php echo $this->Form->submit(__('Submit'),array('name'=>'ok','class'=>'btn btn-primary','div'=>array('class'=>'span1')));?>
<?php echo $this->Form->submit(__('Cancel'),array('name'=>'cancel','class'=>'btn btn-cancel cancel','div'=>array('class'=>'span1')));?>
    </div>
  </fieldset>
  <?php echo $this->Form->end();?>
</div>
