<?php

/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppHelper', 'View/Helper');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class JqueryDialogHelper extends AppHelper {

	public $helpers = array('Html');
	// Flag to add css when needed
	private $css = "
/* Get div in front of nav-bar */
.ui-dialog {
  z-index: 1031 !important;
}

/* For spinners */
.jquery-dialog-spinner {
    display:    none;
    position:   fixed;
    z-index:    1010;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 0, 0, 0, .1 ) 
                url('../img/ajax-loader.gif') 
                50% 50% 
                no-repeat;
}

/* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
body.jquery-dialog-loading {
    overflowx: hidden;   
}

/* Anytime the body has the loading class, our
   modal element will be visible */
body.jquery-dialog-loading .jquery-dialog-spinner {
    display: block;
}";
	
	// Flag to  add js when needed
	private $js = "
  $(document).ready(function(){
    $('body').on({
      ajaxStart: function() { 
        $(this).addClass('jquery-dialog-loading'); 
      },
      ajaxStop: function() {
        $(this).removeClass('jquery-dialog-loading'); 
      }    
    });
    $( '.dialog-trigger' ).click(function(event) {
      event.preventDefault();
      var spinnerDiv = $('#jquery-dialog-spinner');
      if(spinnerDiv.length==0) {
        var spinnerDiv = $('<div id=\"jquery-dialog-spinner\" class=\"jquery-dialog-spinner\" />');
        $('body').append(spinnerDiv);
      }
      var dialogDiv = $('#jquery-dialog-div');
      if(dialogDiv.length==0) {
        var dialogDiv = $('<div id=\"jquery-dialog-div\" class=\"jquery-dialog-div\" />');
        $('body').append(dialogDiv);
      }
      var href = $(this).attr('href');
      var redirect = $(this).data('redirect');
      var title = $(this).data('title');
      var callback = $(this).data('callback');
      if(href.length>0) {
        load_form( dialogDiv, href, redirect, title, callback, '')
      }
    })
    function dialog_submit_click(theDialog, href, redirect, title, callback, event){
      //alert('dialog_submit_click');
      event.preventDefault();
      
      // Some selects may need to be selected
      theDialog.find('.jquery-dialog-select *').attr('selected','selected');

      // On first button submit, serialize data and submit form
      var formData = theDialog.find('form').serialize();
      load_form( theDialog, href, redirect, title, callback, formData);
    }
    function dialog_cancel_click(theDialog, callback, event){
      //alert('dialog_cancel_click');
      event.preventDefault();
      theDialog.dialog('destroy');
    }
    function dialog_reload_click(theDialog,event){
      event.preventDefault();
      theDialog.dialog('destroy');

      $('body').addClass('loading');
      window.location.reload();
      return false;
    }
    // Sends an ajax request and shows the dialog
    function load_form ( theDialog, href, redirect, title, callback, formData) {
      var requestType = 'POST';
      if(formData=='') {
        requestType = 'GET';
      }
      //alert('requestType='+requestType);
      $.ajax({
        'data': formData,
        'type': requestType,
        'url': href,
        'dataType': 'html',
        'async': true
      }).done( function(data){
        // If the dialog was shown, destroy it
        if(theDialog.is(':data(dialog)')) {
          theDialog.dialog('destroy');
        }
        // If there is a callback, call it
        if(eval('typeof window.'+callback)=='function') {
          if( window[callback](formData,data) )  {
            // If the callback returns true, do nothing else
            return;
          }
        }

        // Otherwise, we are showing the dialog the first time
        theDialog.show();
        theDialog.dialog({
          'autoOpen': false,
          'modal': true,
          'width': 'auto',
          'height': 'auto',
          'show': 'fade',
          'hide': 'fade',
          'title': title
        })
        theDialog.html(data);

        if(!redirect) {
          redirect=href;
        }
        // Reattach event handlers
        $('.cancel').click(function(event){
          dialog_cancel_click(theDialog, callback, event);
        })
        $('.dialog-reload').click(function(event){
          dialog_reload_click(theDialog,event);
        })
        theDialog.find('form').submit( function(event,ui) {
          dialog_submit_click(theDialog, redirect, null, title, callback, event);
          return false;
        });

        theDialog.dialog('open');

        // Kill the title bar
        if(!title) {
          widget = theDialog.dialog('widget');
          widget.find('.ui-dialog-titlebar').hide();
        }
      })
    }
  })";

	/**
	 * input Override of standard input to make TwitterBootstrap compatible
	 * 
	 * @param type $fieldName
	 * @param type $options
	 * @return type 
	 */
	public function link($title, $url = null, $options = array(), $confirmMessage = false) {
		if (empty($options['class'])) {
			$options['class'] = 'dialog-trigger';
		} else {
			$options['class'] .= ' dialog-trigger';
		}
    $response = '';
    
    #-- Include the js if needed
    if (!empty($this->js)) {
      $response .= "<script type=\"text/javascript\">" . $this->js . "</script>";
      $this->js = '';
    }
    #-- Include the css if needed
    if (!empty($this->css)) {
      $response .= "<style type=\"text/css\">" . $this->css . "</style>";
      $this->css = '';
    }
    
//    // Source the js if needed
//		App::import('Utility', 'File');
//		$response = '';
//		if ($this->css == '') {
//			$file = new File(APP . 'plugin'. DS . 'TagPicker'. DS . 'webroot'. DS . 
//					'css'. DS . 'jquery_dialog_helper.css');
//			$this->css = $file->read(false, 'r', false);
//			$response .= "<style type=\"text/css\">" . $this->css . "</style>";
//		}
//		if ($this->js == '') {
//			$file = new File(APP . 'plugin'. DS . 'TagPicker'. DS . 'webroot'. DS . 
//					'js'. DS . 'View'. DS . 'Helper'. DS . 'jquery_dialog_helper.js');
//			$this->js = $file->read(false, 'r', false);
//			$response .= "<script type=\"text/javascript\">" . $this->js . "</script>";
//		}

		$response.= $this->Html->link($title, $url, $options, $confirmMessage);
		return $response;
	}
	public function submitLink($title, $url = null, $options = array(), $confirmMessage = false) {
		if (empty($options['class'])) {
			$options['class'] = 'dialog-submit';
		} else {
			$options['class'] .= ' dialog-submit';
		}
		return $this->Html->link($title,$url,$options,$confirmMessage);
	}
	public function cancelLink($title, $url = null, $options = array(), $confirmMessage = false) {
		if (empty($options['class'])) {
			$options['class'] = 'dialog-cancel';
		} else {
			$options['class'] .= ' dialog-cancel';
		}
		return $this->Html->link($title,$url,$options,$confirmMessage);
	}
	public function reloadLink($title, $url = null, $options = array(), $confirmMessage = false) {
		if (empty($options['class'])) {
			$options['class'] = 'dialog-reload';
		} else {
			$options['class'] .= ' dialog-reload';
		}
		return $this->Html->link($title,$url,$options,$confirmMessage);
	}
		
}
