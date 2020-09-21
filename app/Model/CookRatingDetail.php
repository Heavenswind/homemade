<?php
App::uses( 'AppModel', 'Model' );
/**
 * CookRatingDetail Model
 *
 * @property CookRating $CookRating
 * @property User $User
 */
class CookRatingDetail extends AppModel {

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'cook_rating_detail_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'CookRating' => array(
			'className' => 'CookRating',
			'foreignKey' => 'cook_rating_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
