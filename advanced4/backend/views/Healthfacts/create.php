<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Healthfacts */

$this->title = '新增健康常识';
$this->params['breadcrumbs'][] = ['label' => '健康常识管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="healthfacts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
