<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Expert;

/**
 * ExpertSearch represents the model behind the search form about `common\models\Expert`.
 */
class ExpertSearch extends Expert
{
    //可以对属性进行增加和删除
    public function attributes()
    {
        return array_merge(parent::attributes(),['hospital_name']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hospital_id', 'create_time', 'update_time'], 'integer'],
            [['expert_name', 'expert_introduction','hospital_name', 'department'], 'safe'],
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
        $query = Expert::find();

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
            'hospital_id' => $this->hospital_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'expert_name', $this->expert_name])
            ->andFilterWhere(['like', 'expert_introduction', $this->expert_introduction])
            ->andFilterWhere(['like', 'department', $this->department]);
       //专家名字
            //利用查询构建器的join连接数据表
        $query->join('INNER JOIN','hospital','expert.hospital_id = hospital.id');
        //查询条件
        $query->andFilterWhere(['like','hospital.hospital_name',$this->getAttribute('hospital.hospital_name')]);
        
        $dataProvider->sort->attributes['hospital_name'] =
        [
                'asc'=>['hospital.hospital_name'=>SORT_ASC],
                'desc'=>['hospital.hospital_name'=>SORT_DESC],
        ];


        return $dataProvider;
    }
}
