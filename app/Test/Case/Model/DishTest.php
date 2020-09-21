<?php
App::uses('Dish', 'Model');

/**
 * Dish Test Case
 *
 */
class DishTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dish',
		'app.cook',
		'app.marker',
		'app.cook_status',
		'app.cook_rating',
		'app.order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Dish = ClassRegistry::init('Dish');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dish);

		parent::tearDown();
	}

}
