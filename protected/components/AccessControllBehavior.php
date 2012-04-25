<?php


class AccessControllBehavior extends CActiveRecordBehavior
{
    public function onBeforeFind($event)
    {
        throw new CException(Yii::t('system','CDbHttpSession.connectionID "{id}" is invalid. Please make sure it refers to the ID of a CDbConnection application component.',
                    array('{id}'=>$id)));
    }

}

