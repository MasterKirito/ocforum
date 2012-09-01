<?php
$this->breadcrumbs=array(
	Yii::t('user', 'Users')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('core', 'Edit'),
);
?>
<h3><?php echo Yii::t('core', 'Edit User') ?>: <?php echo $model->username; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>