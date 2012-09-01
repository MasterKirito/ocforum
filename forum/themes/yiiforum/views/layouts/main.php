<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />

	<title>Welcome to Foundation</title>
  
	<!-- Included CSS Files -->
	<!-- Combine and Compress These CSS Files -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/globals.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/typography.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/grid.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ui.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/forms.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/orbit.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/reveal.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mobile.css">
	<!-- End Combine and Compress These CSS Files -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/app.css">

	<!--[if lt IE 9]>
		<link rel="stylesheet" href="stylesheets/ie.css">
	<![endif]-->

	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr.foundation.js"></script>

	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

</head>
<body>
	<!-- container -->
	<div class="container">
		<div class="row">
			<div class="twelve columns" id="header">
				<div class="six columns">
					<h2><a href='<?php echo Yii::app()->request->baseUrl; ?>'><?php echo Yii::app()->name ?></a></h2>
					<p>Developed by @horechek. Version: alpha</p>
				</div>
				<div class="six columns">
					<?php $this->widget('application.widgets.mainMenu.MainMenuWidget') ?>
				</div>
				<hr />
			</div>
		</div>
		<?php echo $content; ?>
		<div class="row">
			<div class="twelve columns">	
				<hr>
			</div>
		
			<div class="row" id="footer">
				<div class="four columns">
					<p>This is a twelve column section in a row. Each of these includes a div.panel element so you can see where the columns are - it`s not required at all for the grid.</p>
				</div>
				<div class="four columns">
					<p>This is a twelve column section in a row. Each of these includes a div.panel element so you can see where the columns are - it`s not required at all for the grid.</p>
				</div>
				<div class="four columns">
					<p>This is a twelve column section in a row. Each of these includes a div.panel element so you can see where the columns are - it`s not required at all for the grid.</p>
				</div>		
			</div>
			<div class="row">
				<div class="twelve columns">	
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="two columns"></div>
				<div class="ten columns align-right">
					
				</div>
			</div>
		</div>
	</div><!-- container -->
	<!-- Included JS Files -->
	<!--script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script-->
	<!-- Combine and Compress These JS Files -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.reveal.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.orbit-1.4.0.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.customforms.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.placeholder.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.tooltips.js"></script>
	<!-- End Combine and Compress These JS Files -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/app.js"></script>
</body>
</html>
