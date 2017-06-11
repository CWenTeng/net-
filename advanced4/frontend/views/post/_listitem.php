<?php
use yii\helpers\Html;
?>

<div class="post">
	<!-- 显示文字题头和作者 -->
	<div class="title">
		<h2><a href="<?= $model->url;?>"><?= Html::encode($model->title);?></a></h2>
	
		<div class="author">
		<span class="glyphicon glyphicon-time" aria-hidden="true"></span><em><?= date('Y-m-d H:i:s',$model->create_time)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?></em>
		<span class="glyphicon glyphicon-user" aria-hidden="true"></span><em><?= Html::encode($model->author->nickname);?></em>
		</div>
	</div>
	
	<br>
	<!-- 显示文字内容 -->
	<div class="content">
	<?= $model->beginning;?>	
	</div>
	<!-- 附加上文章的标签，可以点击且显示文章内容 -->
	<br>
	<div class="nav">
		<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
		<?= implode(', ',$model->tagLinks);?>
		<br>
		<!-- 展示评论条数 -->
		<?= Html::a("评论 ({$model->commentCount})",$model->url.'#comments')?> | 最后修改于 <?= date('Y-m-s H:i:s',$model->update_time);?>
	</div>
	
</div>