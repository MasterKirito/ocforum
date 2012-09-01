<?php
$this->breadcrumbs=array(
	Yii::t('core', 'Categories'),
);

$this->menu=array(
	array('label'=>Yii::t('core', 'Create Category'), 'url'=>array('create')),
	array('label'=>Yii::t('core', 'Manage Categories'), 'url'=>array('manage')),
);
?>

<h1><?php echo  Yii::t('core', 'Categories')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'core.views.categories.admin._view',
)); ?>
