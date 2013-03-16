<?php

/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('FormHelper', 'View/Helper');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class TwitterBootstrapHelper extends FormHelper {
  #public $helpers = array('Html', 'Session');

  /**
   * input Override of standard input to make TwitterBootstrap compatible
   * 
   * @param type $fieldName
   * @param type $options
   * @return type 
   */
  public function input($fieldName, $options = array()) {
	if (!isset($options['div']) || $options['div'] !== false) {
	  $options['between'] = '<div class=controls>';
	  $options['after'] = '</div>';
	  if (!isset($options['div']['class'])) {
		$options['div']['class'] = 'control-group';
	  } else {
		$options['div']['class'] .= ' control-group';
	  }
	} else {
	  unset($options['between']);
	  unset($options['after']);

	}

	if (!isset($options['label']) || $options['label'] !== false) {
	  if (isset($options['label']) && is_string($options['label'])) {
		$temp = array('text' => $options['label']);
		$options['label'] = $temp;
	  }
	  if (!isset($options['label']['class'])) {
		$options['label']['class'] = 'control-label';
	  } else {
		$options['label']['class'] .= ' control-label';
	  }
	}
	
	if(empty($options['error']['attributes']['wrap'])) {
	  $options['error']['attributes']['wrap'] = 'span';
	}
	if (!isset($options['error']['attributes']['class'])) {
	  $options['error']['attributes']['class'] = 'help-inline';
	} elseif (strpos($options['error']['attributes']['class'], 'help-inline') === false &&
			strpos($options['error']['attributes']['class'], 'help-block') === false) {
	  $options['error']['attributes']['class'] .= ' help-inline';
	}

	$options['format'] = array('before', 'label', 'between', 'input', 'error', 'after');
	return parent::input($fieldName, $options);
  }

}

