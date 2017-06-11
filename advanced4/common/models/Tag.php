<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property string $name
 * @property integer $frequency
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['frequency'], 'integer'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'frequency' => 'Frequency',
        ];
    }

    //将字符串转化我为数组
     public static  function string2array($tags)
    {
        return preg_split('/\s*,\s*/',trim($tags),-1,PREG_SPLIT_NO_EMPTY);
    }

    //将数组转化为字符串
    public static  function array2string($tags)
    {
        return implode(', ',$tags);
    }

    //处理增加的标签
    public static function addTags($tags)
    {
        //判断tags是否是空值若是空值什么都不做
        if(empty($tags)) return ;
        //逐个处理需要增加的标签
        foreach ($tags as $name)
        {
            //先从数据库中读出对象
            $aTag = Tag::find()->where(['name'=>$name])->one();
            //查看这个标签的记录条数
            $aTagCount = Tag::find()->where(['name'=>$name])->count();
            //如果标签不存在则新增标签，使其值为1，若标签存在则加1
            if(!$aTagCount)
            {
                $tag = new Tag;
                $tag->name = $name;
                $tag->frequency = 1;
                $tag->save();
            }
            else 
            {
                $aTag->frequency += 1;
                $aTag->save();
            }
        }
    }

    //处理删除的标签
    public static function removeTags($tags)
    {
        if(empty($tags)) return ;
        
        foreach($tags as $name)
        {
            $aTag = Tag::find()->where(['name'=>$name])->one();
            $aTagCount = Tag::find()->where(['name'=>$name])->count();
            
            if($aTagCount)
            {
                //如果标签是1，则删除标签，否则减1
                if($aTagCount && $aTag->frequency<=1)
                {
                    $aTag->delete();
                }
                else 
                {
                    $aTag->frequency -= 1;
                    $aTag->save();
                }
            }
        }
    }

    //更新标签次数
     public static function updateFrequency($oldTags,$newTags)
    {
        if(!empty($oldTags) || !empty($newTags))
        {
            $oldTagsArray = self::string2array($oldTags);
            $newTagsArray = self::string2array($newTags);
            
            self::addTags(array_values(array_diff($newTagsArray,$oldTagsArray)));
            self::removeTags(array_values(array_diff($oldTagsArray,$newTagsArray)));
        }
    }

    //医院社区前台页面，标签云，显示标签大小，颜色的显示
    public static function findTagWeights($limit=20)
    {
        $tag_size_level = 5;
         
        $models=Tag::find()->orderBy('frequency desc')->limit($limit)->all();
        $total=Tag::find()->limit($limit)->count();
         
        $stepper=ceil($total/$tag_size_level);
         
        $tags=array();
        $counter=1;
         
        if($total>0)
        {
            foreach ($models as $model)
            {
                $weight=ceil($counter/$stepper)+1;
                $tags[$model->name]=$weight;
                $counter++;
            }
            ksort($tags);
        }
        return $tags;
    }
    
}
