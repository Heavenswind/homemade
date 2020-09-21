<?php
App::uses( 'AppController', 'Controller' );
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {

	// Models this controller will need
	public $uses = array('Category', 'Dish');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->Category->find('all', array('group' => array('Category.Category_id', 'Category.category_id'))));
	}

	/**
	 * view method
	 *
	 * @param $id the category_id
	 */
	public function view( $id = null ) {
		if ( !$this->Category->exists( $id ) ) {
			throw new NotFoundException( __( 'Invalid category' ) );
		}
		$options = array( 'conditions' => array( 'Category.' . $this->Category->primaryKey => $id ));
		// Find the specific category by its id
		$category = $this->Category->find( 'first', $options );
		// Find all the dishes that belong to this category
		$related_dishes = $this->Category->find('all', array('conditions' =>array('Dish.category_id' => $category['Category']['category_id'])));
		$this->set( compact('category', 'related_dishes'));
	}

	// Function called before the page request
	public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow( 'index', 'view' );
	}


}
