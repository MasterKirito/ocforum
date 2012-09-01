<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-users-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class' => 'nice')
)); ?>

	<p class="note">
		<?php echo  Yii::t('core', 'Fields with <span class="required">*</span> are required.')?>
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128, 'class' => 'input-text')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128, 'class' => 'input-text')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128, 'class' => 'input-text')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('core', 'Create') : Yii::t('core', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->