<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Reserve;

/**
 * ReserveSearch represents the model behind the search form about `common\models\Reserve`.
 */
class ReserveSearch extends Reserve
{
    public function attributes()
    {
        return array_merge(parent::attributes(),['expert.expert_name']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'expert_id', 'medical_treatment'], 'integer'],
            [['phone_number', 'reserve_time','expert.expert_name'], 'safe'],
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
        $query = Reserve::find();

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
            'id' => $this->id,
            'expert_id' => $this->expert_id,
            'reserve_time' => $this->reserve_time,
            'medical_treatment' => $this->medical_treatment,
        ]);

        $query->andFilterWhere(['like', 'phone_number', $this->phone_number]);

        //专家名字
            //利用查询构建器的join连接数据表
        $query->join('INNER JOIN','expert','reserve.expert_id = expert.id');
        //查询条件
        $query->andFilterWhere(['like','expert.expert_name',$this->getAttribute('expert.expert_name')]);
        
        //给姓名加上排序
        $dataProvider->sort->attributes['expert.expert_name']=
        [
            'asc'=>['expert.expert_name'=>SORT_ASC],
            'desc'=>['expert.expert_name'=>SORT_DESC],
        ];


        return $dataProvider;
    }
}
