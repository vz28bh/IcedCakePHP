
<?php

App::uses('AppModel', 'Model');

/**
 * Carpicture Model
 *
 */
class Carpicture extends AppModel {

  public $actsAs = array(
	  'Containable',
	  'Uploader.Attachment' => array(
		  'fileName' => array(
			  'name' => '', // Name of the function to use to format filenames
			  'baseDir' => '', // See UploaderComponent::$baseDir
			  'uploadDir' => 'files/Carpictures', // See UploaderComponent::$uploadDir
			  'dbColumn' => 'path', // The database column name to save the path to
			  'importFrom' => '', // Path or URL to import file
			  'defaultPath' => '', // Default file path if no upload present
			  'maxNameLength' => 30, // Max file name length
			  'overwrite' => false, // Overwrite file with same name if it exists
			  'stopSave' => true, // Stop the model save() if upload fails
			  'allowEmpty' => false, // Allow an empty file upload to continue
			  's3' => array(), // Array of Amazon S3 settings
			  'metaColumns' => array(// Mapping of meta data to database fields
				  'ext' => '',
				  'type' => '',
				  'size' => '',
				  'group' => '',
				  'width' => '',
				  'height' => '',
				  'filesize' => ''
			  ),
			  'transforms' => array(
				  array(
					  'method' => 'resize',
					  'width' => 50,
					  'height' => 50,
					  'dbColumn' => 'thumbpath',
				  )
			  )
		  )
	  ),
	  'Uploader.FileValidation',
  );

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
	  'name' => array(
		  'notempty' => array(
			  'rule' => array('notempty'),
		  ),
		  'isUnique' => array(
			  'rule' => array('isUnique'),
		  ),
	  ),
	  'path' => array(
		  'notempty' => array(
			  'rule' => array('notempty'),
		  ),
	  ),
	  'carmodel_id' => array(
		  'numeric' => array(
			  'rule' => array('numeric'),
		  ),
	  ),
  );

  //The Associations below have been created with all possible keys, those that are not needed can be removed

  /**
   * belongsTo associations
   *
   * @var array
   */
  public $belongsTo = array(
	  'Carmodel' => array(
		  'className' => 'Carmodel',
		  'foreignKey' => 'carmodel_id',
		  'conditions' => '',
		  'fields' => '',
		  'order' => ''
	  )
  );

}
