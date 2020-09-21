<?php
/**
 * StatusLookupFixture
 *
 */
class StatusLookupFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'status_lookup';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'order_status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'order_status_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 16, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'order_status_id', 'unique' => 1)
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
			'order_status_id' => 1,
			'order_status_name' => 'Lorem ipsum do'
		),
	);

}
