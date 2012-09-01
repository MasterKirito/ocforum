<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<!--div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div--><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>Yii::t('core', 'Home'), 'url'=>array('/admin')),
				array('label'=>Yii::t('core', 'Categories'), 'url'=>array('/admin/core/categories/manage')),
				array('label'=>Yii::t('core', 'Discussions'), 'url'=>array('/admin/core/discussions/manage')),
				array('label'=>Yii::t('core', 'Posts'), 'url'=>array('/admin/core/posts/manage')),
				//array('label'=>Yii::t('user', 'Users'), 'url'=>array('/admin/user/users/manage')),
				//array('label'=>Yii::t('core', 'Go to Forum'), 'url'=> Yii::app()->params['forumUrl']),
				//array('label'=>Yii::t('core', 'Login'), 'url'=>array('/admin/user/users/login'), 'visible'=>Yii::app()->user->isGuest),
				//array('label'=>Yii::t('core', 'Logout') . '('.Yii::app()->user->name.')', 'url'=>array('/user/users/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<!--div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div--><!-- footer -->

</div><!-- page -->

</body>
</html>
