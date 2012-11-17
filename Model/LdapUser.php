<?php
App::uses('AppModel', 'Model');
/**
 * Carmodel Model
 *
 * @property Make $Make
 * @property Option $Option
 */
class LdapUser extends Model {
  public $useTable = false;
  public $useDbConfig = 'ldap';
  public $primaryKey = 'samaccountname';
  public $displayField = 'displayname';
}
