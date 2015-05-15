<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
        echo $this->Html->css('cake.generic');

        echo $this->Html->script('/Ratings/js/jquery-1.6.2.min');
        echo $this->Html->script('/Ratings/js/jquery.ui.core');
        echo $this->Html->script('/Ratings/js/jquery.ui.widget');

        echo $this->Html->script('/Ratings/js/jquery.ui.stars');


         echo $this->Html->css('/Ratings/css/jquery.ui.stars.css');


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
</head>
<body>
	<div id="container">
	    <div id="header">
    			<table width="100%">
    			<tr><td><?php
                      echo $this->HTML->link('Home', array('controller' => 'topics', 'action' => 'index'));
                    ?></td><td>
                    <td><?php
                        echo $this->HTML->link('Posts', array('controller' => 'posts', 'action' => 'index'));
                    ?></td><td>
    			<div align = "right"><?php
                    if(AuthComponent::user()){
                        echo $this->HTML->link('Logout', array('controller' => 'users', 'action' => 'logout'));
                    }else{
                        echo $this->HTML->link('Login', array('controller' => 'users', 'action' => 'login'));
                    }
                ?></div></td></tr></table>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);

			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
	<?php echo $this->Js->writeBuffer(); ?>
</html>
