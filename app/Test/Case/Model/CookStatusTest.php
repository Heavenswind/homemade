<?php
App::uses('CookStatus', 'Model');

/**
 * CookStatus Test Case
 *
 */
class CookStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cook_status',
		'app.cook',
		'app.marker',
		'app.user',
		'app.order',
		'app.dish',
		'app.category',
		'app.order_status',
		'app.cook_rating'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CookStatus = ClassRegistry::init('CookStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CookStatus);

		parent::tearDown();
	}

}
