<?php
$this->breadcrumbs=array(
	Yii::t('core', 'Categories')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Yii::t('core', 'Edit'),
);

$this->menu=array(
	array('label'=> Yii::t('core', 'List Categories'), 'url'=>array('index')),
	array('label'=> Yii::t('core', 'Create Category'), 'url'=>array('create')),
	array('label'=> Yii::t('core', 'Manage Categories'), 'url'=>array('manage')),
);
?>

<h1><?php echo Yii::t('core', 'Edit Category')?> : <?php echo $model->title; ?></h1>

<?php echo $this->renderPartial('core.views.categories.admin._form', array('model'=>$model)); ?>