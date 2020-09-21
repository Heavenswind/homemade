<?php
/**
 * OrderFixture
 *
 */
class OrderFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'order';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'order_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cook_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'dish_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'order_date' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'order_comment' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 512, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'order_status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'order_id', 'unique' => 1)
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
			'order_id' => 1,
			'user_id' => 1,
			'cook_id' => 1,
			'dish_id' => 1,
			'order_date' => 'Lorem ipsum dolor sit amet',
			'order_comment' => 'Lorem ipsum dolor sit amet',
			'order_status_id' => 1
		),
	);

}
