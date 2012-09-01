<?php $this->widget('zii.widgets.CMenu',array(
	'items'=>array(
		array('label'=>Yii::t('core', 'Home'), 'url'=>Yii::app()->request->baseUrl, 'linkOptions' => array('class' => 'main')),
		array('label'=>Yii::t('core', 'Login'), 'url'=>Yii::app()->params['loginUrl']/*array('/user/users/login')*/, 'visible'=>Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'main')),
		array('label'=>Yii::t('user', 'Register'), 'url'=>Yii::app()->params['registerUrl'], 'visible'=>Yii::app()->user->isGuest),
		array('label'=>Yii::t('core', 'Logout') . '('.Yii::app()->user->name.')', 'url'=>array('/user/users/logout'), 'visible'=>!Yii::app()->user->isGuest, 'linkOptions' => array('class' => 'main')),
	),
	'htmlOptions' => array('class' => 'nav-bar')
)); ?>
