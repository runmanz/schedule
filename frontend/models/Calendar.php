<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "calendar".
 *
 * @property int $id
 * @property int $s_id
 * @property int $time
 * @property int $created_at
 */
class Calendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_id', 'time', 'created_at'], 'required'],
            [['s_id', 'time', 'created_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            's_id' => '值班人员ID',
            'time' => '值班时间',
            'created_at' => '创建时间',
        ];
    }

    /**
     * @return yii\db\ActiveQuery
    */
    public function getScheduler(){
        return $this->hasOne(Scheduler::className(), ['s_id' => 'id']);
    }
}
