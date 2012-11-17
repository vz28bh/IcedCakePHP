<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <?php echo $this->Html->link($cakeDescription, 'http://cakephp.org', array('class' => 'brand')); ?>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" style="" href="#">
              <?php echo __('Language'); ?><b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <?php foreach (Configure::read('Config.languages') as $key => $language): ?>
                <li><?php echo $this->Html->link($language, array('action' => 'language', 'new_language' => $key)); ?></li>
              <?php endforeach; ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>