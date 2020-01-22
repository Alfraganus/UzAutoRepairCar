<div class="container">
	<h1 class="text-center">Uchastkalar bo'yicha avtomobillar remonti xisoboti</h1>
	<table class="table table-hover">
		<thead>
		<tr>
			<th>P/O raqam bo'yicha avtomobil</th>
			<?php $cars = \app\models\ProblemMonitorings::find()->where(['sector'=>2])->one(); ?>

			<?php foreach($sectors as $sector): ?>

				<th><?=$sector->name;?></th>
			<?php endforeach;?>

		</tr>
		</thead>
		<tbody>

		<?php foreach($cars_in_monitorings as $car): ?>
			<tr>
			<td><?=$car->PO?></td>
			<?php foreach($sectors as $sec):?>
				<td><?php if($car->sector==$sec->id){echo "1";}  ?></td>
			<?php endforeach; ?>
		</tr>
		<?php endforeach;?>
		</tbody>
	</table>

</div>