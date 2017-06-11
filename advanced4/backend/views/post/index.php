<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Poststatus;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        //dataProvider数据提供者
        'dataProvider' => $dataProvider,
        //filterModel提供一个搜索功能的搜索类
        'filterModel' => $searchModel,
        //columns指定需要展示的列及其格式
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            // 'id',
            ['attribute'=>'id',
             'contentOptions'=>['width'=>'30px'],
            ],
            'title',
            // 'content:ntext',
            // 'author_id',
            ['attribute'=>'authorName',
             'label'=>'作者',
             'value'=>'author.nickname',
            ],
            'tags:ntext',
            // 'status',
            ['attribute'=>'status',
             'value'=>'status0.name',
             'filter'=>Poststatus::find()
                     ->select(['name','id'])
                     ->orderBy('position')
                     ->indexBy('id')
                     ->column(),
            ],
            // 'create_time:datetime',
            // 'update_time:datetime',
            ['attribute'=>'update_time',
             'format'=>['date','php:Y-m-d H:i:s'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
