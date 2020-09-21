<?php
App::uses( 'AppModel', 'Model' );
App::uses( 'Cook', 'Model' );
App::uses( 'User', 'Model' );
App::uses( 'UserToCookDistance', 'Model' );
App::uses( 'HttpSocket', 'Network/Http' );
/**
 * Marker Model
 *
 * @property Cook $Cook
 * @property Marker $Marker
 * @property User $User
 * @property Marker $Marker
 */
class Marker extends AppModel {

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = 'marker';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'marker_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed



	/**
	 * hasOne associations
	 *
	 * @var array
	 */
	public $hasOne = array(
		'Cook' => array(
			'className' => 'Cook',
			'foreignKey' => 'marker_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'marker_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeSave( $options = array() ) {

		$user_address = $this->data['Marker']['address'];

		// Make a request to the geocoding lookup to get the coordinates
		$HttpSocket = new HttpSocket();
		$response = $HttpSocket->get( 'https://maps.googleapis.com/maps/api/geocode/json', array( 'address' => $user_address,
				'key' => 'AIzaSyASEYl71pGd9e3fIp8H3U9hlXIWxEK-p-c' ) );
		// google geocode api key, i know this is hardcoded, but ... time

		// Take the json response and turn it a php object
		$jsonResponse = json_decode( $response, true );

		// Get a basic count
		$len = count( $jsonResponse['results'] );


		// There is more than one location
		if ( $len > 0 ) {

			// Grab the first data from the array
			$json = $jsonResponse['results'][0];
			// Get the new formatted address
			$address = $json['formatted_address'];
			// Get the location
			$location = $json['geometry']['location'];
			// Get the latitude and longitude
			$lat = $location['lat'];
			$lng = $location['lng'];

			// Save the new data into the database
			$this->data['Marker']['address'] = utf8_encode( $address );
			$this->data['Marker']['lat'] = $lat;
			$this->data['Marker']['lng'] = $lng;
		} else {
			// there are no locations found
			// do something else
		}
		return true;
	}

	/**
	 * Gets all the local user markers from a given coordiate and radius
	 *
	 * @param unknown $lat    the latitude to check from
	 * @param unknown $lng    the longitude to check from
	 * @param unknown $radius the radius to check from the given lat and lng
	 * @param unknown $limit  how records should the query return
	 */
	public function getLocalUserMarkers( $lat, $lng, $radius, $limit ) {
		return $this->query( "SELECT marker_id,
		                             address ,
		                             user_id,
			                        ( 6371 * acos( cos( radians(" . $lat .") )
			                                     * cos( radians( lat ) )
			                                     * cos( radians( lng )
			                        	         - radians(" .$lng . ") )
		                                         + sin( radians(" . $lat . ") )
		                                         * sin(radians(lat)) ) )
			                        AS distance FROM hm_marker inner join hm_user using(marker_id)
			                        HAVING distance <" . $radius . " ORDER BY distance LIMIT 0 ," . $limit );
	}

	/**
	 * Gets all the local cook markers from a given coordiate and radius
	 *
	 * @param unknown $lat    the latitude to check from
	 * @param unknown $lng    the longitude to check from
	 * @param unknown $radius the radius to check from the given lat and lng
	 * @param unknown $limit  how records should the query return
	 */
	public function getLocalCookMarkers( $lat, $lng, $radius, $limit ) {
		return $this->query( "SELECT marker_id,
		                             address ,
		                             cook_id,
			                        ( 6371 * acos( cos( radians(" . $lat .") )
			                                     * cos( radians( lat ) )
			                                     * cos( radians( lng )
			                        	         - radians(" .$lng . ") )
		                                         + sin( radians(" . $lat . ") )
		                                         * sin(radians(lat)) ) )
			                        AS distance FROM hm_marker inner join hm_cook using(marker_id)
			                        HAVING distance <" . $radius . " ORDER BY distance LIMIT 0 ," . $limit );
	}


}
