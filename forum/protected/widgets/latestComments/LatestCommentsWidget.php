<?php

Yii::import('application.modules.core.models.*');

class LatestCommentsWidget extends CWidget
{
	public function init()
	{

	}

	public function run()
	{
		$this->render('comments', array(
			'comments' => $this->getPosts(),
		));
	}

	public function getPosts()
	{
		return CorePosts::model()->resently(5)->findAll();
	}
}