<?php
App::uses('CreditsAppController', 'Credits.Controller');
class CreditsController extends CreditsAppController {

	public $name = 'Credits';
	public $uses = 'Credits.Credit';
	public $allowedActions = array('count');

	public function index() {
		$this->Credit->recursive = 0;
		$this->set('credits', $this->paginate());
	}

	public function my() {
		$this->settings['conditions']['Credit.user_id'] = $this->Session->read('Auth.User.id');
		$this->paginate = $this->settings;
		$this->Credit->recursive = 0;
		$this->set('credits', $this->paginate());
		$this->render('index');
	}

	public function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid credit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Credit->contain('CreditType', 'User');
		$this->set('credit', $this->Credit->read(null, $id));
	}

	public function add() {
		if (!empty($this->request->data)) {
			$this->Credit->create();
			if ($this->Credit->add($this->request->data)) {
				$this->Session->setFlash(__('The credit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The credit could not be saved. Please, try again.', true));
			}
		}
		$creditTypes = $this->Credit->creditTypes();
		$users = $this->Credit->User->find('list');
		$this->set(compact('creditTypes', 'users'));
	}

	public function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid credit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Credit->save($this->request->data)) {
				$this->Session->setFlash(__('The credit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The credit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Credit->read(null, $id);
		}
		$creditTypes = $this->Credit->creditTypes();
		$users = $this->Credit->User->find('list');
		$this->set(compact('creditTypes', 'users'));
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for credit'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Credit->delete($id)) {
			$this->Session->setFlash(__('Credit deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Credit was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function count($userId) {
		return $this->Credit->User->field('credit_total', array('User.id' => $userId));
	}
}