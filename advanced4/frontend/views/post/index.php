<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use frontend\components\TagsCloudWidget;
use frontend\components\RctReplyWidget;
use common\models\Post;
use yii\caching\DbDependency;
use yii\caching\yii\caching;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="container"style="
    padding-left: 0px;
    padding-right: 30px;
">

    <div class="row">
        <!-- 页面左侧 -->
        <div class="col-md-9">
        
        <!-- 面包屑导航 -->
        <ol class="breadcrumb">
        <li><a href="<?= Yii::$app->homeUrl;?>">首页</a></li>
        <li>医院社区</li>
        
        </ol>
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
        <!-- 页面左侧end -->

        <!-- 页面右侧 -->
        <div class="col-md-3">
            <!-- 查找文章 -->
            <div class="searchbox">
                <ul class="list-group">
                  <li class="list-group-item">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 查找文章（
                  <?php 
                  //数据缓存示例代码
                  /*
                  $data = Yii::$app->cache->get('postCount');
                  $dependency = new DbDependency(['sql'=>'select count(id) from post']);
                  
                  if ($data === false)
                  {
                    $data = Post::find()->count();  sleep(5);
                    Yii::$app->cache->set('postCount',$data,600,$dependency); //设置缓存60秒后过期
                  }
                  
                  echo $data;
                  */
                  ?>
                  <?= Post::find()->count();?>
                  ）
                  </li>
                  <li class="list-group-item">                
                      <form class="form-inline" action="index.php?r=post/index" id="w0" method="get">
                          <div class="form-group">
                            <input type="text" class="form-control" name="PostSearch[title]" id="w0input" placeholder="按标题">
                          </div>
                          <button type="submit" class="btn btn-default">搜索</button>
                    </form>
                  
                  </li>
                </ul>           
            </div>
            <!-- 查找文章end -->
            <!-- 标签云 -->
            <div class="tagcloudbox">
                <ul class="list-group">
                  <li class="list-group-item">
                  <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 标签云
                  </li>
                  <li class="list-group-item">
                  <?php 
                  //片段缓存示例代码
                  /*
                  $dependency = new DbDependency(['sql'=>'select count(id) from post']);
                  
                  if ($this->beginCache('cache',['duration'=>600],['dependency'=>$dependency]))
                  {
                    echo TagsCloudWidget::widget(['tags'=>$tags]);
                    $this->endCache();
                  }
                  */
                  ?>
                  <?= TagsCloudWidget::widget(['tags'=>$tags])?>
                   </li>
                </ul>           
            </div>
            <!-- 标签云end -->
            <!-- 最近回复 -->
            <div class="commentbox">
                <ul class="list-group">
                  <li class="list-group-item">
                  <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 最新回复
                  </li>
                  <li class="list-group-item">
                  <?= RctReplyWidget::widget(['recentComments'=>$recentComments])?>
                  </li>
                </ul>           
            </div>
            <!-- 最近回复end -->
        </div>
        <!-- 右侧end -->
        
    </div>

</div>
