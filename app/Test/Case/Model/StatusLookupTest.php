<?php
App::uses('StatusLookup', 'Model');

/**
 * StatusLookup Test Case
 *
 */
class StatusLookupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status_lookup',
		'app.order_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StatusLookup = ClassRegistry::init('StatusLookup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StatusLookup);

		parent::tearDown();
	}

}
