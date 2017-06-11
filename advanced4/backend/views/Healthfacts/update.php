<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Healthfacts */

$this->title = '修改健康常识: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '健康常识管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="healthfacts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
