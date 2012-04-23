<?php

/**
 * This is the model class for table "{{controllaccess}}".
 *
 * The followings are the available columns in table '{{controllaccess}}':
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property integer $read
 * @property integer $create
 * @property integer $update
 * @property integer $delete
 * @property integer $moduleId
 * @property integer $groupId
 * @property integer $userId
 */
class ControllAccess extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ControllAccess the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{controllaccess}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, type, read, create, update, delete, moduleId, groupId, userId', 'required'),
			array('read, create, update, delete, moduleId, groupId, userId', 'numerical', 'integerOnly'=>true),
			array('name, type', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, type, read, create, update, delete, moduleId, groupId, userId', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'userId'),
			'group' => array(self::BELONGS_TO, 'Group', 'groupId'),
			'module' => array(self::BELONGS_TO, 'Module', 'moduleId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Name',
			'type' => 'Type',
			'read' => 'Read',
			'create' => 'Create',
			'update' => 'Update',
			'delete' => 'Delete',
			'moduleId' => 'Module',
			'groupId' => 'Group',
			'userId' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('type',$this->type,true);

		$criteria->compare('read',$this->read);

		$criteria->compare('create',$this->create);

		$criteria->compare('update',$this->update);

		$criteria->compare('delete',$this->delete);

		$criteria->compare('moduleId',$this->moduleId);

		$criteria->compare('groupId',$this->groupId);

		$criteria->compare('userId',$this->userId);

		return new CActiveDataProvider('ControllAccess', array(
			'criteria'=>$criteria,
		));
	}
}