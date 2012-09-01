<?php
$this->breadcrumbs=array(
	Yii::t('core', 'Discussions')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Yii::t('core', 'Edit'),
);

$this->menu=array(
	array('label'=>Yii::t('core', 'List Discussions'), 'url'=>array('index')),
	array('label'=>Yii::t('core', 'Manage Discussions'), 'url'=>array('manage')),
);
?>

<h1><?php echo Yii::t('core', 'Edit Discussion')?>: <?php echo $model->title; ?></h1>

<?php echo $this->renderPartial('core.views.discussions.admin._form', array('model'=>$model)); ?>