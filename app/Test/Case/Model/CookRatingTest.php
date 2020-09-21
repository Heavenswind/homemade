<?php
App::uses('CookRating', 'Model');

/**
 * CookRating Test Case
 *
 */
class CookRatingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cook_rating',
		'app.cook',
		'app.marker',
		'app.user',
		'app.order',
		'app.dish',
		'app.category',
		'app.order_status',
		'app.cook_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CookRating = ClassRegistry::init('CookRating');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CookRating);

		parent::tearDown();
	}

}
