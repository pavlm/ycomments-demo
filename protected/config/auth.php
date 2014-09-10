<?php

return array (
	'guest' => array (
		'description' => '',
		'type' => 2,
		'bizRule' => 'return Yii::app()->user->isGuest;',
		'data' => null,
	),
	'authenticated' => array (
			'description' => '',
			'type' => 2,
			'bizRule' => 'return !Yii::app()->user->isGuest;',
			'data' => null,
	),

	'comment-admin' => array(
			'type' => CAuthItem::TYPE_ROLE,
			'description' => '',
			'bizRule' => '',
			'data' => '',
			'children' => array(
					'comment-author',
					'commentator',
			),
			'assignments' => array(
					1 => array('bizRule'=>null, 'data'=>null),
			),
	),
	
	'comment-author' => array(
			'type' => CAuthItem::TYPE_ROLE,
			'description' => '',
			'bizRule' => 'return $params["comment"] && !$params["comment"]->id || ($params["comment"]->isUserAuthor());',
			'data' => '',
			'children' => array(
					'commentator',
			),
	),
	
	'commentator' => array(
			'type' => CAuthItem::TYPE_ROLE,
			'description' => '',
			//'bizRule' => 'return !Yii::app()->user->isGuest /* && !Yii::app()->user->isBlocked();*/',
			'bizRule' => 'return !Yii::app()->user->isGuest;',
			'data' => '',
			'children' => array(
			),
	),
		
);
