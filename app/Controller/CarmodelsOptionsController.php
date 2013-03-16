<?php

App::uses('AppController', 'Controller');

/**
 * CarmodelsOptions Controller
 *
 * @property CarmodelsOption $CarmodelsOption
 */
class CarmodelsOptionsController extends AppController {

  /**
   * index method
   *
   * @return void
   */
  public function index() {
	$this->CarmodelsOption->recursive = 0;
	$this->set('carmodelsOptions', $this->paginate());
  }

  /**
   * view method
   *
   * @param string $id
   * @return void
   */
  public function view($id = null) {
	$this->CarmodelsOption->id = $id;
	if (!$this->CarmodelsOption->exists()) {
	  throw new NotFoundException(__('Invalid carmodels option'));
	}
	$this->set('carmodelsOption', $this->CarmodelsOption->read(null, $id));
  }

  /**
   * add method
   *
   * @return void
   */
  public function add() {
	if ($this->request->is('post')) {
	  $this->CarmodelsOption->create();
	  if ($this->CarmodelsOption->save($this->request->data)) {
		$this->Session->setFlash(__('The carmodels option has been saved'));
		if ($this->request->is('ajax')) {
		  $this->autoRender = false;
		  return '';
		} else {
		  $this->redirect(array('action' => 'index'));
		}
	  } else {
		$this->Session->setFlash(__('The carmodels option could not be saved. Please, try again.'));
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
	$this->CarmodelsOption->id = $id;
	if (!$this->CarmodelsOption->exists()) {
	  throw new NotFoundException(__('Invalid carmodels option'));
	}
	if ($this->request->is('post') || $this->request->is('put')) {
	  if ($this->CarmodelsOption->save($this->request->data)) {
		$this->Session->setFlash(__('The carmodels option has been saved'));
		if ($this->request->is('ajax')) {
		  $this->autoRender = false;
		  return '';
		} else {
		  $this->redirect(array('action' => 'index'));
		}
	  } else {
		$this->Session->setFlash(__('The carmodels option could not be saved. Please, try again.'));
	  }
	} else {
	  $this->request->data = $this->CarmodelsOption->read(null, $id);
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
	$this->CarmodelsOption->id = $id;
	if (!$this->CarmodelsOption->exists()) {
	  throw new NotFoundException(__('Invalid carmodels option'));
	}
	if ($this->CarmodelsOption->delete()) {
	  $this->Session->setFlash(__('Carmodels option deleted'));
	  $this->redirect(array('action' => 'index'));
	}
	$this->Session->setFlash(__('Carmodels option was not deleted'));
	$this->redirect(array('action' => 'index'));
  }

}
