<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Healthfacts */

$this->title = 'Create Healthfacts';
$this->params['breadcrumbs'][] = ['label' => 'Healthfacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="healthfacts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
