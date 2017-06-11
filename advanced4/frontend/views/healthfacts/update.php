<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Healthfacts */

$this->title = 'Update Healthfacts: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Healthfacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="healthfacts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
