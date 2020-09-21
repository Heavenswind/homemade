<?php
App::uses( 'AppController', 'Controller' );

/**
 * Users Controller
 *
 * @property User $User
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

	// Models this controller will need
	var $uses = array( 'Order', 'User', 'Cook' );

	// Function called before the page request
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow( 'join', 'login', 'view', 'logout' );
		$this->Auth->deny( 'edit' );

	}

	/**
     * Order function
     * called when a new order is being placed
     * @param $user_id the user_id 
	 */
	public function order( $user_id = null ) {
		if ( !$user_id ) {
			throw new NotFoundException( __( 'Invalid user' ) );
		}

		$user = $this->User->findByUserId( $user_id );
		$this->loadModel( 'Order' );
		// Get all the orders that are requested
		$requested_orders = $this->Order->find( 'all', array( 'conditions' => array( 'Order.order_status_id' => Order::$status_awaiting, 'Order.user_id' => $user_id ) ) );
		// Get all the orders that are currently being cooked
		$delivering_orders = $this->Order->find( 'all', array( 'conditions' => array( 'Order.order_status_id' => Order::$status_deliver, 'Order.user_id' => $user_id ) ) );
		// Get all the orders that are completed
		$complete_orders = $this->Order->find( 'all', array( 'conditions' => array( 'Order.order_status_id' => Order::$status_complete, 'Order.user_id' => $user_id ) ) );
		$this->loadModel( 'Cook' );
		// longest name for a variable
		// Find all the cooks that the user had made an order to, but not yet rated
		$linked_cooks_without_ratings = $this->Cook->getCooksWhoAreNotRated($user_id);
		if ( !$user_id ) {
			throw new NotFoundException( __( 'Invalid user' ) );
		}
		$this->set( compact( 'user', 'requested_orders', 'delivering_orders', 'complete_orders', 'linked_cooks_without_ratings' ) );
	}




	/**
	 * Join / Signup view function
	 */
	public function join() {
		if ( $this->request->is( 'post' ) ) {
			$this->User->create();
			if ( $this->User->save( $this->request->data ) ) {
				return $this->redirect(array('controller' =>'users', 'action' => 'login'));
			} else {
				$this->Session->setFlash( __( 'The user could not be saved. Please, try again.' ) );
			}
		}

		// Check if a cook is coming in form here
		$user = $this->Session->read('Auth.User');
		if (isset($user['cook_id'])) {
				return $this->redirect(array('controller' =>'discovery', 'action' => 'index'));

		}

	}


	/**
	 * Edit user view function
	 *
	 * @param id the user's id
	 */
	public function edit( $id = null ) {
		if ( !$this->User->exists( $id ) ) {
			throw new NotFoundException( __( 'Invalid user' ) );
		}
		if ( $this->request->is( array( 'post', 'put' ) ) ) {
			if ( $this->User->save( $this->request->data ) ) {
				// Update session
				$this->Session->write('Auth.User', $this->request->data['User'] ); 
				$this->redirect( $this->referer() );
			}
		} else {
			$options = array( 'conditions' => array( 'User.' . $this->User->primaryKey => $id ) );
			$this->request->data = $this->User->find( 'first', $options );
		}
	}

	/**
	 * Simple login for the user 
	 */
	public function login() {
		if ( $this->request->is( 'post' ) ) {
			if ( $this->Auth->login() ) {
				return $this->redirect( $this->Auth->redirect() );
			}
			$this->Session->setFlash( __( 'Invalid username or password, try again' ) );
		}
		// Check if a cook is coming in form here
		$user = $this->Session->read('Auth.User');
		if (isset($user['cook_id'])) {
				return $this->redirect(array('controller' =>'discovery', 'action' => 'index'));

		}
	}

	/**
     * Simple logout functions that removes the session and redirects to the main pageß
	 */
	public function logout() {
		return $this->redirect( $this->Auth->logout() );
	}



}
