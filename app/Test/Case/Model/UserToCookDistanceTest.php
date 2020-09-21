<?php
App::uses('UserToCookDistance', 'Model');

/**
 * UserToCookDistance Test Case
 *
 */
class UserToCookDistanceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_to_cook_distance',
		'app.user',
		'app.marker',
		'app.cook',
		'app.cook_status',
		'app.cook_rating',
		'app.dish',
		'app.category',
		'app.order',
		'app.status_lookup'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserToCookDistance = ClassRegistry::init('UserToCookDistance');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserToCookDistance);

		parent::tearDown();
	}

}
