<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link http://cakephp.org CakePHP(tm) Project
 * @package Cake.View.Layouts
 * @since CakePHP(tm) v 0.10.0.1076
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$cakeDescription = __d('cake_dev', 'CakePHP');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $cakeDescription ?>:
			<?php echo $title_for_layout; ?>
		</title>
		<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('app.generic');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
		echo $this->Html->css('jasny-bootstrap.min');
		echo $this->Html->css('jasny-bootstrap-responsive.min');
		echo $this->Html->css('jquery-ui-timepicker-addon');
		echo $this->Html->css('smoothness/jquery-ui-1.9.0.custom.min');
		echo $this->Html->css('/ratings/css/jquery.ui.stars.min');
		echo $this->Html->css('jquery.lightbox-0.5');

		echo $this->Html->script('jquery-1.8.2.min');
		echo $this->Html->script('jquery-ui-1.9.0.custom.min');
		echo $this->Html->script('jquery.validate.min');
		echo $this->Html->script('additional-methods');
		echo $this->Html->script('jquery.metadata');
		echo $this->Html->script('jquery-ui-timepicker-addon');
		echo $this->Html->script('/ratings/js/jquery.ui.stars');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('app');
		echo $this->Html->script('jasny-bootstrap.min');
		echo $this->Html->script('jquery.lightbox-0.5.min');

		#-- View specific js files
		if (is_file(WWW_ROOT . 'js' . DS . 'View' . DS . Inflector::camelize($this->params['controller']) . DS . $this->params['action'] . '.js')) {
			echo $this->Html->script('View/' . Inflector::camelize($this->params['controller']) . '/' . $this->params['action']);
		}

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
	</head>
	<body>
		<?php
		echo $this->element('menus', array('cakeDescription' => $cakeDescription, 'allModels' => $allModels));
		?>
		<div id="container" class="container">
			<div id="content" class="row">
				<?php echo $this->Session->flash('flash', array('element' => 'flash', 'params' => array('class' => 'alert alert-error'))); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
			<div id="footer" class="row">
				<?php
				echo $this->Html->link(
						$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false)
				);
				?>
			</div>
		</div>
    <div class="container">
      <div class="row">
        <div class="span12">
          <?php echo $this->element('sql_dump'); ?>
        </div>
      </div>
    </div>

	</body>
</html>