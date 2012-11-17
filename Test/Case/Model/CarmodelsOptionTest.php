<?php
App::uses('CarmodelsOption', 'Model');

/**
 * CarmodelsOption Test Case
 *
 */
class CarmodelsOptionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.carmodels_option', 'app.carmodel', 'app.make', 'app.option');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CarmodelsOption = ClassRegistry::init('CarmodelsOption');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CarmodelsOption);

		parent::tearDown();
	}

}
