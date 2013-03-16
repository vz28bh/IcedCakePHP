<?php

App::uses('UsersController', 'Users.Controller');
App::import('Model', 'Users.User');

class AppUsersController extends UsersController {
  //public $modelClass = 'User';

  /**
   * Helpers
   * 
   * Override Form with TwitterBootstrap help
   *
   * @var array
   */
  public $helpers = array(
      'Html',
      'Form' => array('className' => 'TwitterBootstrap'),
      'Session',
      'Time',
      'Text');

  /**
   * beforeFilter callback
   *
   * Not sure why I have to initialize the model
   * 
   * @return void
   */
  public function beforeFilter() {
    $this->Security->blackHoleCallback = 'blackhole';
    parent::beforeFilter();
    $this->_setupAuth();
  }

  /**
   * Redirects when a bad person submits a form
   * 
   * @param type $type
   */
  public function blackhole($type) {
    $this->Auth->flash(__d('users', 'Your request cannot be processed, please try something else'));
    $this->redirect($this->Auth->logout());
  }

  /**
   * Setup Authentication Component
   * 
   * Override the redirects to the extended controller
   *
   * @return void
   */
  protected function _setupAuth() {
    //CakeLog::write('debug', 'AppUsersController->_setupAuth: starting');
    $this->Auth->allow('add', 'reset', 'verify', 'logout', 'view', 'reset_password', 'login');
    if (!is_null(Configure::read('Users.allowRegistration')) && !Configure::read('Users.allowRegistration')) {
      $this->Auth->deny('add');
    }
    if ($this->request->action == 'register') {
      $this->Components->disable('Auth');
    }

    $this->Auth->authenticate = Configure::read('AppUser.authenticate');

    $this->Auth->loginRedirect = '/';
    $this->Auth->logoutRedirect = array('plugin' => false, 'controller' => 'users', 'action' => 'login');
    $this->Auth->loginAction = array('admin' => false, 'plugin' => false, 'controller' => 'users', 'action' => 'login');
  }

  /**
   * Common login action
   *
   * @return void
   */
  public function login() {
    //CakeLog::write('debug', 'AppUsersController-> login data=' . print_r($this->request->data, true));
    if ($this->request->is('post')) {
      if (!empty($this->request->data['User']['username'])) {
        //CakeLog::write('debug', 'AppUsersController->login: checking logging on with email ' . $this->request->data['User']['username']);
        $user = $this->User->findByEmail($this->request->data['User']['username']);
        if (!empty($user)) {
          $this->request->data['User']['username'] = $user['User']['username'];
          //CakeLog::write('debug', 'AppUsersController->login: found user ' . $this->request->data['User']['username']);
        }
      }
      if ($this->Auth->login()) {
        //CakeLog::write('debug', 'AppUsersController->login: logged in user=' . print_r($this->Auth->user(), true));
        // Check if we got normal logon or ldap
        $id = $this->Auth->user('id');
        if (empty($id)) {
          $samaccountname = $this->Auth->user('samaccountname');
          if (!empty($samaccountname)) {
            $user = $this->User->findByUsername($samaccountname);
            //CakeLog::write('debug', 'AppUsersController->login: samaccountname=' . $samaccountname . ', user=' . print_r($user, true));
            $id = $user['User']['id'];
          }
        }
        if (!empty($id)) {
          $this->User->id = $id;
          //CakeLog::write('debug', 'AppUsersController->login: id=' . $id . ', user=' . print_r($this->Auth->user(), true));
          $this->User->saveField('last_login', date('Y-m-d H:i:s'));
          if (!empty($samaccountname)) {
            // Make the users table have the ldap password
            $this->User->saveField('password', $this->User->hash($this->request->data['User']['password'], null, true));
            // Login to load the local user info
            $this->Auth->login();
          }
          if ($this->here == $this->Auth->loginRedirect) {
            $this->Auth->loginRedirect = '/';
          }
          $this->Session->setFlash(sprintf(__d('users', '%s logged in'), Inflector::camelize($this->Auth->user($this->{$this->modelClass}->displayField))));
          if (!empty($this->request->data)) {
            $data = $this->request->data[$this->modelClass];
            $this->_setCookie();
          }

          if (empty($data['return_to'])) {
            $data['return_to'] = null;
          }
          $this->redirect($this->Auth->redirect($data['return_to']));
        } else {
          //CakeLog::write('debug', 'AppUsersController->login: user=' . print_r($this->Auth->user, true));
          //$this->Session->destroy();
          //$this->Cookie->destroy();
          $this->Auth->logout();
          $this->Auth->flash(__d('users', 'Please register first'));
          $this->redirect(array('controller' => 'users', 'action' => 'add'));
        }
      } else {
        $this->Auth->flash(__d('users', 'Invalid e-mail / password combination.  Please try again'));
      }
    }
    if (isset($this->request->params['named']['return_to'])) {
      $this->set('return_to', urldecode($this->request->params['named']['return_to']));
    } else {
      $this->set('return_to', false);
    }
    $allowRegistration = Configure::read('Users.allowRegistration');
    $this->set('allowRegistration', (is_null($allowRegistration) ? true : $allowRegistration));
  }

}

?>
