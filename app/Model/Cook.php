<?php
App::uses( 'AppModel', 'Model' );
App::uses( 'CookRating', 'Model' );
App::uses( 'Marker', 'Model' );
App::uses( 'CookStatus', 'Model' );
App::uses( 'UserToCookDistance', 'Model' );
App::uses( 'Order', 'Model' );

/**
 * Cook Model
 *
 * @property Cook $Cook
 * @property Cook $Cook
 * @property Marker $Marker
 * @property CookStatus $CookStatus
 * @property CookRating $CookRating
 * @property Dish $Dish
 * @property Order $Order
 */
class Cook extends AppModel {

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = 'cook';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'cook_id';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'cook_id';

	// File upload details
	public static $allowedTypes = array( "jpg", "png", "jpeg", "gif", "bmp" );// Allow certain file formats

	// Validation Rules
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
		'phone_number' => array(
			'rule' => array( 'notEmpty' ),
			'message' => 'Phone number is required',
			'required' => true
		),
		'address' => array(
			'rule' => 'notEmpty',
			'message' => 'Address cannot be empty'
		),
		'cook_photo' => array(
			'rule' => array(
				'extension',
				array( 'gif', 'jpeg', 'png', 'jpg' )
			),
			'message' => 'Please supply a valid image.'
		)
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
		),
		'CookStatus' => array(
			'className' => 'CookStatus',
			'foreignKey' => 'cook_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CookRating' => array(
			'className' => 'CookRating',
			'foreignKey' => 'cook_rating_id',
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
		'Dish' => array(
			'className' => 'Dish',
			'foreignKey' => 'cook_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'cook_id',
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
			// insert
			// Marker
			$marker = $this->Marker;
			$marker->create( array( 'address' => $this->data['Cook']['address'] ) );
			$marker->save(); // Save the data to the database
			// Link the new marker id to the cook's location
			$this->data['Cook']['marker_id'] = $marker->id;


			// Set the cook's status to not not available by default
			$this->data['Cook']['cook_status_id'] = CookStatus::$status_not_available;

			// Create the cook's initial rating
			$cook_rating = $this->CookRating;
			$cook_rating->create( array( 'rating_5_star' => '0',
					'rating_4_star' => '0',
					'rating_3_star' => '0',
					'rating_2_star' => '0',
					'rating_1_star' => '0' ) );
			$cook_rating->save(); // Save the data to the database
			// Link the rating to the cook
			$this->data['Cook']['cook_rating_id'] = $cook_rating->id;


			// Photo operations
			if ( isset( $this->data['Cook']['cook_photo'] ) ) {
				$file = $this->data['Cook']['cook_photo'];
				$extension = strtolower( pathinfo( basename( $file["name"] ), PATHINFO_EXTENSION ) );
				if ( in_array( $extension, Cook::$allowedTypes ) ) {
					// Generate a new path for the file
					$new_path = $this->webroot . 'img/chef/' . uniqid() . '.' . $extension;

					// Save file to dish
					move_uploaded_file( $this->data['Cook']['cook_photo']['tmp_name'],  $new_path );
					// Update the database field with the fieldname
					$this->data['Cook']['cook_photo'] = $new_path;
				}
			}

			// hash and salt the password
			if ( isset( $this->data['Cook']['password'] ) ) {
				$salt = $this->genrandom( 8 );
				$this->data['Cook']['first_name'] = ucfirst( $this->data['Cook']['first_name'] );
				$this->data['Cook']['last_name'] = ucfirst( $this->data['Cook']['last_name'] );
				$this->data['Cook']['salt'] = $salt;
				$this->data['Cook']['hash'] = $this->generateSaltedHash( $this->data[$this->alias]['password'], $salt );
			}
			return true;
		} else {
			// update
		}
	}

	public function afterSave( $created, $options = array() ) {

		if ( $created ) {
			// After the marker is created we need to create the lookup distance for faster searches
			$UserToCookDistance = ClassRegistry::init( 'UserToCookDistance' );

			// Get the marker id, lat, and lng
			$marker_id = $this->data['Cook']['marker_id'];
			$inserted_marker = $this->Marker->find( 'first', array( 'conditions' => array( 'Marker.marker_id' => $marker_id ) ) );

			$lat = $inserted_marker['Marker']['lat'];
			$lng = $inserted_marker['Marker']['lng'];

			// Perform the query that'll get local cooks
			$user_markers = $this->Marker->getLocalUserMarkers( $lat, $lng, UserToCookDistance::$MAX_RADIUS, UserToCookDistance::$QUERY_LIMIT );

			// The new user id
			$cook_id = $this->data['Cook']['cook_id'];

			foreach ( $user_markers as $marker ) {

				// For each user that is within a location, create a quick lookup record
				//echo var_dump($marker);
				$user_id = $marker['hm_user']['user_id'];
				$distance = $marker['0']['distance'];
				$utcd = new UserToCookDistance();
				$utcd->save( array( 'user_id' => $user_id,
						'distance'=> $distance,
						'cook_id' => $cook_id ) );
			}
		}
		return true;
	}


	/**
	 * Get all the local cooks for a user with the specified parameters
	 *
	 * @param unknown $user_id the user's id
	 * @param unknown $radius  how far to search from
	 * @param unknown $price   the price range to search from
	 * @param unknown $rating  the rating of the cook to search for
	 */
	public function getLocalCooks( $user_id, $radius, $price, $rating ) {
		return $this->query( "SELECT `hm_cook`.cook_id,
			                        `hm_cook`.first_name,
			                        `hm_cook`.last_name,
			                        `hm_cook`.cook_description,
			                        `hm_cook`.cook_photo,
			                        `hm_user_to_cook_distance`.distance,
			                        `hm_marker`.lat,
			                        `hm_marker`.lng,
			                        `hm_dish`.dish_id,
			                        `hm_dish`.dish_name,
			                        `hm_dish`.dish_price,
			                        `hm_dish`.photo_path
			                    FROM `hm_user_to_cook_distance`
			              INNER JOIN `hm_cook` using(`cook_id`)
			              INNER JOIN `hm_marker` using(`marker_id`)
			              RIGHT JOIN `hm_dish` using (`cook_id`)
			              INNER JOIN `hm_cook_rating` using (`cook_rating_id`)
			    WHERE user_id = " .    $user_id . "
			      and distance < " .   $radius . "
			      and dish_price < " . $price . "
			      and IFNULL(ceil((((5 * rating_5_star)
			      	       + (4 * rating_4_star)
			      	       + (3 * rating_3_star)
			      	       + (2 * rating_2_star)
			      	       + (1 * rating_1_star))
                               / (rating_1_star
                               	+ rating_2_star
                               	+ rating_3_star
                               	+ rating_4_star
                               	+ rating_5_star))),0) <= " . $rating );
	}


	/**
	 * Get all the cooks for a user that have completed an order, but not yet rated that cook
	 *
	 * @param unknown $user_id the user's id
	 */
	public function getCooksWhoAreNotRated( $user_id ) {
		return $this->query( "SELECT `hm_cook`.cook_id,
			                         `hm_cook`.first_name,
			                         `hm_cook`.last_name,
			                         `hm_cook`.cook_photo
			                     FROM `hm_order`
			               INNER JOIN `hm_cook` using(cook_id)
			                LEFT JOIN `hm_cook_rating_details` using(cook_rating_id)
			               WHERE order_status_id = " . Order::$status_complete . "
			                 and `hm_order`.user_id = " . $user_id . "
			                 and `hm_cook_rating_details`.cook_rating_id is null
			            group by cook_id" );
	}


}
