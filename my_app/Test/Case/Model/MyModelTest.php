<?php
App::uses('MyModel', 'Model');

/**
 * MyModel Test Case
 *
 */
class MyModelTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.my_model');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MyModel = ClassRegistry::init('MyModel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MyModel);

		parent::tearDown();
	}

}
