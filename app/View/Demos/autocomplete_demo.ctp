<div class="myModels row">
  <div class="actions span2">
    <ul class="nav nav-list">
      <li class="nav-header">Actions</li>
    </ul>
  </div>
  <div class="myModels span10">
    <?php echo $this->JqueryValidation->createHorizontal('Carmodel'); ?>
    <fieldset>
      <legend><?php echo __('Find a car model'); ?></legend>
      <?php
      #-- An input for auto complete
      echo $this->Form->input('Carmodel.search_term', array(
          'data-search-url' => Router::url(array('controller'=>'carmodels','action' => 'autocomplete_search')),
          'data-search-target' => '#CarmodelId',
          'label' => __('Search Term'),
      ));
      #-- The list of assets
      echo $this->Form->input('id', array(
          'type' => 'select', 'size' => 6, 'multiple' => true,
          'label' => false,
          'data-select-all' => 1,
      ));
      ?>
      <div class="form-actions">
        <?php
        echo $this->Form->submit(__('Done'), array('class' => 'btn btn-primary'));
        ?>        
      </div>
    </fieldset>
    <?php echo $this->Form->end(); ?>
  </div>
</div>