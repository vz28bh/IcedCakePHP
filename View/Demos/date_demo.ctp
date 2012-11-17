<div class="myModels row">
  <div class="actions span2">
    <ul class="nav nav-list">
      <li class="nav-header">Actions</li>

      <li><?php echo $this->Html->link(__('List My Models'), array('action' => 'index')); ?></li>
    </ul>
  </div>
  <div class="myModels span10">
    <?php echo $this->JqueryValidation->createHorizontal('MyModel'); ?>
    <fieldset>
      <legend><?php echo __('Pick a date'); ?></legend>
      <?php
      echo $this->Form->input('date', array(
          'type' => 'text',
          'class' => 'datefield',
          'data-img' => $this->Html->assetUrl('b_calendar.png', array('pathPrefix' => IMAGES_URL)),
          'error' => array(
              'date' => __('Enter a valid date in YYYY-MM-DD format'),
          ),
      ));
      ?>
      <?php
      echo $this->Form->input('datetime', array(
          'type' => 'text',
          'class' => 'datetimefield',
          'data-img' => $this->Html->assetUrl('b_calendar.png', array('pathPrefix' => IMAGES_URL)),
          'error' => array(
              'datetime' => __('Enter a valid date in YYYY-MM-DD HH:MM:SS format'),
          ),
      ));
      ?>
      <?php
      echo $this->Form->input('datetimestart', array(
          'type' => 'text',
          'class' => 'datetimerangefield',
          'data-img' => $this->Html->assetUrl('b_calendar.png', array('pathPrefix' => IMAGES_URL)),
          'data-datetimelimiter' => 'MyModelDatetimeend',
          'data-datetimeoption' => 'minDate',
          'error' => array(
              'datetimerange' => __('Enter a valid date in YYYY-MM-DD HH:MM:SS format'),
          ),
      ));
      ?>
      <?php
      echo $this->Form->input('datetimeend', array(
          'type' => 'text',
          'class' => 'datetimerangefield',
          'data-img' => $this->Html->assetUrl('b_calendar.png', array('pathPrefix' => IMAGES_URL)),
          'data-datetimelimiter' => 'MyModelDatetimestart',
          'data-datetimeoption' => 'maxDate',
          'error' => array(
              'datetimerange' => __('Enter a valid date in YYYY-MM-DD HH:MM:SS format'),
          ),
      ));
      ?>

      <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary', 'div' => array('class' => 'form-actions'))); ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
  </div>
</div>