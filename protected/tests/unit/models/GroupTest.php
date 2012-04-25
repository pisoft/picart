<?php

class GroupTest extends CDbTestCase
{
    public $fixtures=array(
        'groups' => 'Group',
        'users' => 'User'
    );


    public function testCreate()
    {
    }

    public function testAdd()
    {
        Group::model()->add('system.user');
        $group_user = Group::model()->findByAttributes(array(
            'name' => 'system.user')
        );
        Group::model()->add('system.admin', 'system.user');
        $group_admin = Group::model()->findByAttributes(array(
            'name' => 'system.admin')
        );
        $this->assertEquals('system.user',$group_user->name);
        $this->assertEquals('System / User',$group_user->label);
        $this->assertNull($group_user->parent);
        $this->assertEquals('system.admin', $group_admin->parent->name);

    }


    /**
     * @depends testAdd
     */
    public function testAddUser()
    {
        $group_user = Group::model()->findByAttributes(array(
            'name' => 'system.user')
        );
        $group_admin= Group::model()->findByAttributes(array(
            'name' => 'system.admin')
        );
        $admin = User::model()->findByAttributes(array('username' => 'admin'));
        $jono = User::model()->findByAttributes(array('username' => 'jono'));
        $group_admin->addUser($admin);
        $group_user->addUser('jono');
        $admin->refresh();
        $jono->refresh();
        $this->assertEquals($group_admin->id, $admin->group->id);
        $this->assertEquals($group_user->id, $jono->group->id);
    }

}
