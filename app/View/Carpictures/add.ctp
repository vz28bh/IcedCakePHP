<script type="text/javascript">
  $(document).ready(function(){
	$('#CarpictureAddForm').submit( function(){
	  var iframe_target = $(this).data('iframe-target');
	  var iframe_status_div = $(this).data('iframe-status-div');
	  $(this).prop('target', iframe_target);
	  $('#'+iframe_status_div).show();
	  $('#'+iframe_target).load( function() {
		alert('done!');
		var response = $(this).contents().find('body').html();
		$('#'+iframe_status_div).html(response);
		setTimeout(function() {
		  $('#'+iframe_status_div).fadeOut('fast');
		}, 3000);
	  });
	});
  });
</script>
<div class="carmodels">
  <?php echo $this->Session->flash('flash', array('element' => 'flash', 'params' => array('class' => 'alert alert-error'))); ?>
  <?php
  echo $this->Form->create('Carpicture', array('type' => 'file',
	  'data-iframe-status-div' => 'upload_status',
	  'data-iframe-target' => 'upload_iframe'));
  ?>
  <fieldset>
	<legend><?php echo __('Add Carpicture'); ?></legend>
	<?php echo $this->Form->hidden('carmodel_id'); ?>
	<div class="fileupload fileupload-new" data-provides="fileupload">
	  <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
		<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" />
	  </div>

	  <span class="btn btn-file">
		<span class="fileupload-new"><?php echo __('Select File'); ?></span>
		<span class="fileupload-exists"><?php echo __('Change'); ?></span>
		<?php echo $this->Form->input('fileName', array('type' => 'file', 'div' => false, 'label' => false)); ?>
	  </span>
	  <a href="#" class="btn fileupload-exists" data-dismiss="fileupload"><?php echo __('Remove'); ?></a>

	</div>
	<?php echo $this->Form->submit(__('Upload'), array('class' => 'btn')); ?>
  </fieldset>
  <?php echo $this->Form->end(); ?>
</div>
<div id="upload_status" class="alert alert-info" style="display:none;">
  <?php echo __('Loading...'); ?>
</div>
<iframe id="upload_iframe" name="upload_iframe" style="display:none;">
</iframe>
