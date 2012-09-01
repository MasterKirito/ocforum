<?php
$this->breadcrumbs=array(
	Yii::t('core', 'Posts')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('core', 'Edit'),
);

$this->menu=array(
	array('label'=>Yii::t('core', 'List Posts'), 'url'=>array('index')),
	array('label'=>Yii::t('core', 'Manage Posts'), 'url'=>array('manage')),
);
?>

<h1><?php echo Yii::t('core', 'Edit Post');?>: <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('core.views.posts.admin._form', array('model'=>$model)); ?>