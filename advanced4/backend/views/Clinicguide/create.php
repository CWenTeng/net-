<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Clinicguide */

$this->title = '新增就诊指南';
$this->params['breadcrumbs'][] = ['label' => '就诊指南管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clinicguide-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
