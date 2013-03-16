<?php
App::uses('AppController', 'Controller');
/**
 * Carmodels Controller
 *
 * @property Carmodel $Carmodel
 */
class CarmodelsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Carmodel->recursive = 0;
		$this->set('carmodels', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Carmodel->id = $id;
		if (!$this->Carmodel->exists()) {
			throw new NotFoundException(__('Invalid carmodel'));
		}
		$this->set('carmodel', $this->Carmodel->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
      $this->Carmodel->create();
			if ($this->Carmodel->save($this->request->data)) {
				$this->Session->setFlash(__('The carmodel has been saved'));
        if($this->request->is('ajax')) {
          $this->autoRender = false;
          return '';
        } else {
          $this->redirect(array('action'=>'index'));
        }
			} else {
				$this->Session->setFlash(__('The carmodel could not be saved. Please, try again.'));
			}
		}
		$makes = $this->Carmodel->Make->find('list');
		$options = $this->Carmodel->Option->find('list');
		$this->set(compact('makes', 'options'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Carmodel->id = $id;
		if (!$this->Carmodel->exists()) {
			throw new NotFoundException(__('Invalid carmodel'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Carmodel->save($this->request->data)) {
				$this->Session->setFlash(__('The carmodel has been saved'));
        if($this->request->is('ajax')) {
          $this->autoRender = false;
          return '';
        } else {
          $this->redirect(array('action'=>'index'));
        }
			} else {
				$this->Session->setFlash(__('The carmodel could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Carmodel->read(null, $id);
		}
		$makes = $this->Carmodel->Make->find('list');
		$options = $this->Carmodel->Option->find('list');
		$this->set(compact('makes', 'options'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Carmodel->id = $id;
		if (!$this->Carmodel->exists()) {
			throw new NotFoundException(__('Invalid carmodel'));
		}
		if ($this->Carmodel->delete()) {
			$this->Session->setFlash(__('Carmodel deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Carmodel was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
