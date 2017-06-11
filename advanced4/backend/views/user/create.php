<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '新增用户';
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="user-form">
		
		    <?php $form = ActiveForm::begin(); ?>
		 
		    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
		 	
		    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
		    
		    <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
		

		    <div class="form-group">
		        <?= Html::submitButton('新增', ['class' =>'btn btn-success']) ?>
		    </div>
		   
		    <?php ActiveForm::end(); ?>
	</div>

</div>
