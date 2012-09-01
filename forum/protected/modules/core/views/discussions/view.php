<?php
$this->breadcrumbs=array(
	'Discussions'=>array('index'),
	$model->title,
);
?>
<h4><?php echo $model->title; ?></h4>
<?php echo $this->renderPartial('_view', array('model'=>$model)); ?>
<?php if(Yii::app()->user->checkAccess('moderator') || Yii::app()->user->isOwner($model)): ?>
	<div class="row">
		<div class="nine columns "></div>
		<div class="tree columns align-right">
			<a href="#" class="small blue button"><?php echo Yii::t('core', 'Delete'); ?></a>
			<a href="<?php echo Yii::app()->request->baseUrl?>/discussion/2/update" class="small blue button"><?php echo Yii::t('core', 'Edit'); ?></a>
		</div>
	</div>
<?php endif;?>
<hr />
<?php if($model->postsCount) : ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns' => array(
		array(           
            'class' => 'application.modules.core.components.grid.PostColumn',
        ),
	),
    'htmlOptions' => array(
    	'class' => 'long-table'
    ),
    'hideHeader' => true,
    'template' => '{items}{pager}',
    'pager' =>array(
		'class' => 'CLinkPager',
		'skin'=>'yiiforum',
		'htmlOptions' => array('class' => 'pagination'),
		'selectedPageCssClass' => 'current',
		'hiddenPageCssClass' => 'unavailable',
		'nextPageLabel' => '>',
		'prevPageLabel' => '<',
		'firstPageLabel' => '<<',
		'lastPageLabel' => '>>',
	)
)); ?>
<?php endif;?>
<?php if(Yii::app()->user->checkAccess('user')): ?>
	<div class="create-comment form">
	<?php echo $this->renderPartial('/posts/_form', array('model'=>$post)); ?>
	</div>
<?php endif;?>
