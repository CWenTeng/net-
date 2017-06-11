<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hospital;

/**
 * HospitalSearch represents the model behind the search form about `common\models\Hospital`.
 */
class HospitalSearch extends Hospital
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'create_time', 'update_time'], 'integer'],
            [['hospital_name', 'expert_introduction', 'hospital_address', 'hospital_type', 'hospital_grade'], 'safe'],
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
        $query = Hospital::find();

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
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'hospital_name', $this->hospital_name])
            ->andFilterWhere(['like', 'expert_introduction', $this->expert_introduction])
            ->andFilterWhere(['like', 'hospital_address', $this->hospital_address])
           ->andFilterWhere(['like', 'hospital_type', $this->hospital_type])
           ->andFilterWhere(['like', 'hospital_grade', $this->hospital_grade]);

        return $dataProvider;
    }
}
