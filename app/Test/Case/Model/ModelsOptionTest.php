<?php
App::uses('ModelsOption', 'Model');

/**
 * ModelsOption Test Case
 *
 */
class ModelsOptionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.models_option', 'app.model', 'app.option');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ModelsOption = ClassRegistry::init('ModelsOption');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ModelsOption);

		parent::tearDown();
	}

}
