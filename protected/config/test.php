<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			'db'=>array(
				'connectionString'=>'mysql:host=localhost;dbname=yii_trackstar_test',
				'emulatePrepare' => true,
				'username' => 'yii',
				'password' => '9QUvPBEHddrrGH6G',
				'charset' => 'utf8',
			),
		),
	)
);
