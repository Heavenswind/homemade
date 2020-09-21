<?php
App::uses( 'AppModel', 'Model' );
/**
 * Order Model
 *
 * @property Order $Order
 * @property Order $Order
 * @property User $User
 * @property Cook $Cook
 * @property Dish $Dish
 * @property OrderStatus $OrderStatus
 */
class Order extends AppModel {

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = 'order';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'order_id';


	// Mappings from the database
	public static $status_awaiting = '1';
	public static $status_deliver = '2';
	public static $status_complete = '3';

	// Validation rules for a new order
	public $validate = array(
		'order_comment' => array(
			'rule' => array( 'maxLength', '512' ),
			'message' => 'Maximum 512 characters long',
			'allowEmpty' => true
		),
	);


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
		),
		'Dish' => array(
			'className' => 'Dish',
			'foreignKey' => 'dish_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StatusLookup' => array(
			'className' => 'StatusLookup',
			'foreignKey' => 'order_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeSave( $options = array() ) {
		if ( !$this->id && !isset( $this->data[$this->alias][$this->primaryKey] ) ) {
			// insert
			// Set the date of the order
			$this->data['Order']['order_date'] = time();
			// Set the status of the order to requested
			$this->data['Order']['order_status_id'] = self::$status_awaiting;
		} else {
			// update
		}

		return true;
	}
}
