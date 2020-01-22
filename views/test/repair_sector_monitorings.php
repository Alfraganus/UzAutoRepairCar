<?php
use yii\helpers\Url;
?>
<div class="container">
	<h1 class="text-center">Bugun eng ko'p remont uchastkariga kirgan avtomobillar</h1>
	<?php use app\models\ProblemMonitorings;

		foreach($cars_in_monitorings as $cars): ?>
			<?php $car = ProblemMonitorings::find()->where(['PO'=>$cars->PO])->all();?>
		<?php $count = \app\models\ProblemMonitorings::find()->where(['PO'=>$cars->PO])->count() ?>

		<div class="col-sm-2">
			<a target="_blank" href="<?= URL::to(['test/detail-car','po'=>$cars->PO])?>">	<button type="button" style="margin:10px" class="btn btn-info btn-lg"><?= $cars->PO." ($count)" ?></button></a>
		</div>
	 <?php endforeach; ?>

</div>

 