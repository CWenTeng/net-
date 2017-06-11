<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Expert */

$this->title = '新增专家名片';
$this->params['breadcrumbs'][] = ['label' => '专家管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expert-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
