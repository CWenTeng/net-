<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Department;
use common\models\Hospital;

/* @var $this yii\web\View */
/* @var $model common\models\Hospitaldepartments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospitaldepartments-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'department_id')->textInput() ?> -->
    <?php
       $allStatus = Department::find()
    ->select(['department_name','id'])
    ->indexBy('id')
    ->column();
    ?>

    <?= $form->field($model, 'department_id')->dropDownList($allStatus,['prompt'=>'请选择状态']); ?>

    <!-- <?= $form->field($model, 'hospital_id')->textInput() ?> -->
	<?php
       $allStatus = Hospital::find()
    ->select(['hospital_name','id'])
    ->indexBy('id')
    ->column();
    ?>
    
    <?= $form->field($model, 'hospital_id')->dropDownList($allStatus,['prompt'=>'请选择状态']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
