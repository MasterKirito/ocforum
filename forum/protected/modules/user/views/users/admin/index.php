<?php
$this->breadcrumbs=array(
	'User Users',
);

$this->menu=array(
	array('label'=>'Create UserUsers', 'url'=>array('create')),
	array('label'=>'Manage UserUsers', 'url'=>array('manage')),
);
?>

<h1>User Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'user.views.users.admin._view',
)); ?>
