<?php
/**
 * CarmodelsOptionFixture
 *
 */
class CarmodelsOptionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'carmodel_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'option_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'model_id' => array('column' => array('carmodel_id', 'option_id'), 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'carmodel_id' => 1,
			'option_id' => 1
		),
	);
}
