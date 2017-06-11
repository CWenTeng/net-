<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use frontend\widgets\Alert;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use common\models\Thisnews;
use common\models\healthfacts;

AppAsset::register($this); 
$this->title = 'My Yii Application';
?>
<?=Html::jsFile('@web/js/jquery.js')?>  
<?=Html::jsFile('@web/js/SuperSlide.js')?>
<!-- 轮换图 -->
            <div class="carousel slide" id="carousel-153330">
                <ol class="carousel-indicators">
                    <li class="active" data-slide-to="0" data-target="#carousel-153330">
                    </li>
                    <li data-slide-to="1" data-target="#carousel-153330">
                    </li>
                    <li data-slide-to="2" data-target="#carousel-153330">
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img alt="" src="images/11.jpg" />
                        
                    </div>
                    <div class="item">
                        <img alt="" src="images/11.jpg" />
                        
                    </div>
                    <div class="item">
                        <img alt="" src="images/13.jpg" />
                        
                    </div>
                </div> <a class="left carousel-control" href="#carousel-153330" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-153330" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
            <!-- 轮换图end -->
            <br>
            <!-- 专家介绍和就诊指南 -->
            <div class="row clearfix">
                <!-- 专家介绍 -->
                <div class="col-md-6 column">
                    <!-- 专家介绍轮换图 -->
                    <div id="index_banner">
                      <div class="burder">
                        <div id="slideBox" class="slideBox">
                          <div class="bd">
                            <ul  class="list-unstyled">
                              <li> <a target="_blank" href="#"><img src="../web/images/1.jpg" /></a>
                                <div class="burder_content"> 
                                    <span class="burder_content_type">王守业</span><br>
                                    <a target="_blank" href="#" class="burder_content_title" style="font-size: 15px;padding-right: 50px;">医院名称：第一医院</a>
                                    <p class="burder_content_content">各位玩家们新年好。梦想微评测新春特别节目《梦想之最年度评选》，在近期就将发布第一集了。敬请各位玩家朋友们期待！</p>
                                    <a class="burder_content_lookall" target="_blank" href="#">进入详情页&gt;</a> 
                                </div>
                              </li>
                              <li> <a target="_blank" href="#"><img src="images/2.jpg" /></a>
                                <div class="burder_content"> <span class="burder_content_type">王守业</span> <a target="_blank" href="#" class="burder_content_title"  style="font-size: 15px;padding-right: 50px;">医院名称：第一医院</a>
                                  <p class="burder_content_content">各位玩家们新年好。梦想微评测新春特别节目《梦想之最年度评选》，在近期就将发布第一集了。敬请各位玩家朋友们期待！</p>
                                  <a class="burder_content_lookall" target="_blank" href="#">进入详情页&gt;</a> </div>
                              </li>
                              <li> <a target="_blank" href="#"><img src="images/3.jpg" /></a>
                                <div class="burder_content"> <span class="burder_content_type">王守业</span> <a target="_blank" href="#" class="burder_content_title"  style="font-size: 15px;padding-right: 50px;">医院名称：第一医院</a>
                                  <p class="burder_content_content">各位玩家们新年好。梦想微评测新春特别节目《梦想之最年度评选》，在近期就将发布第一集了。敬请各位玩家朋友们期待！</p>
                                  <a class="burder_content_lookall" target="_blank" href="#">进入详情页&gt;</a> </div>
                              </li>
                              <li> <a target="_blank" href="#"><img src="images/4.jpg" /></a>
                                <div class="burder_content"> <span class="burder_content_type">王守业</span> <a target="_blank" href="#" class="burder_content_title"  style="font-size: 15px;padding-right: 50px;">医院名称：第一医院</a>
                                  <p class="burder_content_content">各位玩家们新年好。梦想微评测新春特别节目《梦想之最年度评选》，在近期就将发布第一集了。敬请各位玩家朋友们期待！</p>
                                  <a class="burder_content_lookall" target="_blank" href="#">进入详情页&gt;</a> </div>
                              </li>
                              <li> <a target="_blank" href="#"><img src="images/5.jpg" /></a>
                                <div class="burder_content"> <span class="burder_content_type">王守业</span> <a target="_blank" href="#" class="burder_content_title"  style="font-size: 15px;padding-right: 50px;">医院名称：第一医院</a>
                                  <p class="burder_content_content">各位玩家们新年好。梦想微评测新春特别节目《梦想之最年度评选》，在近期就将发布第一集了。敬请各位玩家朋友们期待！</p>
                                  <a class="burder_content_lookall" target="_blank" href="#">进入详情页&gt;</a> </div>
                              </li>
                            </ul>
                          </div>

                          <div class="hd">
                            <ul>
                              <li style="text-align: center;"><a href="#">王守业<img src="images/pmd_hover.gif"/></a></li>
                              <li style="text-align: center;"><a href="#">王守业<img src="images/pmd_hover.gif"/></a></li>
                              <li style="text-align: center;"><a href="#">王守业<img src="images/pmd_hover.gif" /></a></li>
                              <li style="text-align: center;"><a href="#">王守业<img src="images/pmd_hover.gif" /></a></li>
                              <li style="text-align: center;"><a href="#">王守业<img src="images/pmd_hover.gif" /></a></li>
                            </ul>
                          </div>
                        </div>
                        <script type="text/javascript">jQuery(".slideBox").slide({ mainCell:".bd ul",effect:"left",autoPlay:true} );</script> 
                      </div>
                    </div>
                    <!-- 专家轮换图end -->
                </div>
                <!-- 专家介绍end -->
                <!-- 就诊指南 -->
                <div class="col-md-6 column" style="border: 1px solid #c7c0c0;padding-right: 0px;width: 570px;padding-left: 0px;">
                    <div style="height: 38px;background: #c7c0c0;margin-left: 0px;padding-left: 25px;">
                        <h3 style="line-height: 38px;margin-top: 0px;float: left;margin-bottom: 0px;">
                            就诊指南
                        </h3>
                        <a href="#" style="float: right;font-size: 12px;height: 15px;line-height: 15px;border-left: 1px solid #b5b5b5;margin-top: 12px;padding-left: 6px;margin-right: 21px;">更多</a>
                    </div>
                    <ol style="margin-top: 11px; margin-bottom: 11">
                        <?php

                        ?>
                        <li>
                            Lorem ipsum dolor sit amet
                        </li>
                        <li>
                            Consectetur adipiscing elit
                        </li>
                        <li>
                            Integer molestie lorem at massa
                        </li>
                        <li>
                            Facilisis in pretium nisl aliquet
                        </li>
                        <li>
                            Nulla volutpat aliquam velit
                        </li>
                        <li>
                            Faucibus porta lacus fringilla vel
                        </li>
                        <li>
                            Aenean sit amet erat nunc
                        </li>
                        <li>
                            Eget porttitor lorem
                        </li>
                        <li>
                            Eget porttitor lorem
                        </li>
                    </ol>
                </div>
                <!-- 就诊指南end -->
            </div>
            <!-- 专家介绍和就诊指南end -->
            <br>
            <!-- 健康常识 -->
            <div class="row clearfix">
                <div class="col-md-8 column" style="border: 1px solid #c7c0c0;border-width:1px;width: 765px;padding-left: 0px;padding-right: 0px;height: 208px;margin-left: 15px;">
                    <div style="height: 38px;background: #c7c0c0;margin-left: 0px;padding-left: 25px;">
                        <h3 style="line-height: 38px;margin-top: 0px;float: left;margin-bottom: 0px;">
                            健康常识
                        </h3>
                        <a href="<?= Url::toRoute(['healthfacts/index'])?>" style="float: right;font-size: 12px;height: 15px;line-height: 15px;border-left: 1px solid #b5b5b5;margin-top: 12px;padding-left: 6px;margin-right: 21px;">更多</a>
                    </div>
                    <ol style="margin-top: 11px; margin-bottom: 11">
                        <?php
                            $department = healthfacts::find()
                                    ->select(['title'])
                                    ->indexBy('id')
                                    ->column();
                            krsort($department);
                            if(count($department)>8){
                                $s=0;
                                foreach ($department as $key=>$value) {
                                    echo "<li>"."<a href=".Url::toRoute(['healthfacts/detail','id'=>$key,'title'=>$value]).">".$value."</a>"."</li>";
                                    $s++;
                                    if($s==8) break;
                                }
                            }
                            else{
                                foreach ($department as $value) {
                                    echo "<li>".$value."</li>";
                                }
                            } 
                            
                        ?>
                    </ol>
                </div>
                <!-- 健康常识的轮换图 -->
                <div class="col-md-4 column" style="border-style:solid solid solid none;border-width:1px;border-color: #c7c0c0;height: 208px;padding-right: 0px;width: 375px;padding-left: 0px;">
                    <img alt="140x140" src="http://ibootstrap-file.b0.upaiyun.com/lorempixel.com/140/140/default.jpg" />
                </div>
            </div>
            <!-- 健康常识end -->
            <br>
            <!-- 本站新闻 -->
            <div class="row clearfix">
                <div class="col-md-12 column" style="border-style:solid;border-width:1px;padding-left: 0px;padding-right: 0px;margin-left: 15px;margin-right: 15px;width: 1140px;">
                    <div style="height: 38px;background: #c7c0c0;margin-left: 0px;padding-left: 25px;">
                        <h3 style="line-height: 38px;margin-top: 0px;float: left;margin-bottom: 0px;">
                            本站新闻
                        </h3>
                        <a href="<?= Url::toRoute(['thisnews/index'])?>" style="float: right;font-size: 12px;height: 15px;line-height: 15px;border-left: 1px solid #b5b5b5;margin-top: 12px;padding-left: 6px;margin-right: 21px;">更多</a>
                    </div>
                    <div class="panel-group" id="panel-448048">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <a class="panel-title" data-toggle="collapse" data-parent="#panel-448048" href="#panel-element-712245">
                                  <?php $department = Thisnews::find()
                                    ->select(['title'])
                                    ->where(['id'=>1])
                                    ->indexBy('id')
                                    ->column();  
                                    echo $department[1];
                                  ?>
                                 </a>
                            </div>
                            <div id="panel-element-712245" class="panel-collapse in">
                                <div class="panel-body">
                                    <?php $department = Thisnews::find()
                                    ->select(['content'])
                                    ->where(['id'=>1])
                                    ->indexBy('id')
                                    ->column();  
                                    if(strlen($department[1])>500){
                                        echo iconv_substr($department[1], 0,500) ."...";
                                    }else{
                                        echo $department[1];
                                    }
                                  ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-448048" href="#panel-element-777921">
                                 <?php $department = Thisnews::find()
                                    ->select(['title'])
                                    ->where(['id'=>2])
                                    ->indexBy('id')
                                    ->column();  
                                    echo $department[2];
                                  ?>
                                  </a>
                            </div>
                            <div id="panel-element-777921" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php $department = Thisnews::find()
                                    ->select(['content'])
                                    ->where(['id'=>2])
                                    ->indexBy('id')
                                    ->column();  
                                    if(strlen($department[2])>500){
                                        echo iconv_substr($department[2], 0,500) ."...";
                                    }else{
                                        echo $department[2];
                                    }
                                  ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-448048" href="#panel-element-777923">
                                 <?php $department = Thisnews::find()
                                    ->select(['title'])
                                    ->where(['id'=>3])
                                    ->indexBy('id')
                                    ->column();  
                                    echo $department[3];
                                  ?>
                                  </a>
                            </div>
                            <div id="panel-element-777923" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php $department = Thisnews::find()
                                    ->select(['content'])
                                    ->where(['id'=>3])
                                    ->indexBy('id')
                                    ->column();  
                                    if(strlen($department[3])>500){
                                        echo iconv_substr($department[3], 0,500) ."...";
                                    }else{
                                        echo $department[3];
                                    }
                                  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>