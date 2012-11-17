<?php
App::uses('Make', 'Model');

/**
 * Make Test Case
 *
 */
class MakeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.make', 'app.carmodel', 'app.option', 'app.carmodels_option');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Make = ClassRegistry::init('Make');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Make);

		parent::tearDown();
	}

}
