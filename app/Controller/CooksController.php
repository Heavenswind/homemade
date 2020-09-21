<?php
App::uses( 'AppController', 'Controller' );
/**
 * Cooks Controller
 *
 * @property Cook $Cook
 */
class CooksController extends AppController {

	// Models this controller will need
	var $uses = array('Order', 'User', 'Cook', 'CookRating', 'CookRatingDetail');
	

	// Function called before the page request
	public function beforeFilter() {
		parent::beforeFilter();
		// A unvalidated user can access these page
		$this->Auth->allow( 'index', 'profile','join', 'login', 'logout');
	}


	/**
	 * dashboard page
	 * retrieves the cook object, requested and to deliver orders from the given cook_id
	 * @param id the cook's id 
	 */
	public function dashboard( $id = null ) {
			$this->loadModel('Order');
			$options = array( 'conditions' => array( 'Cook.' . $this->Cook->primaryKey => $id ) );
			// Load our models for the view/template to render
			$this->set( 'cook', $this->Cook->find( 'first', $options ) );
			$this->set('status_awaiting', $this->Order->find('all', array('conditions' => array('Order.order_status_id' => Order::$status_awaiting, 'Order.cook_id' => $id ))));
			$this->set('status_deliver', $this->Order->find('all', array('conditions' => array('Order.order_status_id' => Order::$status_deliver, 'Order.cook_id' => $id ))));
			
	}


	/**
	 * function to update the status of the cook
	 * retrieves the cook object, and updates the new status depdening on the current status
	 * @param id the cook's id
	 */
	public function updateStatus($id) {
		$cook = $this->Cook->find('first', array('conditions' => array('Cook.cook_id' => $id)));
		$old_status = $cook['Cook']['cook_status_id'];
		$new_status;
		// Check what the old status is
		if ($old_status == CookStatus::$status_available) {
			$new_status = CookStatus::$status_not_available;
		} else {
			$new_status = CookStatus::$status_available;
		}
		// Update the cook's status
		$this->Cook->id = $id;
		$this->Cook->saveField('cook_status_id', $new_status, array('callbacks' => false));
		return $this->redirect(array('controller' =>'cooks', 'action' => 'dashboard', $id));
	}

	/**
	 * function to update the rating of the cook
	 * retrieves the cook object, and increments the rating
	 * @param id the cook's id
	 */
	public function rate($id) {
		// Get the new rating
		$user_rating = $this->request['data']['user_rating'];
		// Get the number of stars from the user
		$star_rating = explode("_", $user_rating)[1];
		// Get the cook by id
		$cook = $this->Cook->find('first', array('conditions' => array('Cook.cook_id' => $id)));
		// Get the id from the cook
		$cook_rating_id = $cook['Cook']['cook_rating_id'];
		// Get the cook's rating
		$cook_rating = $this->CookRating->find('first', array('conditions' => array('CookRating.cook_rating_id' =>  $cook_rating_id)));
		// Get the old rating to incremnt from
		$old_rating = $cook_rating['CookRating'][$user_rating];
		// Increment the new rating
		$new_rating = intval($old_rating) + 1;

		// Update the cook's rating
		$this->CookRating->id = $cook_rating_id;
		$this->CookRating->saveField($user_rating, $new_rating, array('callbacks' => false));

		// Get the user who rated the cook
		$user_id = $this->Auth->user( 'user_id' );
		// Create a rating detail for this user, so that they can't re rate the cook
		// This is a really hacky way of doing this.
		$this->CookRatingDetail->create();
		$this->CookRatingDetail->save(array('cook_rating_id' => $cook_rating_id, 'user_id' => $user_id, 'user_rating'=> $star_rating));
		return $this->redirect(array('controller' =>'cooks', 'action' => 'profile', $id));
	}

	/**
	 * Profile view function
	 *
	 * @param id the cook's id
	 */
	public function profile( $id = null ) {
		if ( !$this->Cook->exists( $id ) ) {
			throw new NotFoundException( __( 'Invalid cook' ) );
		}
		$options = array( 'conditions' => array( 'Cook.' . $this->Cook->primaryKey => $id ) );		
		$cook = $this->Cook->find('first', array('conditions' => array('Cook.cook_id' => $id)));
		// Pass the data for the view/template to render
		$this->set('cook_rating', $this->CookRating->find('first', array('conditions' => array('CookRating.cook_rating_id' => $cook['Cook']['cook_rating_id']))));
		$this->set('cook', $this->Cook->find( 'first', $options ) );
	}

	/**
	 * Join / Signup view function
	 */
	public function join() {
		if ( $this->request->is( 'post' ) ) {
			$this->Cook->create();
			if ( $this->Cook->save( $this->request->data ) ) {
				return $this->redirect(array('controller' =>'discovery', 'action' => 'index'));
			}
		}
	}

	/**
	 * Edit Cook view function
	 *
	 * @param id the cook's id
	 */
	public function edit( $id = null ) {
		if ( !$this->Cook->exists( $id ) ) {
			throw new NotFoundException( __( 'Invalid cook' ) );
		}
		if ( $this->request->is( array( 'post', 'put' ) ) ) {
			if ( $this->Cook->save( $this->request->data ) ) {
				// Update the session

				$this->Session->write('Auth.User', $this->request->data['Cook'] ); 
				return $this->redirect(array('controller' =>'cooks', 'action' => 'dashboard', $id));
			}
		} else {
			$options = array( 'conditions' => array( 'Cook.' . $this->Cook->primaryKey => $id ) );
			$this->request->data = $this->Cook->find( 'first', $options );
		}
	}


	/**
	 * Simple login for the cook 
	 */
	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirect());
	        }
	        $this->Session->setFlash(__('Invalid username or password, try again'));
	    }
	}

	/**
     * Simple logout functions that removes the session and redirects to the main pageß
	 */
	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}

}

