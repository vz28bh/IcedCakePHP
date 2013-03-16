<?php
App::uses('Model', 'Model');

/**
 * Model Test Case
 *
 */
class ModelTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.model');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Model = ClassRegistry::init('Model');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Model);

		parent::tearDown();
	}

/**
 * testImplementedEvents method
 *
 * @return void
 */
	public function testImplementedEvents() {

	}
/**
 * testGetEventManager method
 *
 * @return void
 */
	public function testGetEventManager() {

	}
/**
 * testBindModel method
 *
 * @return void
 */
	public function testBindModel() {

	}
/**
 * testUnbindModel method
 *
 * @return void
 */
	public function testUnbindModel() {

	}
/**
 * testSetSource method
 *
 * @return void
 */
	public function testSetSource() {

	}
/**
 * testSet method
 *
 * @return void
 */
	public function testSet() {

	}
/**
 * testDeconstruct method
 *
 * @return void
 */
	public function testDeconstruct() {

	}
/**
 * testSchema method
 *
 * @return void
 */
	public function testSchema() {

	}
/**
 * testGetColumnTypes method
 *
 * @return void
 */
	public function testGetColumnTypes() {

	}
/**
 * testGetColumnType method
 *
 * @return void
 */
	public function testGetColumnType() {

	}
/**
 * testHasField method
 *
 * @return void
 */
	public function testHasField() {

	}
/**
 * testHasMethod method
 *
 * @return void
 */
	public function testHasMethod() {

	}
/**
 * testIsVirtualField method
 *
 * @return void
 */
	public function testIsVirtualField() {

	}
/**
 * testGetVirtualField method
 *
 * @return void
 */
	public function testGetVirtualField() {

	}
/**
 * testCreate method
 *
 * @return void
 */
	public function testCreate() {

	}
/**
 * testRead method
 *
 * @return void
 */
	public function testRead() {

	}
/**
 * testField method
 *
 * @return void
 */
	public function testField() {

	}
/**
 * testSaveField method
 *
 * @return void
 */
	public function testSaveField() {

	}
/**
 * testSave method
 *
 * @return void
 */
	public function testSave() {

	}
/**
 * testUpdateCounterCache method
 *
 * @return void
 */
	public function testUpdateCounterCache() {

	}
/**
 * testSaveAll method
 *
 * @return void
 */
	public function testSaveAll() {

	}
/**
 * testSaveMany method
 *
 * @return void
 */
	public function testSaveMany() {

	}
/**
 * testValidateMany method
 *
 * @return void
 */
	public function testValidateMany() {

	}
/**
 * testSaveAssociated method
 *
 * @return void
 */
	public function testSaveAssociated() {

	}
/**
 * testValidateAssociated method
 *
 * @return void
 */
	public function testValidateAssociated() {

	}
/**
 * testUpdateAll method
 *
 * @return void
 */
	public function testUpdateAll() {

	}
/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}
/**
 * testDeleteAll method
 *
 * @return void
 */
	public function testDeleteAll() {

	}
/**
 * testExists method
 *
 * @return void
 */
	public function testExists() {

	}
/**
 * testHasAny method
 *
 * @return void
 */
	public function testHasAny() {

	}
/**
 * testFind method
 *
 * @return void
 */
	public function testFind() {

	}
/**
 * testBuildQuery method
 *
 * @return void
 */
	public function testBuildQuery() {

	}
/**
 * testResetAssociations method
 *
 * @return void
 */
	public function testResetAssociations() {

	}
/**
 * testIsUnique method
 *
 * @return void
 */
	public function testIsUnique() {

	}
/**
 * testQuery method
 *
 * @return void
 */
	public function testQuery() {

	}
/**
 * testValidates method
 *
 * @return void
 */
	public function testValidates() {

	}
/**
 * testInvalidFields method
 *
 * @return void
 */
	public function testInvalidFields() {

	}
/**
 * testInvalidate method
 *
 * @return void
 */
	public function testInvalidate() {

	}
/**
 * testIsForeignKey method
 *
 * @return void
 */
	public function testIsForeignKey() {

	}
/**
 * testEscapeField method
 *
 * @return void
 */
	public function testEscapeField() {

	}
/**
 * testGetID method
 *
 * @return void
 */
	public function testGetID() {

	}
/**
 * testGetLastInsertID method
 *
 * @return void
 */
	public function testGetLastInsertID() {

	}
/**
 * testGetInsertID method
 *
 * @return void
 */
	public function testGetInsertID() {

	}
/**
 * testSetInsertID method
 *
 * @return void
 */
	public function testSetInsertID() {

	}
/**
 * testGetNumRows method
 *
 * @return void
 */
	public function testGetNumRows() {

	}
/**
 * testGetAffectedRows method
 *
 * @return void
 */
	public function testGetAffectedRows() {

	}
/**
 * testSetDataSource method
 *
 * @return void
 */
	public function testSetDataSource() {

	}
/**
 * testGetDataSource method
 *
 * @return void
 */
	public function testGetDataSource() {

	}
/**
 * testAssociations method
 *
 * @return void
 */
	public function testAssociations() {

	}
/**
 * testGetAssociated method
 *
 * @return void
 */
	public function testGetAssociated() {

	}
/**
 * testJoinModel method
 *
 * @return void
 */
	public function testJoinModel() {

	}
/**
 * testBeforeFind method
 *
 * @return void
 */
	public function testBeforeFind() {

	}
/**
 * testAfterFind method
 *
 * @return void
 */
	public function testAfterFind() {

	}
/**
 * testBeforeSave method
 *
 * @return void
 */
	public function testBeforeSave() {

	}
/**
 * testAfterSave method
 *
 * @return void
 */
	public function testAfterSave() {

	}
/**
 * testBeforeDelete method
 *
 * @return void
 */
	public function testBeforeDelete() {

	}
/**
 * testAfterDelete method
 *
 * @return void
 */
	public function testAfterDelete() {

	}
/**
 * testBeforeValidate method
 *
 * @return void
 */
	public function testBeforeValidate() {

	}
/**
 * testOnError method
 *
 * @return void
 */
	public function testOnError() {

	}
}
