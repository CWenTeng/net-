<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Hospitaldepartments */

$this->title = 'Create Hospitaldepartments';
$this->params['breadcrumbs'][] = ['label' => 'Hospitaldepartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitaldepartments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
