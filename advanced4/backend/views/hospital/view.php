<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Hospital */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '医院管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hospital_name',
            'expert_introduction:ntext',
            'hospital_address',
            // 'create_time:datetime',
            'hospital_type',
            'hospital_grade',
             [
             'attribute'=>'create_time',
             'value'=>date('Y-m-d H:i:s',$model->create_time)
            ],
            // 'update_time:datetime',
             [
             'attribute'=>'update_time',
             'value'=>date('Y-m-d H:i:s',$model->update_time)
            ],
        ],
    ]) ?>

</div>
