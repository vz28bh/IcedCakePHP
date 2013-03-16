<?php
App::uses('AppController', 'Controller');
/**
 * Makes Controller
 *
 * @property Make $Make
 */
class MakesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Make->recursive = 0;
		$this->set('makes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Make->id = $id;
		if (!$this->Make->exists()) {
			throw new NotFoundException(__('Invalid make'));
		}
		$this->set('make', $this->Make->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
      $this->Make->create();
			if ($this->Make->save($this->request->data)) {
				$this->Session->setFlash(__('The make has been saved'));
        if($this->request->is('ajax')) {
          $this->autoRender = false;
          return '';
        } else {
          $this->redirect(array('action'=>'index'));
        }
			} else {
				$this->Session->setFlash(__('The make could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Make->id = $id;
		if (!$this->Make->exists()) {
			throw new NotFoundException(__('Invalid make'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Make->save($this->request->data)) {
				$this->Session->setFlash(__('The make has been saved'));
        if($this->request->is('ajax')) {
          $this->autoRender = false;
          return '';
        } else {
          $this->redirect(array('action'=>'index'));
        }
			} else {
				$this->Session->setFlash(__('The make could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Make->read(null, $id);
		}
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
		$this->Make->id = $id;
		if (!$this->Make->exists()) {
			throw new NotFoundException(__('Invalid make'));
		}
		if ($this->Make->delete()) {
			$this->Session->setFlash(__('Make deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Make was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
