<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
	<div id="content" class="columns eight">
		<?php echo $content; ?>
	</div>
	<div id="sidebar" class="columns four">
	<?php $this->widget('application.widgets.categories.CategoriesWidget'); ?>
	<?php $this->widget('application.widgets.latestComments.LatestCommentsWidget'); ?>
	<?php $this->widget('application.widgets.latestDiscussions.LatestDiscussionsWidget'); ?>
	</div><!-- sidebar -->
</div>
	

<?php $this->endContent(); ?>