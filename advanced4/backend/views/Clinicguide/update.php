<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Clinicguide */

$this->title = '修改就诊指南: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '就诊指南管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="clinicguide-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
