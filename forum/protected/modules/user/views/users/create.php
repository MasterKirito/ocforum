<?php
$this->breadcrumbs=array(
	Yii::t('user', 'Users')=>array('index'),
	Yii::t('core', 'Create'),
);
?>

<h3><?php echo Yii::t('user', 'Register');?></h3>

<?php echo $this->renderPartial('user.views.users._form', array('model'=>$model)); ?>