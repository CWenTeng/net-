<?php
use yii\helpers\Html;
?>

<div class="post" style="height: 34px;">
	<!-- 显示文字题头和作者 -->
	<dl style="clear: both;height: 34px;font-size: 15px;font-weight: normal;font-style: normal;color: #ccc;text-align: left;margin-bottom: 0px;">
		<dt style="float: left;overflow: hidden;text-align: left;padding: 0px 0px 0px 9px;margin-left: 6px;line-height: 34px;font-weight: normal;">
			<a target="_self" href="<?= $model->url;?>" style="color: #848484;background: url(./images/ggdd.png) left center no-repeat;padding-left: 14px;display: inline-block;"><?= Html::encode($model->title);?></a>
		</dt>
		<dd style="float: right;overflow: hidden;width: 180px;color: #848484;text-align: center;">
			<?= date('Y年m月d日',$model->create_time)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>
		</dd>
	</dl>
	
	<br>
	<!-- 附加上文章的标签，可以点击且显示文章内容 -->

</div>