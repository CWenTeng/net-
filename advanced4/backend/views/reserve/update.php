<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Reserve */

$this->title = '预定修改: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '预定管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="reserve-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
