<?php

Yii::import('application.modules.core.models.*');

class CategoriesWidget extends CWidget
{
	public function init()
	{

	}

	public function run()
	{
		$this->render('categories', array(
			'categories' => $this->getCategories(),
			'allCount' => CoreDiscussions::model()->count('status=1')
		));
	}

	public function getCategories()
	{
		return CoreCategories::model()->findAll();
	}
}