<?php

class m120404_051044_init extends CDbMigration
{

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $this->createTable('system_module',array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'label' => 'string NOT NULL',
            'author' => 'string NOT NULL',
            'email' => 'string',
            'website' => 'string',
        ),'engine=innoDB');
        
        $this->createTable('system_group',array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'parentId' => 'integer NOT NULL'
        ),'engine=innoDB');
        $this->addForeignKey('system_group_parentId','system_group','parentId','system_group','id');
        
        $this->createTable('system_user',array(
            'id' => 'pk',
            'username' => 'string NOT NULL',
            'password' => 'string NOT NULL',
            'superuser' => 'boolean NOT NULL',
            'email' => 'string NOT NULL',
            'fullname' => 'string NOT NULL',
            'groupId' => 'integer NOT NULL',
        ),'engine=innoDB');
        $this->addForeignKey('system_user_groupById','system_user','groupId','system_group','id');
        
        $this->createTable('system_menu',array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'label' => 'string NOT NULL',
            'parentId' => 'integer NOT NULL',
            'moduleId' => 'integer NOT NULL',
        ),'engine=innoDB');
        $this->addForeignKey('system_menu_parentId','system_menu','parentId','system_menu','id');
        $this->addForeignKey('system_menu_moduleId','system_menu','moduleId','system_module','id');
        
        $this->createTable('system_controllaccess',array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'type' => 'string NOT NULL',
            'read' => 'boolean NOT NULL',
            'create' => 'boolean NOT NULL',
            'update' => 'boolean NOT NULL',
            'delete' => 'boolean NOT NULL',
            'moduleId' => 'integer NOT NULL',
            'groupId' => 'integer NOT NULL',
            'userId' => 'integer NOT NULL',
        ),'engine=innoDB');
        $this->addForeignKey('system_controllaccess_moduleId','system_controllaccess',
                             'moduleId','system_module','id');
        $this->addForeignKey('system_controllaccess_groupById','system_controllaccess',
                             'groupId','system_group','id');
        $this->addForeignKey('system_controllaccess_userById','system_controllaccess',
                             'userId','system_user','id');
        
        $this->createTable('system_theme',array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'label' => 'string NOT NULL',
            'author' => 'string NOT NULL',
            'email' => 'string',
            'website' => 'string',
        ),'engine=innoDB');
        
        $this->createTable('system_widget',array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'label' => 'string NOT NULL',
            'moduleId' => 'integer NOT NULL',
        ),'engine=innoDB');
        $this->addForeignKey('system_widget_moduleId','system_widget',
                             'moduleId','system_module','id');
        
        $this->createTable('system_slot',array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'label' => 'string NOT NULL',
            'moduleId' => 'integer NOT NULL',
        ),'engine=innoDB');
        $this->addForeignKey('system_slot_moduleId','system_slot',
                             'moduleId','system_module','id');
        
        
        $this->createTable('system_slot_has_widget',array(
            'slotId' => 'integer NOT NULL',
            'widgetId' => 'integer NOT NULL',
        ),'engine=innoDB');
        $this->addForeignKey('system_slot_has_widget_slotId',
                             'system_slot_has_widget',
                             'slotId','system_widget','id');
        $this->addForeignKey('system_slot_has_widget_widgetId',
                             'system_slot_has_widget',
                             'widgetId','system_widget','id');
    }

    public function safeDown()
    {
        $this->dropTable('system_slot_has_widget');
        $this->dropTable('system_slot');
        $this->dropTable('system_widget');
        $this->dropTable('system_theme');
        $this->dropTable('system_controllaccess');
        $this->dropTable('system_menu');
        $this->dropTable('system_user');
        $this->dropTable('system_group');
        $this->dropTable('system_module');
    }
}
