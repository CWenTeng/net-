<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property integer $create_time
 * @property integer $userid
 * @property string $phone_number
 * @property string $url
 * @property integer $post_id
 *
 * @property Post $post
 * @property Commentstatus $status0
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'status', 'userid', 'phone_number', 'post_id'], 'required'],
            [['content'], 'string'],
            [['status', 'create_time', 'userid', 'post_id'], 'integer'],
            [['phone_number', 'url'], 'string', 'max' => 128],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Commentstatus::className(), 'targetAttribute' => ['status' => 'id']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => '内容',
            'status' => '状态',
            'create_time' => '发布时间',
            'userid' => '用户',
            'phone_number' => '手机号',
            'url' => 'Url',
            'post_id' => '文章',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Commentstatus::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }

    //将文章只显示20个字符
    public function getBeginning()
    {
        $tmpStr= strip_tags($this->content);
        $tmpLen=mb_strlen($tmpStr);
        return mb_substr($tmpStr,0,20,'utf-8').(($tmpLen>20)?'...':'');
    }
    
    //对评论的审核改变
    public function approve()
    {
        $this->status = 2;//设置评论状态为已审核
        return ($this->save()?true:flase);
    }

    //气泡
    public static function getPengdingConmmentCount()
    {
        return Comment::find()->where(['status'=>1])->count();
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

    //查出最近的评论
    public static function findRecentComments($limit=10)
    {
        return Comment::find()->where(['status'=>2])->orderBy('create_time DESC')
        ->limit($limit)->all();
    }   
}
