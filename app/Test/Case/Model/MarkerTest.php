<?php
App::uses('Marker', 'Model');

/**
 * Marker Test Case
 *
 */
class MarkerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.marker',
		'app.cook',
		'app.cook_status',
		'app.cook_rating',
		'app.dish',
		'app.order',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Marker = ClassRegistry::init('Marker');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Marker);

		parent::tearDown();
	}

}
