<?php
App::uses( 'AppController', 'Controller' );
/**
 * Orders Controller
 *
 * @property Order $Order
 */
class OrdersController extends AppController {

	/**
	 * add method
	 */
	public function add() {
		if ( $this->request->is( 'post' ) ) {
			$this->Order->create();
			if ( $this->Order->save( $this->request->data ) ) {
				return $this->redirect( array( 'controller' => 'users', 'action' => 'order', $this->Auth->user( 'user_id' ) ) );
			} else {
				$this->Session->setFlash( __( 'The order could not be made. Try again later.' ) );
			}
		}
	}

	/**
	 * function to update the status of a order
	 *
	 * @param unknown $id         the order_id
	 * @param unknown $new_status the status to set the order to
	 */
	public function updateStatus( $id = null, $new_status ) {
		$order = $this->Order->find( 'first', array( 'conditions' => array( 'Order.order_id' => $id ) ) );
		if ( $new_status > 0 ) {
			// delete the order
			$this->Order->id = $id;
			$this->Order->saveField( 'order_status_id', $new_status );
		} else {
			// update the order
			$this->Order->delete( $id );
		}
		$this->redirect( $this->referer() );


	}


}
