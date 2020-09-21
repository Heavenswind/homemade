<?php
/**
 * CookStatusFixture
 *
 */
class CookStatusFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'cook_status';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'cook_status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'cook_status_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 16, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'cook_status_id', 'unique' => 1)
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
			'cook_status_id' => 1,
			'cook_status_name' => 'Lorem ipsum do'
		),
	);

}
