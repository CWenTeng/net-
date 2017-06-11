<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Comment;

/**
 * CommentSearch represents the model behind the search form about `common\models\Comment`.
 */
class CommentSearch extends Comment
{
    //给user类添加user.username属性，给post类添加post.title属性
    public function attributes()
    {
        return array_merge(parent::attributes(),['user.username'],['post.title']);
    }
    /**
     * @inheritdoc在这里添加数据规则，会出现搜索框
     */
    public function rules()
    {
        return [
            [['id', 'status', 'create_time', 'userid', 'post_id'], 'integer'],
            [['content', 'phone_number', 'url','user.username','post.title'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Comment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //控制页数
            'pagination'=>['pageSize'=>10],
            'sort'=>[
                     'defaultOrder'=>[
                            'id'=>SORT_DESC,
                     ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'comment.id' => $this->id,
            'comment.status' => $this->status,
            'create_time' => $this->create_time,
            'userid' => $this->userid,
            'post_id' => $this->post_id,
        ]);

        $query->andFilterWhere(['like', 'comment.content', $this->content])
            ->andFilterWhere(['like', 'userid', $this->userid])
            ->andFilterWhere(['like', 'url', $this->url]);

        //用户名字
        //利用查询构建器的join连接数据表
        $query->join('INNER JOIN','user','comment.userid = user.id');
        //查询条件
        $query->andFilterWhere(['like','user.username',$this->getAttribute('user.username')]);
        
        $dataProvider->sort->attributes['user.username'] =
        [
                'asc'=>['user.username'=>SORT_ASC],
                'desc'=>['user.username'=>SORT_DESC],
        ];

        //文章题目
        //利用查询构建器的join连接数据表
        $query->join('INNER JOIN','post','comment.post_id = post.id');
        //查询条件
        $query->andFilterWhere(['like','post.title',$this->getAttribute('post.title')]);

         $dataProvider->sort->attributes['post.title'] =
        [
                'asc'=>['post.title'=>SORT_ASC],
                'desc'=>['post.title'=>SORT_DESC],
        ];


        //对状态栏设置待审核在上方，且带有背景颜色区别
        $dataProvider->sort->defaultOrder =
        [
            'status'=>SORT_ASC,
            'id'=>SORT_DESC,
        ];

        return $dataProvider;
    }
}
