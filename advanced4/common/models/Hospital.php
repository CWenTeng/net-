<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hospital".
 *
 * @property integer $id
 * @property string $hospital_name
 * @property string $expert_introduction
 * @property string $hospital_address
 * @property integer $create_time
 * @property integer $update_time
 *
 * @property Expert[] $experts
 */
class Hospital extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hospital';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospital_name', 'expert_introduction', 'hospital_address', 'hospital_type', 'hospital_grade'], 'required'],
            [['expert_introduction'], 'string'],
            [['create_time', 'update_time'], 'integer'],
            [['hospital_name'], 'string', 'max' => 128],
            [['hospital_address'], 'string', 'max' => 255],
            [['hospital_type', 'hospital_grade'], 'string', 'max' => 155], 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hospital_name' => '医院名称',
            'expert_introduction' => '医院简介',
            'hospital_address' => '医院地址',
            'hospital_type' => '医院类型',
            'hospital_grade' => '医院等级',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperts()
    {
        return $this->hasMany(Expert::className(), ['hospital_id' => 'id']);
    }

    //前台健康常识中的设定
    //给文章增加了一个url连接属性
    public function getUrl()
    {
        return Yii::$app->urlManager->createUrl(
                ['hospital/detail','id'=>$this->id,'hospital_name'=>$this->hospital_name]);
    }
    
}
