<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
//面包屑的代码
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除这篇文章吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'content:ntext',
            'tags:ntext',
            //'status',
            //通过status0来显示状态的信息
            ['label'=>'状态',
             'value'=>$model->status0->name,
            ],
            //通过更改显示方式，来显示时间
            //'create_time:datetime',
            [
             'attribute'=>'create_time',
             'value'=>date('Y-m-d H:i:s',$model->create_time)
            ],
            //'update_time:datetime',
            [
             'attribute'=>'update_time',
             'value'=>date('Y-m-d H:i:s',$model->update_time)
            ],
             //'author_id',重写value的值
            ['attribute'=>'author_id',
             'value'=>$model->author->nickname,
             //'label'=>'作者ID'
            ]
        ],
        //label就是前面的标签，value后面的是数据为了不太拥挤，而设置改变th的宽度
        'template'=>'<tr><th style="width:120px;">{label}</th><td>{value}</td><tr>',
        //options可以设置整个表格table标签
        //'options'=>['class'=>'table table-striped table-bodered detail-view'],
    ]) ?>

</div>
