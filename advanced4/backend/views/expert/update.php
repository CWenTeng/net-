<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Expert */

$this->title = '修改专家管理: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '专家管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="expert-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
