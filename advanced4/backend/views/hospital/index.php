<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HospitalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '医院管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增医院', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            ['attribute'=>'id',
             'contentOptions'=>['width'=>'30px'],
            ],
            'hospital_name',
            'expert_introduction:ntext',
            'hospital_address',
            'hospital_type',
            'hospital_grade',
            // 'create_time:datetime',
            ['attribute'=>'create_time',
             'format'=>['date','php:Y-m-d H:i:s'],
            ],
            // 'update_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
