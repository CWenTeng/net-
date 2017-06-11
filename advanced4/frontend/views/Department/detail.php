<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use frontend\components\TagsCloudWidget;
use frontend\components\RctReplyWidget;

use yii\helpers\Url;
use common\models\Department;
use common\models\HospitalDepartments;
use common\models\Hospital;


/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<!-- 视图文件detall -->
<div class="container">

    <div class="row">
    <!-- 页面左侧 -->
        <div class="col-md-12" style="
    padding-left: 0px;
    padding-right: 30px;
">
            <!-- 面包屑 -->
            <ol class="breadcrumb">
            <li><a href="<?= Yii::$app->homeUrl;?>">首页</a></li>
            <li><a href="<?= Url::to(['department/index']);?>">分科病种</a></li>
            <li class="active"><?= $model->department_name?></li>
            </ol>
            
            <div class="searchbox" style="border:1px solid #f5f5f5;padding: 20px;">
            <!-- 具体内容显示 -->
            <?php
                $hospital_id = HospitalDepartments::find()
                ->select(['hospital_id'])
                ->where(['department_id'=>$model->id])
                ->indexBy('id')
                ->column();
                foreach ($hospital_id as $value) {
                    $hospital_name = Hospital::find()
                    ->where(['id'=>$value])
                    ->select(['hospital_name'])
                    ->column();
                    $expert_introduction = Hospital::find()
                    ->where(['id'=>$value])
                    ->select(['expert_introduction'])
                    ->column();
                    $hospital_address = Hospital::find()
                    ->where(['id'=>$value])
                    ->select(['hospital_address'])
                    ->column();
                    $hospital_type = Hospital::find()
                    ->where(['id'=>$value])
                    ->select(['hospital_type'])
                    ->column();
                    $hospital_grade = Hospital::find()
                    ->where(['id'=>$value])
                    ->select(['hospital_grade'])
                    ->column();
                    $expert_introduction1="";  
                    foreach ($expert_introduction as $value3) {
                       $expert_introduction1=$value3;     
                    } 
                
            ?>
            <dl style="clear: both;font-size: 15px;font-weight: normal;font-style: normal;color: #ccc;text-align: left;margin-bottom: 0px; height: 170px;">
                <dt style="float: left;">
                    <img src="images/113.jpg">
                </dt>
                <dd style="float: left;overflow: hidden;text-align: left;padding: 0px 0px 0px 9px;margin-left: 6px;font-weight: normal;">
                    <a target="_self" href="#" style="padding-left: 14px;display: inline-block;"><?= Html::encode($hospital_name[0]);?></a>
                    <br>
                    <span style="padding-left: 14px;color: #888;">医院类型:
                    <?= Html::encode($hospital_type[0]);?></span>
                    <br>
                    <span style="padding-left: 14px;color: #888;">医院等级:
                    <?= Html::encode($hospital_grade[0]);?></span>
                    <br>
                    <span style="padding-left: 14px;color: #888;">医院地址:
                    <?= Html::encode($hospital_address[0]);?>
                    </span>
                    <br>
                    <span style="padding-left: 14px;color: #888;">医院电话:0416-9754125</span>
                    <br>
                    <span style="padding-left: 14px;color: #888;">医院简介:
                    <?= Html::encode($expert_introduction1);?>
                    </span>
                </dd>
                <dd style="float: right;overflow: hidden;width: 180px;color: #848484;text-align: center; line-height: 130px">
                    <a href="<?= Url::toRoute(['expert/index','department_name'=>$model->department_name,'hospital_id'=>$value]);?>"><button type="button" class="btn btn-success">现在预定</button></a>
                </dd>
            </dl>
            <?php
                }
            ?>
            </div>
            
        </div> 
    </div>
</div>
