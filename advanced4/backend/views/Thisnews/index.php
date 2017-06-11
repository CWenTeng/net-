<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ThisnewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '新闻管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thisnews-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建新闻', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            // 'content:ntext',
            [
             'attribute'=>'content',
              'value'=>'beginning',
             // 'value'=>function($model){
             //    //先把数据获取到tmpstr中再获取其中的字符数
             //    $tmpStr=strip_tags($model->content);
             //    $tmpLen=mb_strlen($tmpStr);
             //    //返回一个字符串，如果超过20则在后面加...
             //    return mb_substr($tmpStr,0,20,'utf-8').(($tmpLen>20)?'...':'');
             // }
            ],
            'author',
            // 'create_time:datetime',
            ['attribute'=>'create_time',
             'format'=>['date','php:Y-m-d H:i:s'],
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
