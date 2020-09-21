<?php
/**
 * CookRatingFixture
 *
 */
class CookRatingFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'cook_rating';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'cook_rating_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'rating_5_star' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'rating_4_star' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'rating_3_star' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'rating_2_star' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'rating_1_star' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'rating_0_star' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'cook_rating_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'cook_rating_id' => 1,
			'rating_5_star' => 1,
			'rating_4_star' => 1,
			'rating_3_star' => 1,
			'rating_2_star' => 1,
			'rating_1_star' => 1,
			'rating_0_star' => 1
		),
	);

}
