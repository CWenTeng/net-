<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Reserve */

$this->title = '预定创建';
$this->params['breadcrumbs'][] = ['label' => '预定管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserve-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
