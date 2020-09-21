<?php
App::uses( 'AppModel', 'Model' );
/**
 * CookRating Model
 *
 * @property Cook $Cook
 * @property CookRating $CookRating
 * @property CookRating $CookRating
 */
class CookRating extends AppModel {

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = 'cook_rating';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'cook_rating_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed
	// Virtual field for calulcating ratings
	public $virtualFields = array( 'rating' => 'ceil((((5 * rating_5_star) + (4 * rating_4_star) + (3 * rating_3_star) + (2 * rating_2_star) + (1 * rating_1_star)) / (rating_1_star + rating_2_star + rating_3_star + rating_4_star + rating_5_star)))' );
	
	/**
	 * hasOne associations
	 *
	 * @var array
	 */
	public $hasOne = array(
		'Cook' => array(
			'className' => 'Cook',
			'foreignKey' => 'cook_rating_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
