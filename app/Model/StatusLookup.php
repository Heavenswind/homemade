<?php
App::uses('AppModel', 'Model');
/**
 * StatusLookup Model
 *
 * @property OrderStatus $OrderStatus
 */
class StatusLookup extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'status_lookup';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'order_status_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

}
