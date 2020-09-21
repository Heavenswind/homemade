<?php
/**
 * DishFixture
 *
 */
class DishFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'dish';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'dish_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'cook_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'category_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'dish_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'dish_description' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1024, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'dish_price' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'is_featured' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 16, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'photo_path' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 256, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'dish_id', 'unique' => 1)
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
			'dish_id' => 1,
			'cook_id' => 1,
			'category_id' => 1,
			'dish_name' => 'Lorem ipsum dolor sit amet',
			'dish_description' => 'Lorem ipsum dolor sit amet',
			'dish_price' => '',
			'is_featured' => 'Lorem ipsum do',
			'photo_path' => 'Lorem ipsum dolor sit amet'
		),
	);

}
