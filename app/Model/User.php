<?php
App::uses( 'AppModel', 'Model' );
App::uses( 'Marker', 'Model' );
/**
 * User Model
 *
 * @property User $User
 * @property User $User
 * @property Marker $Marker
 * @property Order $Order
 */
class User extends AppModel {

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = 'user';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'user_id';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'user_id';

	// Validation rules
	public $validate = array(
		'email' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Provide an email address'
			),
			'validEmailRule' => array(
				'rule' => array( 'email' ),
				'message' => 'Invalid email address'
			),
			'uniqueEmailRule' => array(
				'rule' => 'isUnique',
				'message' => 'Email already registered'
			)
		),
		'password' => array(
			'rule' => array( 'minLength', '8' ),
			'message' => 'Minimum 8 characters long',
			'required' => true
		),
		'first_name' => array(
			'rule' => '/^[a-zA-Z]*$/',
			'message' => 'Only letters',
			'required' => true
		),
		'last_name' => array(
			'rule' => '/^[a-zA-Z]*$/',
			'message' => 'Only letters',
			'required' => true
		),
		'address' => array(
			'rule' => 'notEmpty',
			'message' => 'Address cannot be empty'
		),
		'phone_number' => array(
			'rule' => array( 'notEmpty' ),
			'message' => 'Phone number is required',
			'required' => true
		),
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed


	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Marker' => array(
			'className' => 'Marker',
			'foreignKey' => 'marker_id',
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
			'foreignKey' => 'user_id',
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

	// Generate a randsom string
	function genrandom( $len, $salt = null ) {
		if ( empty( $salt ) ) {
			$salt = $this->salt( 'a', 'z' ). $this->salt( 'A', 'Z' ). $this->salt( '0', '9' );
		}

		$str = "";

		for ( $i = 0; $i < $len; $i++ ) {
			$index = rand( 0, strlen( $salt ) - 1 );
			$str .= $salt[$index];
		}

		return $str;
	}

	// Helper function to generate a salt
	function salt( $from, $end ) {
		$salt = '';

		for ( $no = ord( $from ); $no <= ord( $end ); $no++ ) {
			$salt .= chr( $no );
		}

		return $salt;
	}

	// Generate a password hash from a given password and salt
	static function generateSaltedHash( $password, $salt ) {
		return Security::hash( $password . $salt );
	}

	public function beforeSave( $options = array() ) {
		if ( !$this->id && !isset( $this->data[$this->alias][$this->primaryKey] ) ) {
			if ( isset( $this->data['User']['password'] ) ) {
				// Generate the hash and salt
				$salt = $this->genrandom( 8 );
				$this->data['User']['first_name'] = ucfirst( $this->data['User']['first_name'] );
				$this->data['User']['last_name'] = ucfirst( $this->data['User']['last_name'] );
				$this->data['User']['salt'] = $salt;
				$this->data['User']['hash'] = $this->generateSaltedHash( $this->data[$this->alias]['password'], $salt );
			}
		} else {
			// update
		}
		// Marker
		$marker = $this->Marker;
		$marker->create( array( 'address' => $this->data['User']['address'] ) );
		$marker->save(); // Save the data to the database
		// Link the new marker id to the cook's location
		$this->data['User']['marker_id'] = $marker->id;
		return true;
	}


	public function afterSave( $created, $options = array() ) {
		// After the marker is created we need to create the lookup distance for faster searches
		$UserToCookDistance = ClassRegistry::init( 'UserToCookDistance' );

		// Get the marker id, lat, and lng
		$marker_id = $this->data['User']['marker_id'];
		$inserted_marker = $this->Marker->find( 'first', array( 'conditions' => array( 'Marker.marker_id' => $marker_id ) ) );

		$lat = $inserted_marker['Marker']['lat'];
		$lng = $inserted_marker['Marker']['lng'];


		// Perform the query that'll get local cooks
		$cook_markers = $this->Marker->getLocalCookMarkers( $lat, $lng, UserToCookDistance::$MAX_RADIUS, UserToCookDistance::$QUERY_LIMIT );

		// The new user id
		$user_id = $this->data['User']['user_id'];

		foreach ( $cook_markers as $marker ) {

			// For each user that is within a location, create a quick lookup record
			//echo var_dump($marker);
			$cook_id = $marker['hm_cook']['cook_id'];
			$distance = $marker['0']['distance'];

			$utcd = new UserToCookDistance();

			$utcd->save( array( 'user_id' => $user_id,
					'distance'=> $distance,
					'cook_id' => $cook_id ) );
		}
		return true;
	}



}
