<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Expert;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Reserve */
/* @var $form yii\widgets\ActiveForm */

$expert_name=Yii::$app->request->get( 'expert_name' );
$expert_id = Expert::find()
                ->select(['id'])
                ->where(['expert_name'=>$expert_name])
                ->indexBy('id')
                ->column();
foreach ($expert_id as $value) {
       // echo $value;  
          $expert_id=$value;
    }
$userMe = User::findOne(Yii::$app->user->id);
if($userMe){
        $userMe_phone_number = $userMe->phone_number;
        $userMe_id = $userMe->id;
        }
        else{
            $userMe_phone_number='';
        }
?>
<div class="reserve-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<span style="font-size: 16px;color: #888;">您想要预约的人是:<?php echo $expert_name;?></span>
    <br />
    <br />
    <span style="font-size: 16px;color: #888;">您选择的日期是:</span>
    <input type="date" value="2017-05-03"/>
    <br />
    <br />
    <span style="font-size: 16px;color: #888;">您选择的预定时间是:</span>
    <br />

    <?= $form->field($model, 'reserve_time')->radioList(['2017-05-02 08:00:00'=>'8:00-8:30','2017-05-02 08:30:00'=>'8:30-9:00','2017-05-02 09:00:00'=>'9:00-9:30','2017-05-02 09:30:00'=>'9:30-10:00','2017-05-02 10:00:00'=>'10:00-10:30','2017-05-02 10:30:00'=>'10:30-11:00','2017-05-02 11:00:00'=>'11:00-11:30','2017-05-02 14:00:00'=>'14:00-14:30','2017-05-02 14:30:00'=>'14:30-15:00','2017-05-02 15:00:00'=>'15:00-15:30','2017-05-02 15:30:00'=>'15:30-16:00','2017-05-02 16:00:00'=>'16:00-16:30','2017-05-02 16:30:00'=>'16:30-17:00'],['style'=>'font-size: 14px;width:800px;'])->label(false); ?>

    <span style="font-size: 16px;color: #888;">请输入您的手机号:</span>
    <br />
    <?= $form->field($model, 'phone_number')->textInput(['value'=>$userMe_phone_number],['style'=>'width: 826px;'])->label(false); ?>

    <?= $form->field($model, 'expert_id')->hiddenInput(['value'=>$expert_id])->label(false); ?>

    <?= $form->field($model, 'medical_treatment')->hiddenInput(['value'=>0])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '提交' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
