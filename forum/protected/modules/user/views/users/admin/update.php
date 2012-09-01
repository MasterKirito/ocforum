<?php
$this->breadcrumbs=array(
	Yii::t('user', 'Users')=>array('index'),
	$model->user_id=>array('view','id'=>$model->user_id),
	Yii::t('core', 'Edit'),
);
?>
<h3><?php echo Yii::t('core', 'Edit User') ?>: <?php echo $model->username; ?></h3>

<?php echo $this->renderPartial('user.views.users.admin._form', array('model'=>$model)); ?>