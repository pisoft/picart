<?php

/**
 * This is the model class for table "{{group}}".
 *
 * The followings are the available columns in table '{{group}}':
 * @property integer $id
 * @property string $name
 * @property string $label
 * @property integer $parentId
 */
class Group extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return Group the static model class
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
        return '{{group}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, label', 'required'),
            array('parentId', 'numerical', 'integerOnly'=>true),
            array('name, label', 'length', 'max'=>255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, label, parentId', 'safe', 'on'=>'search'),
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
            'accesscontrolls' => array(self::HAS_MANY, 'Accesscontroll', 'groupId'),
            'parent' => array(self::BELONGS_TO, 'Group', 'parentId'),
            'groups' => array(self::HAS_MANY, 'Group', 'parentId'),
            'users' => array(self::HAS_MANY, 'User', 'groupId'),
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
            'parentId' => 'Parent',
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

        $criteria->compare('parentId',$this->parentId);

        return new CActiveDataProvider('Group', array(
            'criteria'=>$criteria,
        ));
    }

    public function add($name)
    {
    }
}
