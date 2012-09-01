<?php
$this->breadcrumbs=array(
    Yii::t('core', 'Discussions'),
);

$this->menu=array(
    array('label'=>Yii::t('core', 'Manage Discussions'), 'url'=>array('manage')),
);
?>

<h1><?php echo Yii::t('core', 'Discussions'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'core.views.discussions.admin._view',
)); ?>
