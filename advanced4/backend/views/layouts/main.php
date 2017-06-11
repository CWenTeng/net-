<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\Comment;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        //后台题头标签
        'brandLabel' => '帮看病',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
    //增删查改的连接
        ['label' => '文章管理', 'url' => ['/post/index']],
        ['label' => '评论管理', 'url' => ['/comment/index']],
        '<li><span class="badge badge-inverse">'.comment::getPengdingConmmentCount().'</span></li>',
        ['label' => '用户管理', 'url' => ['/user/index']],
        ['label' => '管理员', 'url' => ['/adminuser/index']],
        ['label' => '预定管理', 'url' => ['/reserve/index']],
        ['label' => '专家管理', 'url' => ['/expert/index']],
        ['label' => '就诊指南', 'url' => ['/clinicguide/index']],
        ['label' => '健康常识', 'url' => ['/healthfacts/index']],
        ['label' => '本站新闻', 'url' => ['/thisnews/index']],
        ['label' => '医院管理', 'url' => ['/hospital/index']],
        ['label' => '科室', 'url' => ['/department/index']],
        ['label' => '选择', 'url' => ['/hospitaldepartments/index']]
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                '注销 (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; 帮看病 <?= date('Y') ?></p>

        <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
