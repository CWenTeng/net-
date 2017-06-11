<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReserveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '预定管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserve-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建预定', ['create'], ['class' => 'btn btn-success']) ?>
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
            'phone_number',
            // 'expert_id',
            ['attribute'=>'expert.expert_name',
             'label'=>'专家名',
             'value'=>'expert.expert_name',
            ],
            // 'reserve_time:datetime',
            [
             'attribute'=>'reserve_time',
             'format'=>['date','php:Y-m-d H:i:s'],
            ],
            'medical_treatment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
