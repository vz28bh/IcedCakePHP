<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <?php echo $this->Html->link($cakeDescription, 'http://cakephp.org', array('class' => 'brand')); ?>
      <div class="nav-collapse">
        <ul class="nav">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" style="" href="#">
              Demos<b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li class="dropdown-submenu">
                <a class="dropdown-toggle" data-toggle="dropdown" style="" href="#">
                  Jquery<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="" href="<?php echo Router::url(array('controller'=>'carmodels','action' => 'date_demo')); ?>"><?php echo __('Date'); ?></a></li>
                  <li><a class="" href="<?php echo Router::url(array('controller'=>'carmodels','action' => 'autocomplete_demo')); ?>"><?php echo __('Autocomplete'); ?></a></li>
                   <li><a class="" href="<?php echo Router::url(array('controller'=>'carmodels','action' => 'ratings_demo')); ?>"><?php echo __('Ratings'); ?></a></li>
               </ul>
              </li>
            </ul>
          </li>
          <?php foreach ($allModels as $model): ?>
            <?php if ($model == 'AppModel') continue; ?>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" style="" href="#">
                <?php echo Inflector::humanize(Inflector::underscore($model)); ?><b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><?php echo $this->Html->link(__('List'), array('plugin'=>'','controller' => Inflector::pluralize(Inflector::underscore($model)), 'action' => 'index')); ?></li>
                <li><?php echo $this->JqueryDialog->link(__('Add'), array('plugin'=>'','controller' => Inflector::pluralize(Inflector::underscore($model)), 'action' => 'add'),array('data-callback'=>'reload_window')); ?></li>
              </ul>
            </li>
          <?php endforeach; ?>
        </ul>
        <form class="navbar-search pull-right" action="">
          <?php
          #-- An input for auto complete
          echo $this->Form->input('search_term', array(
              'placeholder'=>__('Search'),
              'type'=>'text',
              'class'=>'search-query span2',
              'data-search-url' => Router::url(array('action' => 'autocomplete_search')),
              'label' => false,
          ));
          ?>
        </form>
        <ul class="nav pull-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" style="" href="#">
              <?php echo __('Language'); ?><b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <?php foreach (Configure::read('Config.languages') as $key => $language): ?>
                <li><?php echo $this->Html->link($language, array('controller'=>'users','action' => 'language', 'new_language' => $key)); ?></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li><?php echo $this->Html->link(__('Logout'),array('controller'=>'users','action'=>'logout')); ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>