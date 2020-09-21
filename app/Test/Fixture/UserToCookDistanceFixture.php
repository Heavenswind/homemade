<?php
/**
 * UserToCookDistanceFixture
 *
 */
class UserToCookDistanceFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'user_to_cook_distance';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'distance' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cook_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			
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
			'user_id' => 1,
			'distance' => 1,
			'cook_id' => 1
		),
	);

}
