<?php
use yii\helpers\Html;
?>

<div class="post">
	<div class="title">
		<h2><a href="<?= $model->url;?>"><?= Html::encode($model->title);?></a></h2>
	
		<div class="author">
		<span class="glyphicon glyphicon-time" aria-hidden="true"></span><em><?= date('Y-m-d H:i:s',$model->create_time)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?></em>
		<span class="glyphicon glyphicon-user" aria-hidden="true"></span><em><?= Html::encode($model->author->nickname)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?></em>
		<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span><em><?= '类别：'.(is_null($model->category0)?'未分类':'<a href='.Yii::$app->urlManager->createUrl(['post/index', 'PostSearch[category]' => $model->category0->id]).'>'.$model->category0->category.'</a>')."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?></em>
		<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span><em><?= Html::encode('浏览量：' . (is_null($model->viewcount)?'0':$model->viewcount->p_view_count));?></em>
		</div>
	</div>
	
	<br>
	<div class="content">
	<?= $model->beginning;?>	
	</div>
	
	<br>
	<div class="nav">
		<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
		<?= implode(', ',$model->tagLinks);?>
		<br>
		<?= Html::a("评论 ({$model->commentCount})",$model->url.'#comments')?> | 最后修改于 <?= date('Y-m-s H:i:s',$model->update_time);?>
	</div>
	
</div>