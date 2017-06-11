<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Hospital;
use common\models\Department;

/* @var $this yii\web\View */
/* @var $model common\models\Expert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'expert_name')->textInput(['maxlength' => true]) ?>

    <?php
    //寻找专家名称，来预定
    $allStatus = Hospital::find()
    ->select(['hospital_name','id'])
    // ->orderBy('position')
    ->indexBy('id')
    ->column();
    ?>

    <?= $form->field($model, 'hospital_id')->dropDownList($allStatus,['prompt'=>'请选择状态']); ?>

    <?= $form->field($model, 'expert_introduction')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>  -->
    <?php
       $allStatus = Department::find()
    ->select(['department_name'])
    ->indexBy('id')
    ->column();
    ?>

    <?= $form->field($model, 'department')->dropDownList($allStatus,['prompt'=>'请选择状态']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
