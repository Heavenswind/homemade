<?php
App::uses('AppModel', 'Model');
/**
 * UserToCookDistance Model
 *
 * @property User $User
 * @property Cook $Cook
 */
class UserToCookDistance extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'user_to_cook_distance';


	public static $MAX_RADIUS;
	public static $QUERY_LIMIT;


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cook' => array(
			'className' => 'Cook',
			'foreignKey' => 'cook_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
// Constants for the map
// This can be changed in the future
UserToCookDistance::$MAX_RADIUS = 10;
UserToCookDistance::$QUERY_LIMIT = 20;