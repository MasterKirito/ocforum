<h5><?php echo Yii::t('core', 'Discussions') ?></h5>
<dl class="nice vertical tabs dl-categories">
	<?php foreach ($discussions as $discussion):?>
		<dd>
		<a href="/discussion/<?php echo $discussion->id;?>">
			<span class="menu-catname"><?php echo mb_substr($discussion->title, 0, 10, 'UTF-8').'...' ?></span>
			<span class="menu-catcount"><?php echo date(Yii::app()->params['dateFormat'],strtotime($discussion->date)) ?></span>
		</a>
	</dd>
	<?php endforeach; ?>
</dl>