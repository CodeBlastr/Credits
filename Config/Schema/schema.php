<?php 
/* generated on: 2012-04-10 18:40:47 : 1334083247 */
class CreditsSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}
	
	public $credits = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'credit_type_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'collate' => NULL, 'comment' => 'Allows a site to have multiple credit types with different values.  Type values will be a system setting.'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'amount' => array('type' => 'float', 'null' => false, 'default' => '0', 'collate' => NULL, 'comment' => ''),
		'value' => array('type' => 'float', 'null' => true, 'default' => '0', 'collate' => NULL, 'comment' => 'A convenience and performance field for easily finding the dollar value of this credit record.'),
		'creator_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'modifier_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);
}
