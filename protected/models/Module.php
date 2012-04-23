<?php

/**
 * This is the model class for table "{{module}}".
 *
 * The followings are the available columns in table '{{module}}':
 * @property integer $id
 * @property string $name
 * @property string $label
 * @property string $author
 * @property string $email
 * @property string $website
 */
class Module extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Module the static model class
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
		return '{{module}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, label, author', 'required'),
			array('name, label, author, email, website', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, label, author, email, website', 'safe', 'on'=>'search'),
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
			'controllaccesses' => array(self::HAS_MANY, 'Controllaccess', 'moduleId'),
			'menus' => array(self::HAS_MANY, 'Menu', 'moduleId'),
			'slots' => array(self::HAS_MANY, 'Slot', 'moduleId'),
			'widgets' => array(self::HAS_MANY, 'Widget', 'moduleId'),
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
			'label' => 'Label',
			'author' => 'Author',
			'email' => 'Email',
			'website' => 'Website',
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

		$criteria->compare('label',$this->label,true);

		$criteria->compare('author',$this->author,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('website',$this->website,true);

		return new CActiveDataProvider('Module', array(
			'criteria'=>$criteria,
		));
	}
}
