<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $superuser
 * @property string $email
 * @property string $fullname
 * @property integer $groupId
 */
class User extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, superuser, email, fullname, groupId', 'required'),
			array('superuser, groupId', 'numerical', 'integerOnly'=>true),
			array('username, password, email, fullname', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, superuser, email, fullname, groupId', 'safe', 'on'=>'search'),
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
			'controllaccesses' => array(self::HAS_MANY, 'Controllaccess', 'userId'),
			'group' => array(self::BELONGS_TO, 'Group', 'groupId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'username' => 'Username',
			'password' => 'Password',
			'superuser' => 'Superuser',
			'email' => 'Email',
			'fullname' => 'Fullname',
			'groupId' => 'Group',
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

		$criteria->compare('username',$this->username,true);

		$criteria->compare('password',$this->password,true);

		$criteria->compare('superuser',$this->superuser);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('fullname',$this->fullname,true);

		$criteria->compare('groupId',$this->groupId);

		return new CActiveDataProvider('User', array(
			'criteria'=>$criteria,
		));
	}
}
