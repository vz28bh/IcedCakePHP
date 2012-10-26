<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');
App::import('Lib', 'DebugKit.FireCake', true);

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

  public $components = array('Cookie', 'DebugKit.Toolbar', 'RequestHandler', 'Session');
  public $helpers = array('Form' => array('className' => 'TwitterBootstrap'), 'Html', 'JqueryDialog', 'JqueryValidation', 'Js' => array('Jquery'), 'Session');
  public $paginate = array(
      'limit' => 10,
  );

  /**
   * demo method
   *
   * @return void
   */
  public function date_demo() {
    $this->render('/Demos/date_demo');
  }

  /**
   * demo method
   *
   * @return void
   */
  public function autocomplete_demo() {
    if(!empty($this->request->data)) {
      debug($this->request->data);
    }
    $this->render('/Demos/autocomplete_demo');
  }

  /**
   * autocomplete_search
   * 
   * Responds to ajax request to find some models.
   */
  public function autocomplete_search() {
    if (!empty($this->request->query['term'])) {
      $model = Inflector::camelize(Inflector::singularize($this->request->params['controller']));
      $my_models = $this->$model->find('all', array(
          'conditions' => array($model.'.name LIKE' => $this->request->query['term'] . '%'),
          'limit' => 10,
          'contain' => false,
              ));
      $json_array = array();
      foreach ($my_models as $my_model) {
        $json_array[] = $my_model[$model];
      }
      $json_str = json_encode($json_array);
      $this->autoRender = false;
      return $json_str;
    }
  }

  /**
   * beforeFilter
   * 
   * Sets the language
   */
  public function beforeFilter() {
    $this->_setLanguage();
    parent::beforeFilter();
  }

  /*
   * _setLanguage
   * 
   * Routine to set session variable if a cookie is set or update the session variable if
   * the global param is set.
   */

  protected function _setLanguage() {
    // Get the default user language
    $userLanguage = Configure::read('User.defaultLanguage');

    // Use cookie, session, or params
    if ($this->Cookie->read('User.language')) {
      $userLanguage = $this->Cookie->read('User.language');
    }
    if ($this->Session->check('User.language')) {
      $userLanguage = $this->Session->read('User.language');
    }
    if (isset($this->params['language'])) {
      $userLanguage = $this->params['language'];
    }

    // Update the session
    $this->Session->write('User.language', $userLanguage);
    // Update the cookie if changed
    if ($this->Cookie->read('User.language') != $userLanguage) {
      $this->Cookie->write('User.language', $userLanguage, false, '20 days');
    }

    // Update the global used by CakePHP - don't use a different name!!!
    Configure::write('Config.language', $userLanguage);
  }

  /*
   * language
   * 
   * Decodes the url and updates the language part, then redirects back
   */

  function language() {
    // Flip the language and go back
    CakeLog::write('debug', 'language: ' . print_r($this->request->named, true));
    $language = $this->request->named['new_language'];

    if (!empty($language)) {
      $referer = Router::normalize($this->referer(null, true));
      $urlRoute = Router::parse($referer);
      $urlRoute['language'] = $language;
      $urlRoute['url'] = array();
      $this->log(Router::reverse($urlRoute));
      $url = Router::normalize(Router::reverse($urlRoute));
      $this->params['language'] = $language;
      $this->redirect($url);
    } else {
      $this->redirect($this->referer());
    }
  }

  /**
   * redirect
   * 
   * Override to put language in the url if it is set in the session
   * 
   * @param type $url
   * @param type $status
   * @param type $exit 
   */
  public function redirect($url, $status = NULL, $exit = true) {
    if (is_array($url) && !isset($url['language']) && $this->Session->check('User.language')) {
      $url['language'] = $this->Session->read('User.language');
    }
    parent::redirect($url, $status, $exit);
  }

  public function beforeRender() {
    $this->set('allModels', App::objects('model'));
  }

}
