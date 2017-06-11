<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use frontend\components\TagsCloudWidget;
use frontend\components\RctReplyWidget;

use yii\helpers\HtmlPurifier;
use common\models\Comment;
use yii\helpers\Url;
use common\models\Hospitaldepartments;
use common\models\Department;

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
            <li><a href="<?= Url::to(['hospital/index']);?>">加盟医院</a></li>
            <li class="active"><?= $model->hospital_name?></li>
            </ol>
            
            <div class="searchbox" style="border:1px solid #f5f5f5;padding: 20px;background: #DFF2FC;">
                <!-- 具体内容显示 -->
                <h3 style="margin-top: 0px;margin-bottom: 20px;"><?= Html::encode($model->hospital_name);?></h3>
                <dl style="clear: both;font-size: 15px;font-weight: normal;font-style: normal;color: #ccc;text-align: left;margin-bottom: 0px; height: 170px;">

                    <dt style="float: left;">
                        <img src="images/113.jpg">
                    </dt>

                    <dd style="float: left;overflow: hidden;text-align: left;padding: 0px 0px 0px 9px;margin-left: 6px;font-weight: normal;">
                       
                        <br>
                        <span style="padding-left: 14px;color: #888;">医院类型:
                        <?= Html::encode($model->hospital_type);?></span>
                        <br>
                        <span style="padding-left: 14px;color: #888;">医院等级:
                        <?= Html::encode($model->hospital_grade);?></span>
                        <br>
                        <span style="padding-left: 14px;color: #888;">医院地址:
                        <?= Html::encode($model->hospital_address);?>
                        </span>
                        <br>
                        <span style="padding-left: 14px;color: #888;">医院电话:0416-9754125</span>
                        <br>
                        <span style="padding-left: 14px;color: #888;">医院简介:
                        <?= Html::encode($model->expert_introduction);?>
                        </span>
                        <br>
                        <span style="padding-left: 14px;color: #888;">请您乘坐:3路、环3路、116路、117路、118路、到锦州市中心医院、亚东眼科医院下车!</span>
                    </dd>
                    <dd style="float: right;">
                        <img src="images/114.png" style="height: 150px;width: 220px;">
                    </dd>
                </dl>
            </div>
            <br>
            <!-- 科室展现 -->
            <div class="searchbox" style="border:1px solid #f5f5f5;padding: 20px;background: #DFF2FC;">
                <?php echo "显示所有本医院的科室";?>
                <?php
                    //查询医院有哪些小科室
                    $department_id = Hospitaldepartments::find()
                    ->where(['hospital_id'=>$model->id])
                    ->select(['department_id'])
                    ->column();
                    //根据小科室查询都有哪些大科室
                    $arr=array();
                    foreach ($department_id as $value) {
                        $first_department = Department::find()
                        ->select(['first_department'])
                        ->where(['id'=>$value])
                        ->indexBy('id')
                        ->column();
                        //将所有字符串组成一个数组
                        $arr=array_merge($arr,$first_department);
                    }
                    //大科室去重
                    $arr1=array_unique($arr);
                    //显示大科室和小科室集合
                    foreach ($arr1 as $value) {
                        echo "<h3>".$value."</h3>";
                        $face = array();
                        foreach ($department_id as $values) {
                            $department_name = Department::find()
                            ->select(['department_name'])
                            ->where(['AND',['first_department'=>$value],['id'=>$values]])
                            ->indexBy('id')
                            ->column();
                            //重组键值对
                            $face=array_merge($face,$department_name);
                        }
                        echo "<pre>";
                        foreach ($face as $values) {
                        echo '<a href="'.Url::toRoute(['expert/index','department_name'=>$values,'hospital_id'=>$model->id]).'" style="font-size:14px;">'.$values.'</a>&nbsp;&nbsp;&nbsp;';
                        }
                        echo "</pre>";
                    }
                ?>
                
            </div>
        </div> 
    </div>
</div>
