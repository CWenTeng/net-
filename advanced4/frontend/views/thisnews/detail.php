<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use frontend\components\TagsCloudWidget;
use frontend\components\RctReplyWidget;

use yii\helpers\HtmlPurifier;
use common\models\Comment;
use yii\helpers\Url;

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
            <li><a href="<?= Url::to(['thisnews/index']);?>">本站新闻</a></li>
            <li class="active"><?= $model->title?></li>
            </ol>
            <!-- 页面文章头部 -->
            <div class="post">
                <div class="title">
                    <h2><a href="<?= $model->url;?>"><?= Html::encode($model->title);?></a></h2>                
                        <div class="author">
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span><em><?= date('Y-m-d H:i:s',$model->create_time)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?></em>
                        
                        </div>              
                </div>
            </div>  

            <br>
            <!-- 文章内容 -->
            <div class="content">
            <?= HTMLPurifier::process($model->content)?>
            </div>
            
         
        </div>
        
        
    </div>

</div>
