<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reserve".
 *
 * @property integer $id
 * @property string $phone_number
 * @property integer $expert_id
 * @property string  $reserve_time
 * @property integer $medical_treatment
 *
 * @property Expert $expert
 */
class Reserve extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserve';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone_number','reserve_time', 'expert_id', 'medical_treatment'], 'required'],
            [['expert_id', 'medical_treatment'], 'integer'],
            [['reserve_time'], 'safe'],
            [['phone_number'], 'string', 'max' => 128],
            [['expert_id'], 'exist', 'skipOnError' => true, 'targetClass' => Expert::className(), 'targetAttribute' => ['expert_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone_number' => '手机号',
            'expert_id' => '专家ID',
            'reserve_time' => '预定时间',
            'medical_treatment' => '是否就医',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpert()
    {
        return $this->hasOne(Expert::className(), ['id' => 'expert_id']);
    }
}
