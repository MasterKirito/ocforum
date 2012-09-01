<p>
<?php echo Yii::t('core', 'Autor'); ?>: <?php echo $model->getUser()->username ?>,
<?php echo Yii::t('core', 'Category')?>: <a href="<?php echo Yii::app()->request->baseUrl; ?>/discussions/category/<?php $model->category->id;?>"><?php echo $model->category->title?></a>,
<?php echo Yii::t('core', 'Date')?>: <?php echo date(Yii::app()->params['dateFormat'],strtotime($model->date)) ;?>		
</p>

<div class="post-body" id="post-body">
	<?php echo $model->text?>
</div>