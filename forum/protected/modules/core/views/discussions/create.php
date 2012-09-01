<?php
$this->breadcrumbs=array(
	'Discussions'=>array('index'),
	'Create',
);
?>

<h3><?php echo Yii::t('core', 'Create Discussions');?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>