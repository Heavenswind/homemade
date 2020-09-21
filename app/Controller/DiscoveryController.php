<?php

class DiscoveryController extends AppController {


	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow( 'index' );
	}

	/**
	 * the main page
	 */
	public function index() {
		$this->loadModel( 'Category' );
		$this->Category = ClassRegistry::init( 'Category' );
		$this->set( 'categories', $this->Category->find( 'all', array( 'group' => array( 'Category.Category_id', 'Category.category_id' ) ) ) );
		$this->Dish = ClassRegistry::init( 'Dish' );
		$this->set( 'dishes', $this->Dish->find( 'all' ) );
	}

	/**
	 * The discover / map page
	 */
	public function discovery() {
		$id = $this->Auth->user( 'user_id' );
		// if it is not a valid user, we will redirect him to the signup page
		if ( !$id ) {
			$this->redirect( array( 'controller' =>'users', 'action'=>'join' ) );
		}

	}


	/**
	 * Endpoint for our ajax map service to call to
	 */
	public function ajax() {
		// Get the user id
		$id = $this->Auth->user( 'user_id' );
		// Get the query parameters
		$radius = $this->request->query['radius'];
		$price = $this->request->query['price'];
		$rating = $this->request->query['rating'];
		// Load the cook model in
		$this->Cook = ClassRegistry::init( 'Cook' );
		// Run the sql query and pass in the parameters
		$local_cooks = $this->Cook->getLocalCooks( $id, $radius, $price, $rating );
		$this->layout = null;
		$this->set( compact( array( 'local_cooks' ) ) );

	}

}
