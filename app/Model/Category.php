<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Category $Category
 * @property Dish $Dish
 * @property Category $Category
 */
class Category extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'category';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'category_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'category_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Dish' => array(
			'className' => 'Dish',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
