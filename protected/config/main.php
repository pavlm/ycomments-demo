<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Web Application with YComments',

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
			'password'=>'giip',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

		'ycomments' => array(
				'class' => 'application.modules.ycomments.YCommentsModule',
				'commentableTypes' => array(
						'news' => 'News',
				),
				// set this to the class name of the model that represents your users
				'userModelClass' => 'User',
				// set this to the username attribute of User model class
				'userNameAttribute' => 'username',
				// set this to the email attribute of User model class
				'userEmailAttribute' => 'email',
				// you can set controller filters that will be added to the comment controller {@see CController::filters()}
				//          'controllerFilters'=>array(),
				// you can set accessRules that will be added to the comment controller {@see CController::accessRules()}
				//          'controllerAccessRules'=>array(),
				// you can extend comment class and use your extended one, set path alias here
				//          'commentModelClass'=>'comment.models.Comment',
				// 		    		'onNewComment' => array('Organization', 'onNewCommentHandler'),
				'notifyMailFrom' => 'user@yandex.ru',
				//'adminLayout' => '//layouts/main-admin',
				'criteriaAdminUsers' => array('condition' => 't.id == 1'),
				'adminUserClosure' => function($u) { return $u->id == 1; },
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		
		'authManager'=>array(
				//'class'=>'CPhpAuthManager',
				'authFile' => __DIR__.'/auth.php',
				'defaultRoles'=>array('guest', 'authenticated', 'commentator', 'comment-author'),
		),
			
				
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=ycomments_demo',
			'emulatePrepare' => true,
			'username' => 'ycomments_demo',
			'password' => 'ycomments_demo',
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
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);