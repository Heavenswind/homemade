<?php
/**
 * CookFixture
 *
 */
class CookFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'cook';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'cook_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'hash' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'salt' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'phone_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 16, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'marker_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cook_status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cook_rating_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'cook_id', 'unique' => 1)
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
			'cook_id' => 1,
			'email' => 'Lorem ipsum dolor sit amet',
			'hash' => 'Lorem ipsum dolor sit amet',
			'salt' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'phone_number' => 'Lorem ipsum do',
			'marker_id' => 1,
			'cook_status_id' => 1,
			'cook_rating_id' => 1
		),
	);

}
