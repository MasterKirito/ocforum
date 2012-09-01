<?php

Yii::import('application.modules.core.models.*');

class LatestDiscussionsWidget extends CWidget
{
	public function init()
	{

	}

	public function run()
	{
		$this->render('discussions', array(
			'discussions' => $this->getDiscussions(),
		));
	}

	public function getDiscussions()
	{
		return CoreDiscussions::model()->resently(5)->findAll();
	}
}