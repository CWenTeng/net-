<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Thisnews */

$this->title = 'Create Thisnews';
$this->params['breadcrumbs'][] = ['label' => 'Thisnews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thisnews-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
