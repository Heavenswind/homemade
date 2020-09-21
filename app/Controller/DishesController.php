<?php
App::uses( 'AppController', 'Controller' );
/**
 * Dishes Controller
 *
 * @property Dish $Dish
 */
class DishesController extends AppController {

	// Models this controller will need
	public $uses = array( 'Dish', 'Cook', 'CookRating' );

	/**
	 * view method for each single dish
	 *
	 * @param id      the dish_id
	 */
	public function view( $id = null ) {
		if ( !$this->Dish->exists( $id ) ) {
			throw new NotFoundException( __( 'Invalid dish' ) );
		}
		$options = array( 'conditions' => array( 'Dish.' . $this->Dish->primaryKey => $id ) );
		// Find the dish by its id
		$dish = $this->Dish->find( 'first', $options );
		// Find the cook who makes this dish
		$cook = $this->Cook->find( 'first', array( 'conditions' => array( 'Cook.cook_id' => $dish['Dish']['cook_id'] ) ) );
		$cook_rating = $this->CookRating->find( 'first', array( 'conditions' => array( 'CookRating.cook_rating_id' => $cook['Cook']['cook_rating_id'] ) ) );
		$this->set( compact( 'dish', 'cook', 'cook_rating' ) );

	}

	/**
	 * add method for a dish
	 */
	public function add() {
		if ( $this->request->is( 'post' ) ) {
			$this->Dish->create();
			if ( $this->Dish->save( $this->request->data ) ) {
				return $this->redirect( array( 'controller' => 'cooks', 'action' => 'dashboard', $this->Auth->user( 'cook_id' ) ) );
			}
		}
		//$cooks = $this->Dish->Cook->find('list');
		$categories = $this->Dish->Category->find( 'list', array( 'fields' => array( 'category_id', 'category_name' ) ) );
		$this->set( compact( 'cooks', 'categories' ) );
	}

	/**
	 * edit method
	 *
	 * @param id      the dish_id
	 */
	public function edit( $id = null ) {
		if ( !$this->Dish->exists( $id ) ) {
			throw new NotFoundException( __( 'Invalid dish' ) );
		}
		if ( $this->request->is( array( 'post', 'put' ) ) ) {
			if ( $this->Dish->save( $this->request->data ) ) {
				return $this->redirect( array( 'controller' => 'cooks', 'action' => 'dashboard', $this->Auth->user( 'cook_id' ) ) );
			}
		} else {
			$options = array( 'conditions' => array( 'Dish.' . $this->Dish->primaryKey => $id ) );
			$this->request->data = $this->Dish->find( 'first', $options );
		}
		$cooks = $this->Dish->Cook->find( 'list' );
		$categories = $this->Dish->Category->find( 'list', array( 'fields' => array( 'category_id', 'category_name' ) ) );
		$this->set( compact( 'cooks', 'categories' ) );
	}

	/**
	 * delete method
	 *
	 * @param id      the dish_id
	 */
	public function delete( $id = null ) {
		$this->Dish->id = $id;
		if ( !$this->Dish->exists() ) {
			throw new NotFoundException( __( 'Invalid dish' ) );
		}
		$this->request->allowMethod( 'post', 'delete' );
		if ( $this->Dish->delete() ) {
			return $this->redirect( $this->referer() );
		} else {
			return $this->redirect( $this->referer() );
		}
	}
}
