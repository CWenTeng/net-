<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

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
        <li>本站新闻</li>
        
        </ol>
        <div class="searchbox" style="border:1px solid #f5f5f5;padding: 20px;">
        <!-- 具体内容显示 -->
        <?= ListView::widget([
                'id'=>'postList',
                'dataProvider'=>$dataProvider,
                'itemView'=>'_listitem',//子视图,显示一篇文章的标题等内容.
                'layout'=>'{items} {pager}',
                'pager'=>[
                        'maxButtonCount'=>10,
                        'nextPageLabel'=>Yii::t('app','下一页'),
                        'prevPageLabel'=>Yii::t('app','上一页'),
        ],
        ])?>
        </div>
        </div>
        <!-- 页面左侧end -->
    </div>

</div>

