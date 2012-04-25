<?php

class AccessControllTest extends CDbTestCase
{
    public $fixtures=array(
        'accessControlls'=>'AccessControll',
    );

    public function testCreate()
    {

    }

    public function testAllow()
    {
        AccessControll::model()->allow('system.controller.home.index','system.user');
    }


}
