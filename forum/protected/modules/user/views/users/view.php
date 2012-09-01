<?php
$this->breadcrumbs=array(
	Yii::t('core', 'Users') =>array('index'),
	$model->id,
);
?>

<h1><?php echo Yii::t('core', 'User');?>: <?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
	),
)); ?>
