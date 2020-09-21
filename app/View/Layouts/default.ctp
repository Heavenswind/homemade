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
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1"><?php echo $this->Html->charset(); ?>
		<title>
			Homemade
		</title><?php
												echo $this->fetch('meta');
												echo $this->fetch('css');
												echo $this->fetch('script');

											?><!-- Bootstrap CSS -->
		<!--- Change this when loss of connection -->
		<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
		<link href="http://fonts.googleapis.com/css?family=Lato|Vollkorn" rel="stylesheet" type=" text/css">
		<!--<link rel="stylesheet/less" type="text/css" href="/css/style.less">-->
		<?php echo $this->Html->css('style'); ?>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--- end of when loss of connection -->
		
		
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- Header -->
		
		


			<div id="wrap">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>


							<?php echo $this->Html->link(
    										$this->Html->image('homemade_logo_white.png', array('id' =>'logo', 'alt'=>'homemade logo')),
    													array('controller'=>'discovery', 'action' => 'index'),
    													array('escape' => false)
							); ?>
						</div><!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">


								<?php
								
								if(!$this->Session->read('Auth.User')) {
									echo '<li>';
									echo $this->Html->link('Login', array('controller'=>'users', 'action' => 'login'));
									echo '</li>';

									echo '<li>';
									echo $this->Html->link('Join', array('controller'=>'users', 'action' => 'join'));
									echo '</li>';
									echo '<li>';
									echo $this->Html->link('Chefs', array('controller'=>'cooks', 'action' => 'join'));
									echo '</li>';
								}

								
								else {
									$user = $this->Session->read('Auth.User');
									$tableName = "";
									$id_field = "";

									if (isset($user['cook_id'])) {
										$tableName = "cooks";
										$id_field = "cook_id";

									} else {
										$tableName = "users";
										$id_field = "user_id";
									}

									if ($tableName == 'cooks') {
											echo '<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">'
												 . ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name']) . '</a>
												<ul class="dropdown-menu">
												<li>' .
													$this->Html->link('Profile', array('controller'=>$tableName, 'action' => 'profile', $user[$id_field]))
												. '</li>
													<li>' .
													$this->Html->link('Dashboard', array('controller'=>$tableName, 'action' => 'dashboard', $user[$id_field]))
												. '</li>
													<li>' .
													$this->Html->link('Logout', array('controller'=>$tableName, 'action' => 'logout')) 
												. '</li>
												</ul>
											</li>';

									} else {
										echo '<li>';
										echo $this->Html->link('Discover', array('controller' =>  'discovery', 'action' => 'discovery'));
										echo '</li>';
										
										echo '<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">'
											 . ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name']) . '</a>
											<ul class="dropdown-menu">
												<li>' .
												$this->Html->link('Account', array('controller'=>$tableName, 'action' => 'edit', $user[$id_field]))
											. '</li>
												<li>' .
												$this->Html->link('Orders', array('controller'=>$tableName, 'action' => 'order', $user[$id_field]))  
											. '</li>
												<li>' .
												$this->Html->link('Logout', array('controller'=>$tableName, 'action' => 'logout')) 
											. '</li>
											</ul>
										</li>';
									}
								}
								?>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div>
				</nav>
				<div>
					<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>

			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
						</div>
					</div>
				</div>
			</footer>
			

			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js" type="text/javascript"></script>
			<script src="/js/less.min.js" type="text/javascript"></script>
	</body>
</html>