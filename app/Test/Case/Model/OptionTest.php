<?php
App::uses('Option', 'Model');

/**
 * Option Test Case
 *
 */
class OptionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.option', 'app.carmodel', 'app.make', 'app.carmodels_option');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Option = ClassRegistry::init('Option');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Option);

		parent::tearDown();
	}

}
