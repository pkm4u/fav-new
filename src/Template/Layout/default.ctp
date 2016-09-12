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
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
	<?= $this->Html->css('bootstrap.min.css') ?>
    <script type="text/javascript">
  	var resetLink=false;
	var token='<?php echo $this->request->param('_csrfToken');?>';
	var siteUrl='<?php echo $this->request->webroot;?>';
	<?php if($this->request->session()->read('resetAuth')){?>
		var resetLink=true;
	<?php }?>
</script>  
    <?= $this->Html->script(['angular.min','angular-animate.min','angular-sanitize.min','angular-touch.min','ui-bootstrap.min','home','login']); ?> 
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body ng-app="fav">
<header id="header-section" class="scroll-header" ng-controller="NavCtrl">
    <nav class="menu-container underscore-container menu-container-fade {{mobClass}}">
        <ul>
            <li>
			<?php if ($this->Auth->user()) {
				?>
				<h1>Welcome <?php echo $this->Auth->user('name');?><a class="login" data-toggle="modal" ng-click="lopen('sm')" href="javascript:void(0);"> Logout</a></h1>
			<?php }else{
				?>
				<h1> <a class="login" data-toggle="modal" ng-click="lopen('sm')" href="javascript:void(0);"> Login/Register </a></h1>
			<?php } ?>
                
            </li>
        </ul>
    </nav>
    </header>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
