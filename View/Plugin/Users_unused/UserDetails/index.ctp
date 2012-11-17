<?php
/**
 * Copyright 2010 - 2011, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2011, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="span2"></div>
<div class="details form index span10">
<?php
if (!empty($user_details)) {
  echo $this->Form->create('UserDetail');
  foreach ($user_details as $user_detail) {
    $options = array();
    $options['type'] = $user_detail['UserDetail']['input'];
    if ($user_detail['UserDetail']['input'] == 'checkbox') {
      if ($user_detail['UserDetail']['value'] == 1) {
        $options['checked'] = true;
      }
    }
    if ($user_detail['UserDetail']['input'] == 'text' || $user_detail['UserDetail']['input'] == 'textarea') {
      $options['value'] = $user_detail['UserDetail']['value'];
    }
    echo $this->Form->input($user_detail['UserDetail']['field'], ($options));
  }
  ?>
  <div class="form-actions">
    <?php
    echo $this->Form->end(array(
        'class' => 'btn btn-primary',
        'label' => __d('users', 'Submit')));
    ?>
  </div>
  <?php
}
  ?>
</div>
<?php
