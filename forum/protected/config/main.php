<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'OC Forum 2',

	'theme'=>'yiiforum',

	'defaultController'=>'core',

	'sourceLanguage' => 'en',

	'language' => 'ru',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('*'),
		),
		'core',
		'user'
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			'class' => 'application.modules.user.components.WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('../index.php?route=account/login')
		),
		'authManager' => array(
		    // Будем использовать свой менеджер авторизации
		    'class' => 'application.modules.user.components.PhpAuthManager',
		    // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
		    'defaultRoles' => array('guest'),
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'rules'=>array(
				'discussion/<id:\d+>'=>'core/discussions/view',
				'discussion/update/<id:\d+>'=>'core/discussions/update',
				'discussions/create'=>'core/discussions/create',
				'discussions/category/<id:\d+>'=>'core/categories/view',

				//'discussion/<id:\d+>/<CorePosts_page:\d+>' => 'core/discussions/view',

				'admin'=>'admin/dashboard/index',

				'admin/<module:\w+>/<controller:\w+>/<id:\d+>'=>'<module>/admin/<controller>/view',
				'admin/<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<module>/admin/<controller>/<action>',
				'admin/<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/admin/<controller>/<action>',

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		// 'db'=>array(
		// 	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		// ),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=ocforum',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'password',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'widgetFactory'=>array(
			'class'=>'CWidgetFactory',
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'dateFormat' => 'M d, H:i',
		'postPageSize' => 25,
		'discussionsPageSize' => 30,
		'registerUrl' => '/index.php?route=account/register',
		'loginUrl' => '/index.php?route=account/login'
	),
);
