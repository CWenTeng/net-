<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hospitaldepartments;

/**
 * HospitaldepartmentsSearch represents the model behind the search form about `common\models\Hospitaldepartments`.
 */
class HospitaldepartmentsSearch extends Hospitaldepartments
{
    //给user类添加user.username属性，给post类添加post.title属性
    public function attributes()
    {
        return array_merge(parent::attributes(),['hospital.hospital_name'],['department.department_name']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'department_id', 'hospital_id'], 'integer'],
            [['hospital.hospital_name', 'department.department_name'], 'safe'],
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
        $query = Hospitaldepartments::find();

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
            'department_id' => $this->department_id,
            'hospital_id' => $this->hospital_id,
        ]);

        //科室名字
        //利用查询构建器的join连接数据表
        $query->join('INNER JOIN','department','hospitaldepartments.department_id = department.id');
        //查询条件
        $query->andFilterWhere(['like','department.department_name',$this->getAttribute('department.department_name')]);
        
        $dataProvider->sort->attributes['department.department_name'] =
        [
                'asc'=>['department.department_name'=>SORT_ASC],
                'desc'=>['department.department_name'=>SORT_DESC],
        ];

        //医院名字
        //利用查询构建器的join连接数据表
        $query->join('INNER JOIN','hospital','hospitaldepartments.hospital_id = hospital.id');
        //查询条件
        $query->andFilterWhere(['like','hospital.hospital_name',$this->getAttribute('hospital.hospital_name')]);
        
        $dataProvider->sort->attributes['hospital.hospital_name'] =
        [
                'asc'=>['hospital.hospital_name'=>SORT_ASC],
                'desc'=>['hospital.hospital_name'=>SORT_DESC],
        ];

        return $dataProvider;
    }
}
