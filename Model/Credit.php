<?php
App::uses('CreditsAppModel', 'Credits.Model');

class Credit extends CreditsAppModel {
	public $name = 'Credit';
	public $validate = array(
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

	public $belongsTo = array(
		'User' => array(
			'className' => 'Users.User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public function add($data) {
		if (empty($data['Credit']['user_id']) && isset($data['Credit']['email'])) {
			$userCredit = $this->User->find('first' , array(
				'conditions' => array(
					'User.email' => $data['Credit']['email'],
					),
                'fields' => array('User.credit_total'),
				));
		} else {
			$userCredit = $this->User->find('first' , array(
				'conditions' => array('User.id' => $data['Credit']['user_id']),
                'fields' => array('User.credit_total'),
			));
		}
//debug($userCredit['User']['credit_total']);
		$userCredit['User']['credit_total'] +=  $data['Credit']['value'];
//debug($data['Credit']['value']);
//debug($userCredit['User']['credit_total']);
          //break;
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
		$userId = !empty($data['Credit']['user_id']) ? $data['Credit']['user_id'] : $data['User']['id'];
		$creditData = $this->User->find('first' , array(
			'nocheck' => true,
			'fields' => array('User.credit_total', 'User.user_role_id'),
			'conditions' => array('User.id' => $userId)));
		$creditData['User']['credit_total'] = $creditData['User']['credit_total'] + $data['Credit']['quantity'];
		$creditData['User']['id'] = !empty($data['User']['id']) ? $data['User']['id'] : $data['Credit']['user_id'];
		$this->User->validate = false;
		if($this->User->save($creditData)) {
			return true;
		} else {
			return false;
		}
	}



/**
 * Checkes the incoming user for whether they have any credits available
 *
 * @return {int}		Returns the number of credits that would be left greater than or equal to, else false.
 */
	public function checkCredits($userId = null, $amount = 1) {
		$creditTotal = $this->User->field('credit_total', array('User.id' => $userId));
		if (($creditTotal - $amount) >= 0) {
			return $creditTotal;
		} else {
			return false;
		}
	}


	public function creditTypes() {
		$creditTypes = array();
		foreach(Zuha::enum('CREDIT_TYPE') as $creditType) {
			$creditTypes[Inflector::underscore($creditType)] = $creditType;
		}
		// return array_merge(array('incart' => 'In Cart', 'paid' => 'Paid', 'shipped' => 'Shipped'), $creditTypes);
		return $creditTypes;
	}

}