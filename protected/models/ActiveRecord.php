<?php

abstract class ActiveRecord extends CActiveRecord
{
    protected $displayField = 'nama';

    public function behaviors(){
        return array(
            'CSaveRelationsBehavior' => array(
                'class' => 'application.components.CSaveRelationsBehavior'
            ),
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created',
                'updateAttribute' => 'modified',
            )
        );

    }

    public function __toString()
    {
        return isset($this->nama)?$this->nama:$this->id;
    }



    public function toJSON()
    {
        return CJSON::encode($this->attributes);
    }

    public function displayField()
    {
        if ($this->displayField !== null) {
            return $this->displayField;
        } else {
            throw new CException(Yii::t('app','Isi property $displayField pada class {class} dengan column yang akan ditampilkan menjadi text data',array(
                '{class}' => get_class($this)
            )));
        }

    }

    public function getListData()
    {
        $criteria = new CDbCriteria;
        $criteria->order = $this->displayField();
        return CHtml::listData($this->findAll($criteria),'id',$this->displayField());
    }

    protected function beforeDelete()
    {
        foreach($this->relations() as $relationName => $relation) {
            if ($relation[0] === self::HAS_MANY || $relation[0] === self::HAS_ONE) {
                $classModel = $relation[1];
                $foreignKey = $relation[2];
                $model = new $classModel;
                $model->updateAll(array($foreignKey => null),
                        "$foreignKey = :id",array('id' => $this->id));
            }
        }
        return true;
    }

}
