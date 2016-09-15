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
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription="Favista Real Estate " ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
	<?= $this->Html->css(['bootstrap.min.css','add-listing.css','angular-material.min.css','animate.min.css','listing-ui.css']) ?>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Carrois+Gothic|Open+Sans|Raleway" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript">
  	var resetLink=false;
	var userLogin=false;
	var user='';
	var cities='';
	var token='<?php echo $this->request->param('_csrfToken');?>';
	var siteUrl='<?php echo $this->request->webroot;?>';
	<?php if($this->request->session()->read('resetAuth')){?>
		resetLink=true;
	<?php }?>
	<?php if($this->request->session()->read('Auth.User.id')){?>
		 user = '<?php echo json_encode($this->request->session()->read('Auth'));?>';
	<?php }?>
	<?php if(isset($Login)){?>
		 userLogin=true;
	<?php }?>
</script>  
    <?= $this->Html->script(['angular.min','angular-aria.min.js','angular-material.min','angular-animate.min','angular-sanitize.min','angular-messages.min','angular-touch.min','ui-bootstrap.min','postproperty','login']); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body ng-app="fav">
 <header class="secondery" ng-controller="NavCtrl">
    <div class="container-fluid">
           
		   <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top"><img src="http://d2bph75bvoc5cj.cloudfront.net/img/standard_logo.png"/></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden active">
                        <a href="#page-top"></a>
                    </li>
                    
                    <li class="page-scroll" ng-if="!loginUser">
                        <a data-toggle="modal" ng-click="lopen('sm')" href="javascript:void(0);" class="btn btn-primary mrtp20">Login</a>
                    </li>
                    <li class="page-scroll" ng-if="loginUser">
                        <a href="{{base_url}}logout" class="btn btn-primary mrtp20">Logout</a>
                    </li>
                    <li class="page-scroll">
                        <a href="{{base_url}}postproperty" class="btn btn-primary mrtp20">Post</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
		
    </div>
</header>   
    <section ng-controller="FavController">
     
		<div class="container">
			<div class="row">
			   <div class="col-md-12">
               
        <?= $this->fetch('content') ?>
        </div>
		</div>
		</div>
   </section>
</body>
</html>
