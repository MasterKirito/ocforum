<div class="form">
<h5><?php echo  Yii::t('core', 'Add Comment');?></h5>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'core-posts-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class' => 'nice')
)); ?>

	<p class="note">
		<?php echo  Yii::t('core', 'Fields with <span class="required">*</span> are required.')?>
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50, 'class' => 'comment-body')); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<div class="ten columns "></div>
		<div class="two columns align-right">
			<a href="javascript:jQuery('#core-posts-form').submit()" class="small blue button"><?php echo $model->isNewRecord ? Yii::t('core', 'Add') : Yii::t('core', 'Save') ?></a>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->