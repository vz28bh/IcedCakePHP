<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="<?php echo $pluralVar; ?>">
  <?php echo "<?php echo \$this->JqueryValidation->createHorizontal('{$modelClass}');?>\n"; ?>
  <fieldset>
    <legend><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></legend>
    <?php
    echo "\t<?php\n";
    foreach ($fields as $field) {
      if (strpos($action, 'add') !== false && $field == $primaryKey) {
        continue;
      } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
        echo "\t\techo \$this->JqueryValidation->input('{$field}');\n";
      }
    }
    if (!empty($associations['hasAndBelongsToMany'])) {
      foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
        echo "\t\techo \$this->Form->input('{$assocName}');\n";
      }
    }
    echo "\t?>\n";
    ?>
    <div class="form-actions">
    <?php    
    echo "<?php echo \$this->Form->submit(__('Submit'),array('name'=>'ok','class'=>'btn btn-primary','div'=>array('class'=>'span1')));?>\n";
    echo "<?php echo \$this->Form->submit(__('Cancel'),array('name'=>'cancel','class'=>'btn btn-cancel cancel','div'=>array('class'=>'span1')));?>\n";
    ?>
    </div>
  </fieldset>
  <?php
  echo "<?php echo \$this->Form->end();?>\n";
  ?>
</div>
