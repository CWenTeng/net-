<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $id
 * @property string $department_name
 * @property integer $create_time
 *
 * @property HospitalDepartments[] $hospitalDepartments
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_name', 'first_department'], 'required'],
            [['create_time'], 'integer'],
            [['department_name'], 'string', 'max' => 128],
            [['first_department'], 'string', 'max' => 155],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_department' => '第一科室', 
            'department_name' => '科室名称',
            'create_time' => '创建时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalDepartments()
    {
        return $this->hasMany(HospitalDepartments::className(), ['department_id' => 'id']);
    }

    //创建时间的设置
     public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if($insert)
            {
                $this->create_time = time();
            }
            return true;
        }
        else
        {
            return false;
        }
    }

    //前台健康常识中的设定
    //给文章增加了一个url连接属性
    public function getUrl()
    {
        return Yii::$app->urlManager->createUrl(
                ['department/detail','id'=>$this->id,'department_name'=>$this->department_name]);
    }
    
}
