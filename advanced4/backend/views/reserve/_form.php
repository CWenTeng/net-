<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Expert;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Reserve */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserve-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

	<?php
	//寻找专家名称，来预定
	$allStatus = Expert::find()
    ->select(['expert_name','id'])
    // ->orderBy('position')
    ->indexBy('id')
    ->column();
    ?>
	
    <?= $form->field($model, 'expert_id')->dropDownList($allStatus,['prompt'=>'请选择状态']); ?>

    <?= $form->field($model, 'reserve_time')->textInput() ?>

    <?= $form->field($model, 'medical_treatment')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
