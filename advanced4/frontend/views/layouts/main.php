<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\HospitalDepartments;
use yii\helpers\Url;


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

<div style="background: #f5f5f5;" class="row">
<div class="col-md-12" style="text-align: left;font-size: 15px;height: 30px;line-height: 30px">
    <span style="float: left;">010-114/116114电话预约</span>
    <span style="float: right;">欢迎来到“帮看病”预约挂号统一平台 请登录 注册
帮助中心</span>
</div>
</div>
<div class="wrap">
<div class="container" style="
    padding-top: 20px;
">
<div class="row clearfix">
    <div class="col-md-12 column">
        <div class="row clearfix">
            <!-- 全文搜索 -->
            <div class="col-md-3 column">
                <img alt="" src="./web/images/logo.jpg" style="margin:10px;float: left;" />
                <h2 style="font-size: 1px;padding-top: 12px;color: #006DB3;font-weight: bold;">帮看病</h2>
            </div>
            <div class="col-md-2 column" style="text-align: center;">
                <br />
                <br />
                <span id="chengshi" style="color: #FF0000;font-size: 16px;letter-spacing: 0.2em;">
                    <?php if(!isset($_COOKIE['chengshick'])){
                            echo "锦州";
                            }else{
                                echo $_COOKIE['chengshick'];
                            }
                    ?></span>
                <br />
                <span style="color: #000000;font-size: 15px;">[<a href="<?= Url::toRoute(['hospitaldepartments/index'])?>" style="color: #000000;">切换城市</a>]</span>
            </div>
            <div class="col-md-offset-2 col-md-5 column">
                <div class="input-group" style="position: absolute;width: 545px;height: 48px;right: 0px;top: 23px;border: 2px solid #ddd;margin-right: 15px;">
                  <div class="input-group-btn" style="width: 114px;border-right: 1px solid #ddd;line-height: 48px;height: 48px;">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 113px;height: 52px;border:none;">全站内容 <span class="caret"></span></button>
                    <ul class="dropdown-menu" style="min-width: 115px;border: none;">
                      <li><a href="#">全站内容</a></li>
                      <li><a href="#">医生查找</a></li>
                      <li><a href="#">医院查找</a></li>
                    </ul>
                  </div><!-- /btn-group -->
                  <input type="text" class="form-control" placeholder="Search for..." style="position: absolute;top: 0px;width: 319px;height: 52px;line-height: 46px;border: none;">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button" style="width: 110px;height: 55px;position: absolute;top: -2px;right: -2px;background: #6bcbca;border: none;color: #fff;cursor: pointer;font-size: 14px;">搜索</button>
                  </span>
                </div>
                <!-- /input-group -->
            </div>
            <div class="col-md-12 column" style="padding-top: 50px;">
                <?php
                    // NavBar::begin([
                    //     'brandLabel' => '帮看病',
                    //     'brandOptions'=> ['style'=>'font-size:23px'],
                    //     'brandUrl' => Yii::$app->homeUrl,
                    //     'options' => [
                    //         'class' => 'navbar-inverse',
                    //     ],
                    // ]);
                    NavBar::begin([
                            'options' => [
                            'style' => 'background:#b7dbff;',
                        ],
                        ]);
                    $menuItems = [
                        ['label' => '首页', 'url' => ['/site/index'],'options' => ['style' => '']],
                        ['label' => '本站新闻', 'url' => ['/thisnews/index']],
                        ['label' => '分科病种', 'url' => ['/department/index']],
                        ['label' => '健康常识', 'url' => ['/healthfacts/index']],
                        ['label' => '医院社区', 'url' => ['/post/index']],
                        ['label' => '加盟医院', 'url' => ['/hospital/index']],
                    ];
                    if (Yii::$app->user->isGuest) {
                        $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
                        $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
                    } else {
                        $menuItems[] = '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                '退出 (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>';
                    }
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right','style'=>'margin-right: 15px;background:#b7dbff;'],
                        'items' => $menuItems,
                    ]);
                    NavBar::end();
                ?>
            </div>
        </div>
    </div>
    </div>
    </div>
 <?php
    // NavBar::begin([
    //     'brandLabel' => '帮看病',
    //     'brandOptions'=> ['style'=>'font-size:23px'],
    //     'brandUrl' => Yii::$app->homeUrl,
    //     'options' => [
    //         'class' => 'navbar-inverse',
    //     ],
    // ]);
    // $menuItems = [
    //     ['label' => '首页', 'url' => ['/site/index']],
    //     ['label' => '本站新闻', 'url' => ['/thisnews/index']],
    //     ['label' => '分科病种', 'url' => ['/department/index']],
    //     ['label' => '健康常识', 'url' => ['/healthfacts/index']],
    //     ['label' => '医院社区', 'url' => ['/post/index']],
    //     ['label' => '加盟医院', 'url' => ['/hospital/index']],
    // ];
    // if (Yii::$app->user->isGuest) {
    //     $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
    //     $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
    // } else {
    //     $menuItems[] = '<li>'
    //         . Html::beginForm(['/site/logout'], 'post')
    //         . Html::submitButton(
    //             '退出 (' . Yii::$app->user->identity->username . ')',
    //             ['class' => 'btn btn-link logout']
    //         )
    //         . Html::endForm()
    //         . '</li>';
    // }
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-right'],
    //     'items' => $menuItems,
    // ]);
    // NavBar::end();
    ?>

    <div class="container" style="
    padding-top: 20px;
">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<?php
    class web{
        static $num="0";
        public function change(){
            echo "您是本站第".self::$num."位访客.";
            self::$num++;
        }
    }
?>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; 帮看病 <?= date('Y') ?></p>
        <p class="pull-left"><?php $web=new web(); $web->change(); ?> </p>
        <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
