<h5><?php echo Yii::t('core', 'Comments') ?></h5>
<dl class="nice vertical tabs dl-categories">
	<?php foreach ($comments as $comment):?>
		<dd>
		<a href="/discussion/<?php echo $comment->discussion_id;?>">
			<span class="menu-catname"><?php echo mb_substr($comment->text, 0, 10, 'UTF-8').'...' ?></span>
			<span class="menu-catcount"><?php echo date(Yii::app()->params['dateFormat'],strtotime($comment->date)) ?></span>
		</a>
	</dd>
	<?php endforeach; ?>
</dl>