<?php
App::uses('Carmodel', 'Model');

/**
 * Carmodel Test Case
 *
 */
class CarmodelTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.carmodel', 'app.make', 'app.option', 'app.carmodels_option');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Carmodel = ClassRegistry::init('Carmodel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Carmodel);

		parent::tearDown();
	}

}
