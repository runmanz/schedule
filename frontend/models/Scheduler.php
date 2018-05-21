<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "scheduler".
 *
 * @property int $id
 * @property string $name
 * @property string $department
 * @property int $created_at
 * @property int $updated_at
 */
class Scheduler extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scheduler';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'department'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '值班人名',
            'department' => '科室',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    public function getSchedulers(){
        $data = static::find()->orderBy('id asc')->all();

        return $data;
    }
}
