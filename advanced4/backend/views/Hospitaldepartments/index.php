<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HospitaldepartmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '选择管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitaldepartments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增选择', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'hospital_id',
            ['attribute'=>'hospital.hospital_name',
             'label'=>'医院',
             'value'=>'hospital.hospital_name',
            ],
            // 'department_id',
            ['attribute'=>'department.department_name',
             'label'=>'科室',
             'value'=>'department.department_name',
            ],
            

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{update} {delete}'],

        ],
    ]); ?>
</div>
