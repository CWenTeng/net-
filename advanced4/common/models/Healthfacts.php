<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "healthfacts".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $author
 * @property integer $create_time
 */
class Healthfacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'healthfacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'author'], 'required'],
            [['content'], 'string'],
            [['create_time'], 'integer'],
            [['title', 'author'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'author' => '作者',
            'create_time' => '创建时间',
        ];
    }
    //修改时间和新增时间的添加，beforeSave方法用于区别是新增还是修改
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
    //将文章只显示20个字符
    public function getBeginning()
    {
        $tmpStr= strip_tags($this->content);
        $tmpLen=mb_strlen($tmpStr);
        return mb_substr($tmpStr,0,20,'utf-8').(($tmpLen>20)?'...':'');
    }

    //前台健康常识中的设定
    //给文章增加了一个url连接属性
    public function getUrl()
    {
        return Yii::$app->urlManager->createUrl(
                ['healthfacts/detail','id'=>$this->id,'title'=>$this->title]);
    }
}
