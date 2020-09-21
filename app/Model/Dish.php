<?php
App::uses( 'AppModel', 'Model' );
/**
 * Dish Model
 *
 * @property Dish $Dish
 * @property Dish $Dish
 * @property Cook $Cook
 * @property Category $Category
 * @property Order $Order
 */
class Dish extends AppModel {

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = 'dish';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'dish_id';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'dish_id';


	// File upload details
	public static $allowedTypes = array( "jpg", "png", "jpeg", "gif", "bmp" );// Allow certain file formats

	// Validation rules for a dish
	public $validate = array(
		'dish_name' => array(
			'rule' => 'notEmpty',
			'message' => 'Provide a name for your dish',
			'required' => true
		),
		'dish_description' => array(
		),
		'dish_price' => array(
			'rule' => array( 'money' ),
			'message' => 'Please supply a valid monetary amount.',
			'required' => true
		),
		'photo_path' => array(
			'rule' => array(
				'extension',
				array( 'gif', 'jpeg', 'png', 'jpg' )
			),
			'message' => 'Please supply a valid image.'
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed


	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Cook' => array(
			'className' => 'Cook',
			'foreignKey' => 'cook_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'dish_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	/**
	 * trigger function that gets called before any data get saved to the database
	 */
	public function beforeSave( $options = array() ) {
		$this->data['Dish']['is_featured'] = "N";
		if ( isset( $this->data['Dish']['photo_path'] ) && $this->data['Dish']['photo_path'] != '' ) {
			// Save the binary file
			$file = $this->data['Dish']['photo_path'];
			// Get the extension
			$extension = strtolower( pathinfo( basename( $file["name"] ), PATHINFO_EXTENSION ) );
			if ( in_array( $extension, Dish::$allowedTypes ) ) {
				// Generate a new path for the file
				$new_path = $this->webroot . 'img/dish/' . uniqid() . '.' . $extension;

				// Save file to dish
				move_uploaded_file( $this->data['Dish']['photo_path']['tmp_name'],  $new_path );
				// Update the database field with the fieldname
				$this->data['Dish']['photo_path'] = $new_path;
			}
		}

		if ( !isset( $this->data['Dish']['dish_description'] ) ) {

		}
		return true;
	}
}
