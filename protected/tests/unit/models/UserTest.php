<?php

class UserTest extends CDbTestCase
{
    public $fixtures=array(
        'users'=>'User',
    );

    public function testCreate()
    {

    }

    public function testFindByUsername()
    {
        $admin = User::model()->findByUsername('admin');
        $this->assertEquals('admin',$admin->username);
    }
}
