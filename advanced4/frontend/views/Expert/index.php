<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Department;
use common\models\Expert;
use common\models\Hospital;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ExpertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$department_name=Yii::$app->request->get( 'department_name' );   
$hospital_id=Yii::$app->request->get( 'hospital_id' );
$department_id = Department::find()
                ->select(['id'])
                ->where(['department_name'=>$department_name])
                ->indexBy('id')
                ->column();
$expert_name = Expert::find()
                ->select(['expert_name'])
                ->where(['AND',['department'=>$department_id],['hospital_id'=>$hospital_id]])
                ->indexBy('id')
                ->column();
foreach ($expert_name as $expert_name1) {
	$expert_introduction = Expert::find()
                ->select(['expert_introduction'])
                ->where(['expert_name'=>$expert_name1])
                ->indexBy('id')
                ->column();
    $hospital_name = Hospital::find()
                ->select(['hospital_name'])
                ->where(['id'=>$hospital_id])
                ->indexBy('id')
                ->column();
    $hospital_address = Hospital::find()
                ->select(['hospital_address'])
                ->where(['id'=>$hospital_id])
                ->indexBy('id')
                ->column();
    $expert_introduction1="";  
    foreach ($expert_introduction as $value) {
       $expert_introduction1=$value;     
    }                                  
?>
<dl style="clear: both;font-size: 15px;font-weight: normal;font-style: normal;color: #ccc;text-align: left;margin-bottom: 0px; height: 170px;">
                <dt style="float: left;">
                    <img src="images/113.jpg">
                </dt>
                <dd style="float: left;overflow: hidden;text-align: left;padding: 0px 0px 0px 9px;margin-left: 6px;font-weight: normal;">
                    <a target="_self" href="#" style="padding-left: 14px;display: inline-block;"><?= Html::encode($expert_name1);?></a>
                    <br>
                    <span style="padding-left: 14px;color: #888;">所属医院:
                    <?= Html::encode($hospital_name[$hospital_id]);?></span>
                    <br>
                    <span style="padding-left: 14px;color: #888;">所属科室:
                    <?= Html::encode($department_name);?></span>
                    <br>
                    <span style="padding-left: 14px;color: #888;">医生简介:
                    <?=Html::encode($expert_introduction1);?>
                    </span>
                    <br>
                    <span style="padding-left: 14px;color: #888;">医院电话:0416-9754125</span>
                    <br>
                    <span style="padding-left: 14px;color: #888;">医院地址:
                    <?= Html::encode($hospital_address[$hospital_id]);?>
                    </span>
                    <br>
                    </span>
                </dd>
                <dd style="float: right;overflow: hidden;width: 180px;color: #848484;text-align: center; line-height: 130px">
                    <a href="<?= Url::toRoute(['reserve/create','expert_name'=>$expert_name1])?>"><button type="button" class="btn btn-success">现在预定</button></a>
                </dd>
            </dl>
<?php
}
?>
