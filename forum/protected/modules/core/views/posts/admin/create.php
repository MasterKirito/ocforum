<?php
$this->breadcrumbs=array(
	'Core Posts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CorePosts', 'url'=>array('index')),
	array('label'=>'Manage CorePosts', 'url'=>array('manage')),
);
?>

<h1>Create CorePosts</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>