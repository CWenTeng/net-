<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "expert".
 *
 * @property integer $id
 * @property string $expert_name
 * @property integer $hospital_id
 * @property string $expert_introduction
 * @property integer $create_time
 * @property integer $update_time
 *
 * @property Hospital $hospital
 * @property Reserve[] $reserves
 */
class Expert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expert_name', 'hospital_id', 'expert_introduction', 'department'], 'required'],
            [['hospital_id', 'create_time', 'update_time'], 'integer'],
            [['expert_introduction'], 'string'],
            [['expert_name'], 'string', 'max' => 128],
            [['department'], 'string', 'max' => 255], 
            [['hospital_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hospital::className(), 'targetAttribute' => ['hospital_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'expert_name' => '专家名',
            'hospital_id' => '医院ID',
            'expert_introduction' => '专家简介',
            'department' => '科室',
            'create_time' => '录入时间',
            'update_time' => '修改时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospital()
    {
        return $this->hasOne(Hospital::className(), ['id' => 'hospital_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReserves()
    {
        return $this->hasMany(Reserve::className(), ['expert_id' => 'id']);
    }
    //创建修改时间的设置
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if($insert)
            {
                $this->create_time = time();
                $this->update_time = time();
            }
            else
            {
                $this->update_time = time();
            }

            return true;
        }
        else
        {
            return false;
        }
    }
}
