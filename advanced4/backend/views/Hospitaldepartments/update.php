<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hospitaldepartments */

$this->title = '修改选择: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '选择管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="hospitaldepartments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
