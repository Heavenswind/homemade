<?php
/**
 * MarkerFixture
 *
 */
class MarkerFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'marker';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'marker_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'address' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 256, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'lat' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 16, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'lng' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 16, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'marker_id', 'unique' => 1)
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
			'marker_id' => 1,
			'address' => 'Lorem ipsum dolor sit amet',
			'lat' => 'Lorem ipsum do',
			'lng' => 'Lorem ipsum do'
		),
	);

}
