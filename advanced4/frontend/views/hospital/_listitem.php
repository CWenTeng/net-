<?php
use yii\helpers\Html;
?>

<div class="post">
	<dl style="clear: both;font-size: 15px;font-weight: normal;font-style: normal;color: #ccc;text-align: left;margin-bottom: 0px; height: 170px;">
		<dt style="float: left;">
			<img src="images/113.jpg">
		</dt>
		<dd style="float: left;overflow: hidden;text-align: left;padding: 0px 0px 0px 9px;margin-left: 6px;font-weight: normal;">
			<a target="_self" href="<?= $model->url;?>" style="padding-left: 14px;display: inline-block;"><?= Html::encode($model->hospital_name);?></a>
			<br>
			<span style="padding-left: 14px;color: #888;">医院类型:
			<?= Html::encode($model->hospital_type);?></span>
			<br>
			<span style="padding-left: 14px;color: #888;">医院等级:
			<?= Html::encode($model->hospital_grade);?></span>
			<br>
			<span style="padding-left: 14px;color: #888;">医院地址:
			<?= Html::encode($model->hospital_address);?>
			</span>
			<br>
			<span style="padding-left: 14px;color: #888;">医院电话:0416-9754125</span>
			<br>
			<span style="padding-left: 14px;color: #888;">医院简介:
			<?= Html::encode($model->expert_introduction);?>
			</span>
		</dd>
		<dd style="float: right;overflow: hidden;width: 180px;color: #848484;text-align: center; line-height: 130px">
			<a href="<?= $model->url;?>"><button type="button" class="btn btn-success">现在预定</button></a>
		</dd>
	</dl>

</div>