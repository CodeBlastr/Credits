<?php
class Credit extends AppModel {
	var $name = 'Credit';
	var $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'CreditType' => array(
			'className' => 'Enumeration',
			'foreignKey' => 'credit_type_id',
			'conditions' => array('CreditType.type' => 'CREDIT_TYPE'),
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'Users.User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Creator' => array(
			'className' => 'Users.User',
			'foreignKey' => 'creator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Modifier' => array(
			'className' => 'Users.User',
			'foreignKey' => 'modifier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
	function add($data) {
		if (empty($data['Credit']['user_id']) && isset($data['Credit']['email'])) {
			$userCredit = $this->User->find('first' , array(
							'conditions' => array('User.email' => $data['Credit']['email'])
			));
		} else {
			$userCredit = $this->User->find('first' , array(
							'conditions' => array('User.id' => $data['Credit']['user_id'])
			));
		}
		$userCredit['User']['credit_total'] +=  $data['Credit']['value'];		

		// we should not mess with other stuff, hence save only
		if ($this->User->save($userCredit, false)) {
			return true;
		} else {
			return false;
		}
	}

/**
 * 
 * 
 */
	public function changeUserCredits($data) {
		# needs $data['Credit']['user_id'] in data array
		# needs $data['Credit']['quantity'] in data array (can be negative or positive number to credit total by)
		$creditData = $this->User->find('first' , array(
			'conditions' => array('User.id' => $data['Credit']['user_id'])));
		$creditData['User']['credit_total'] = $creditData['User']['credit_total'] + $data['Credit']['quantity']; 
		$creditData['User']['id'] = !empty($data['User']['id']) ? $data['User']['id'] : $data['Credit']['user_id'];
		
		if($this->User->save($creditData)) : 
			return true;
		else :
			return false;
		endif;
	}
	


/**
 * Checkes the incoming user for whether they have any credits available
 * 
 * @return {int}		Returns the number of credits that would be left greater than or equal to, else false.
 */
	public function checkCredits($userId = null, $amount = 1) {
		$creditTotal = $this->User->field('credit_total', array('User.id' => $userId));
		if (($creditTotal - $amount) >= 0) :
			return $creditTotal;
		else : 
			return false;
		endif;
	}
}
?>