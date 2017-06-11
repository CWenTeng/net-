<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Post;

/**
 * PostSearch represents the model behind the search form about `common\models\Post`.
 */
class PostSearch extends Post
{
    //可以对属性进行增加和删除
    public function attributes()
    {
        return array_merge(parent::attributes(),['authorName']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'create_time', 'update_time', 'author_id'], 'integer'],
            [['title', 'content', 'tags','authorName'], 'safe'],
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
        //构建了一个查询
        $query = Post::find();

        // add conditions that should always apply here
        //把数据分页排序都封装好了 
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
        //load块复制，把查询的字符复制给当前对象的属性
        $this->load($params);
        //判断当前提交的数据是否符合规则
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            //下面一句话表示如果查询不为整数则查询不了，根据自己的策略来选择是否显示查询数据
            // $query->where('0=1');
            return $dataProvider;
        }

        //下面两个都是在程序化的构造查询
        // grid filtering conditions
        //构建查询条件
        $query->andFilterWhere([
            'post.id' => $this->id,
            'status' => $this->status,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'author_id' => $this->author_id,
        ]);
        //下面是查询语句
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'tags', $this->tags]);

        //利用查询构建器的join连接数据表
        $query->join('INNER JOIN','Adminuser','post.author_id = Adminuser.id');
        //查询条件
        $query->andFilterWhere(['like','Adminuser.nickname',$this->authorName]);
            
        //给姓名加上排序
        $dataProvider->sort->attributes['authorName']=
        [
            'asc'=>['Adminuser.nickname'=>SORT_ASC],
            'desc'=>['Adminuser.nickname'=>SORT_DESC],
        ];
        return $dataProvider;
    }
}
