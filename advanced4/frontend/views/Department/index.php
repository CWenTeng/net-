<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use common\models\Department;
/* @var $this yii\web\View */
/* @var $searchModel common\models\HealthfactsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="container">

    <div class="row">
        <!-- 页面左侧 -->
        <div class="col-md-12" style="
    padding-left: 0px;
    padding-right: 30px;
">
        
        <!-- 面包屑导航 -->
        <ol class="breadcrumb" style="margin-bottom: 0px;border-radius: 0px;">
        <li><a href="<?= Yii::$app->homeUrl;?>">首页</a></li>
        <li>分科病种</li>
        
        </ol>
        <div class="searchbox" style="border:1px solid #f5f5f5;padding: 20px;">
        <!-- 具体内容显示 -->
        <?php
            //查询所有大科室
            $first_department = Department::find()
            ->select(['first_department','id'])
            ->indexBy('id')
            ->column();
            //去重
            $first_department1=array_unique($first_department);
            //给每一科室给予小科室
            foreach ($first_department1 as $value) {
                echo "<h3>".$value."</h3>";
                $department_name = Department::find()
                ->select(['department_name','id'])
                ->where(['first_department'=>$value])
                ->indexBy('id')
                ->column();
                $trans = array_flip($department_name);
                echo "<pre>";
                foreach ($department_name as $values) {
                    echo Html::a(Html::encode($values),array('department/detail','id'=>$trans[$values]));
                }
                echo "</pre>";
            }
        ?>
        </div>
        </div>
        <!-- 页面左侧end -->
    </div>

</div>

