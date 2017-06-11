<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use yii\helpers\ArrayHelper;
use common\models\Adminuser;
/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

     <?php
    /*第一种方式find方法获取所有数据，map方法将数据以键值对的形式传入allStatus里
    $psObjs = Poststatus::find()->all();
    $allStatus = ArrayHelper::map($psObjs,'id','name');
    第二种查询方式，利用command查询数据查询
    $psArray = Yii::$app->db->createCommand('select id,name from poststatus')->queryAll();
    $allStatus = ArrayHelper::map($psArray,'id','name');
    */

    //由验证可得find方法获取的arrayhelper对象是继承于query的子类
    $allStatus = Poststatus::find()
    ->select(['name','id'])
    ->orderBy('position')
    ->indexBy('id')
    ->column();

    //第三种方式，通过创建query对象

    // $allStatus = (new \yii\db\Query())
    // ->select(['name','id'])
    // ->from('poststatus')
    // ->indexBy('id')
    // ->column();

    // echo "<pre>";
    // print_r($allStatus);
    // echo "</pre>";

    // exit(0);
    ?>
    <?= $form->field($model, 'status')->dropDownList($allStatus,['prompt'=>'请选择状态']); ?>

    <?php
       $allStatus = Adminuser::find()
    ->select(['nickname','id'])
    ->indexBy('id')
    ->column();
    ?>
    <?= $form->field($model, 'author_id')->dropDownList($allStatus,['prompt'=>'请选择状态']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
