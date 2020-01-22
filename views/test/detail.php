<br>
<a href="<?=\yii\helpers\Url::to(['test/repair-sector-monitorings'])?>">
	<button class="btn btn-primary">Orqaga qaytish</button>
</a>
<div style="margin:50px">
	<!-- problem monitoring model:-->

	<?php foreach($car as $cars): ?>
		<!--defect codes:-->
		<?php $tagAssigns = \app\models\TagAssign::find()->where(['post_id'=>$cars->id])->all(); ?>
		<div class="col-sm-4">
		<div class="well well-sm" style="background:#1fad83;color:white">
			<?= $cars->uchastka->name;?>
			<?php foreach($tagAssigns as $code): ?>
				<span style="color:darkred">	(<?= $code->tag_id ?>)</span>
			<?php endforeach; ?>
			<br>
			(<?=$cars->created_at?>)


		</div>
		</div>

	<?php endforeach; ?>
</div>