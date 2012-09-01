<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'core-discussions-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class' => 'nice')
)); ?>

	<p class="note">
		<?php echo  Yii::t('core', 'Fields with <span class="required">*</span> are required.')?>
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class' => 'input-text')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50, 'class' => 'comment-body')); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id', CoreCategories::model()->listCategories()); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status', array(
				1 => Yii::t('core', 'enabled'), 
				0 => Yii::t('core', 'disabled')
			)
		); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<div class="ten columns "></div>
		<div class="two columns align-right">
			<a href="javascript:jQuery('#core-discussions-form').submit()" class="small blue button"><?php echo $model->isNewRecord ? Yii::t('core', 'Create') : Yii::t('core', 'Save') ?></a>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->