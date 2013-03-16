<?php

App::uses('AppController', 'Controller');

/**
 * Carmodels Controller
 *
 * @property Carmodel $Carmodel
 */
class CarpicturesController extends AppController {

  /**
   * index method
   *
   * @return void
   */
  public function index() {
	$this->Carpicture->recursive = 0;
	$this->set('carpictures', $this->paginate());
  }

  /**
   * view method
   *
   * @param string $id
   * @return void
   */
  public function view($id = null) {
	$this->Carpicture->id = $id;
	if (!$this->Carpicture->exists()) {
	  throw new NotFoundException(__('Invalid carpicture'));
	}
	$this->set('carpicture', $this->Carpicture->read(null, $id));
  }

  /**
   * add method
   *
   * @return void
   */
  public function add($carmodel_id=null) {
	if(empty($carmodel_id)) {
	  $carmodel_id = $this->request->data['Carpicture']['carmodel_id'];
	}
	$this->log($this->request->data,'data');
	$this->Carpicture->Carmodel->id = $carmodel_id;
	if (!$this->Carpicture->Carmodel->exists()) {
	  throw new NotFoundException(__('Invalid carmodel'));
	}
	if ($this->request->is('post')) {
	  if (empty($this->request->data['Carpicture']['fileName'])) {
		$this->log( 'Missing file information' );
		$this->Session->setFlash( __('Missing file information') );
		return '';
	  }
	  $this->Carpicture->create();
	  $this->request->data['Carpicture']['user_id'] = $this->Auth->user('id');
	  if ($this->Carpicture->save($this->request->data)) {
		$this->Session->setFlash(__('The carpicture has been saved'));
		if ($this->request->is('ajax')) {
		  $this->log('ajax success');
		  $this->autoRender = false;
		  return '';
		} else {
		  //$this->redirect(array('action' => 'index'));
		  $this->autoRender=false;
		  $this->log('success');
		  return __('File uploaded');
		}
	  } else {
		$this->log('not saved');
		$this->Session->setFlash(__('The carpicture could not be saved. Please, try again.'));
	  }
	}
	$this->log('not post');
	$this->request->data['Carpicture']['carmodel_id'] = $carmodel_id;
  }

  /**
   * edit method
   *
   * @param string $id
   * @return void
   */
  public function edit($id = null) {
	$this->Carpicture->id = $id;
	if (!$this->Carpicture->exists()) {
	  throw new NotFoundException(__('Invalid carpicture'));
	}
	if ($this->request->is('post') || $this->request->is('put')) {
	  if ($this->Carpicture->save($this->request->data)) {
		$this->Session->setFlash(__('The carpicture has been saved'));
		if ($this->request->is('ajax')) {
		  $this->autoRender = false;
		  return '';
		} else {
		  $this->redirect(array('action' => 'index'));
		}
	  } else {
		$this->Session->setFlash(__('The carpicture could not be saved. Please, try again.'));
	  }
	} else {
	  $this->request->data = $this->Carpicture->read(null, $id);
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
	$this->Carpicture->id = $id;
	if (!$this->Carpicture->exists()) {
	  throw new NotFoundException(__('Invalid carpicture'));
	}
	if ($this->Carpicture->delete()) {
	  $this->Session->setFlash(__('Carpicture deleted'));
	  $this->redirect(array('action' => 'index'));
	}
	$this->Session->setFlash(__('Carpicture was not deleted'));
	$this->redirect(array('action' => 'index'));
  }
}
