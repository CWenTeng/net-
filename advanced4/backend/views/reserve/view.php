<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Reserve */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '预定管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserve-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除这个预定吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'phone_number',
            // 'expert_id',
            ['attribute'=>'expert_id',
             'value'=>$model->expert->expert_name,
             'label'=>'专家名'
            ],
            // 'reserve_time:datetime',
            [
             'attribute'=>'reserve_time',
             'value'=>$model->reserve_time
            ],
            'medical_treatment',
        ],
    ]) ?>

</div>
