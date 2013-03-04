<?php
class DbTest extends CTestCase
{
	public function testConnetion()
	{
		$this->assertNotEquals(NULL,Yii::app()->db);
	}
}