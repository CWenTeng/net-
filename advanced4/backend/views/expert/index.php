<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ExpertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '专家管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expert-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增专家名片', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            // 'id',
            ['attribute'=>'id',
             'contentOptions'=>['width'=>'30px'],
            ],
            'expert_name',
            // 'hospital_id',
            ['attribute'=>'hospital_name',
             'label'=>'医院名',
             'value'=>'hospital.hospital_name',
            ],
            'expert_introduction:ntext',
            'department',
            // ['attribute'=>'department_name',
            //  'label'=>'科室',
            //  'value'=>'department.department_name',
            // ],
            // 'create_time:datetime',
            // 'update_time:datetime',
            ['attribute'=>'create_time',
             'format'=>['date','php:Y-m-d H:i:s'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
