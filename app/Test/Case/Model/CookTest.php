<?php
App::uses('Cook', 'Model');

/**
 * Cook Test Case
 *
 */
class CookTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cook',
		'app.marker',
		'app.cook_status',
		'app.cook_rating',
		'app.dish',
		'app.order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cook = ClassRegistry::init('Cook');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cook);

		parent::tearDown();
	}

}
