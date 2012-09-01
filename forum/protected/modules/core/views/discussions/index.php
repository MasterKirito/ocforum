<?php
$this->breadcrumbs=array(
	Yii::t('core', 'All Discussions'),
);

$this->menu=array(
	array('label'=>'Create CoreDiscussions', 'url'=>array('create')),
	array('label'=>'Manage CoreDiscussions', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('core', 'All Discussions'); ?></h3>

<?php echo CHtml::link(Yii::t('core', 'Add New Discussion'), Yii::app()->request->baseUrl.'/discussions/create') ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	//'itemView'=>'_view',
	'columns' => array(
		array(            // display 'author.username' using an expression
            'class' => 'application.modules.core.components.grid.DuscussionColumn',
        ),
		array(            // display 'author.username' using an expression
            'label'=>Yii::t('core', 'Views'),
            'value'=>'$data->views_count',
            'class' => 'application.modules.core.components.grid.CustomColumn',
            'htmlOptions' => array(
            	'class' => 'td-comments'
            )
        ),
		array(  
            'label'=>Yii::t('core', 'Comments'),
            'value'=>'$data->postsCount',
            'class' => 'application.modules.core.components.grid.CustomColumn',
            'htmlOptions' => array(
            	'class' => 'td-comments'
            )
        )
	),
    'htmlOptions' => array(
    	'class' => 'long-table'
    ),
    'hideHeader' => true
)); ?>
