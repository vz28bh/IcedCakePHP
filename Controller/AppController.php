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

  public $components = array('Auth', 'Cookie', 'DebugKit.Toolbar', 'Ratings.Ratings', 'RequestHandler', 'Session');
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
    if (!empty($this->request->data)) {
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
          'conditions' => array($model . '.name LIKE' => $this->request->query['term'] . '%'),
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
   * ratings_demo
   * 
   * Shows the Jquery stars rating for car models
   */
  public function ratings_demo() {
    $this->paginate['contain'] = array('Make', 'Rating');
    $cars = $this->paginate();
    $this->set('carmodels', $cars);
    $this->render('/Demos/ratings_demo');
  }
/**
 * ratings_update
 * 
 * Records the user rating or deletes it if passed a 0
 * 
 * @param type $id
 * @return type
 * @throws NotFoundException
 */
  public function ratings_update($id = null) {
    $this->Carmodel->id = $id;
    if (!$this->Carmodel->exists()) {
      throw new NotFoundException(__('Invalid carmodel'));
    }
    $ratings = $this->Carmodel->isRatedBy($id, $this->Auth->user('id'));
    if (!$ratings) {
      $this->Carmodel->rate($id, $this->Auth->user('id'), $this->request->data['rating'], array('values' => array_combine(range(1, 5), range(1, 5))));
      $json['msg'] = __('Thank you');
    } else {
      if ($this->request->data['rating'] == 0) {
        $this->Carmodel->removeRating($id, $this->Auth->user('id'));
        $json['msg'] = __('Rating removed');
      } else {
        $json['msg'] = __('Already rated');
      }
    }
    $this->set('rating', $this->Carmodel->field('rating'));
    $ratings = $this->Carmodel->isRatedBy($id, $this->Auth->user('id'));
    $my_rating = 0;
    if (!empty($ratings)) {
      $my_rating = $ratings['Rating']['value'];
    }
    $this->autoRender = false;
    App::uses('View', 'View');
    $View = new View($this);

    $response = $View->render('/Elements/rating', 'ajax');
    $json['overall_rating'] = $response;
    $json['user_rating'] = $my_rating;
    CakeLog::write('debug', 'ratings_update: $json=' . print_r($json, true));
    CakeLog::write('debug', 'ratings_update: json_encode=' . json_encode($json));
    return json_encode($json);
  }

  /**
   * beforeFilter
   * 
   * Sets the language
   */
  public function beforeFilter() {
    $this->restoreLoginFromCookie();
    $this->_setLanguage();
    parent::beforeFilter();

    if (!$this->Auth->loggedIn()) {
      $this->layout = 'anonymous';
    }
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

  /**
   * Sets the model list for the nav bar
   */
  public function beforeRender() {
    $this->set('allModels', App::objects('model'));
  }

  public function isAuthorized() {
    return true;
  }

  /**
   * restoreLoginFromCookie
   * 
   * For users plugin remember-me checkbox
   */
  public function restoreLoginFromCookie() {
    $this->Cookie->name = 'Users';
    $cookie = $this->Cookie->read('rememberMe');
    if (!empty($cookie) && !$this->Auth->user()) {
      $data['User'][$this->Auth->fields['username']] = $cookie[$this->Auth->fields['username']];
      $data['User'][$this->Auth->fields['password']] = $cookie[$this->Auth->fields['password']];
      $this->Auth->login($data);
      
      if($this->Auth->isLoggedin()) {
        $this->log( 'Cookie login succesful');
      }
    }
  }

}
