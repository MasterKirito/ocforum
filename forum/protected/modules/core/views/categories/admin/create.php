<?php
$this->breadcrumbs=array(
	Yii::t('core', 'Categories') =>array('index'),
	Yii::t('core', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('core', 'List Categories'), 'url'=>array('index')),
	array('label'=>Yii::t('core', 'Manage Categories'), 'url'=>array('manage')),
);
?>

<h1><?php echo Yii::t('core', 'Create Category'); ?></h1>

<?php echo $this->renderPartial('core.views.categories.admin._form', array('model'=>$model)); ?>