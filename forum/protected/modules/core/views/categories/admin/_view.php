<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo $data->id; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::link($data->title, Yii::app()->request->baseUrl.'/discussions/category/'.$data->id); ?>
	<br />


</div>