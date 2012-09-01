<h5><?php echo Yii::t('core', 'Categories') ?></h5>
<dl class="nice vertical tabs dl-categories">
	<dd>
		<a href="/">
			<span class="menu-catname"><?php echo Yii::t('core', 'All') ?></span>
			<span class="menu-catcount"><?php echo $allCount ?></span>
		</a>
	</dd>
	<?php foreach ($categories as $category):?>
		<dd>
		<a href="/discussions/category/<?php echo $category->id;?>">
			<span class="menu-catname"><?php echo $category->title ?></span>
			<span class="menu-catcount"><?php echo $category->discussionsCount ?></span>
		</a>
	</dd>
	<?php endforeach; ?>
</dl>