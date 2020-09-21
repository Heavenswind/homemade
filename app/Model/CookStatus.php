<?php
App::uses( 'AppModel', 'Model' );
/**
 * CookStatus Model
 *
 * @property Cook $Cook
 * @property CookStatus $CookStatus
 * @property CookStatus $CookStatus
 */
class CookStatus extends AppModel {

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = 'cook_status';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'cook_status_id';


	// The possible status for the cook
	public static $status_available;
	public static $status_not_available;


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * hasOne associations
	 *
	 * @var array
	 */
	public $hasOne = array(
		'Cook' => array(
			'className' => 'Cook',
			'foreignKey' => 'cook_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}

// These are mapped from the database
CookStatus::$status_available = 1;
CookStatus::$status_not_available = 2;
