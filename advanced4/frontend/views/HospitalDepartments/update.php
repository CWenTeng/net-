<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hospitaldepartments */

$this->title = 'Update Hospitaldepartments: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hospitaldepartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hospitaldepartments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
