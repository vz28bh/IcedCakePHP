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
<div class="paging btn-group">
  <?php
  echo $this->Paginator->prev('< ' . __('previous'), array('class' => 'prev btn btn-mini'), null, array('class' => 'prev disabled btn btn-mini'));
  echo $this->Paginator->numbers(array('separator' => '', 'class' => 'btn btn-mini', 'currentClass' => 'active'));
  echo $this->Paginator->next(__('next') . ' >', array('class' => 'next btn btn-mini'), null, array('class' => 'next disabled btn btn-mini'));
  ?>
</div>
