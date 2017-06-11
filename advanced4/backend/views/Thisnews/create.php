<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Thisnews */

$this->title = '新增新闻';
$this->params['breadcrumbs'][] = ['label' => '新闻管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thisnews-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
