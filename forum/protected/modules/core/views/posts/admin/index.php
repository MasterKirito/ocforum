<?php
$this->breadcrumbs=array(
	Yii::t('core', 'Posts'),
);

$this->menu=array(
	array('label'=>Yii::t('core', 'Manage Posts'), 'url'=>array('manage')),
);
?>

<h1><?php echo Yii::t('core', 'Posts');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'core.views.posts.admin._view',
)); ?>
