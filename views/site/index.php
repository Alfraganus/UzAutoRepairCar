<?php
	use app\models\ProblemMonitorings;
	use app\models\Sectors;
	use dosamigos\chartjs\ChartJs;
	use kartik\daterange\DateRangePicker;
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	require_once('statistics.php');
		$money =ProblemMonitorings::FinancialLossCurrentMonth();
?>

<!-- Content Header (Page header) -->
			<section class="content-header" >
		<div class="row">
			<div class="col-md-3">
			<h3>
				Bosh sahifa
				<small>Statistikalar</small>
			</h3>
		</div>
			<div class="col-md-9">
				<div class="alert alert-info">
					<strong>Oy boshidan boshlab umumiy keltirigan zarar: <span style="color:darkred;font-weight:bold;font-size:18px"><?= number_format($money,0)?> so'm</strong></span>
				</div>
			</div>
		</div>
		</section>


		<!-- Main content -->
		<section class="content">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3><?=ProblemMonitorings::YesterdayNightsCars();?> / <?=ProblemMonitorings::TodaysCars();?></h3>

							<p>Kecha tungi va bugun kunduzgi ta'mirlar</p>
						</div>
						<div class="icon">
							<i class="fa fa-gears"></i>
						</div>
<!--						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?=ProblemMonitorings::CarsCurrentMonth();?></h3>

							<p>Ushbu oydagi tamirlar</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
<!--						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3><?=ProblemMonitorings::CarsPreviousMonth();?></h3>

							<p>O'tgan oydagi tamirlar</p>
						</div>
						<div class="icon">
							<i class="fa fa-gears"></i>
						</div>
<!--						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
					</div>
				</div>
				<!-- ./col -->

				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
							<h3><?=(ProblemMonitorings::Comparative()<0)?ProblemMonitorings::Comparative().'%':ProblemMonitorings::Comparative().'%';?></h3>

							<p><?=(ProblemMonitorings::Comparative()<0)?"O'tgan oydan kamroq":"O'tgan oydan ko'proq" ?></p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
<!--						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<h2 style="text-align:center">  Vaqt oralig'ida ma'lumotlarni ko'rsatish!</h2>
				<?php $form = ActiveForm::begin(); ?>
				<?= DateRangePicker::widget([
						                             'model'=>$model,
						                             'attribute'=>'dateSearch',
						                             'convertFormat'=>true,
						                             'pluginOptions'=>[
							                             'timePicker'=>true,
							                             'timePickerIncrement'=>30,
							                             'locale'=>[
								                             'format'=>'Y-m-d'
							                             ]
						                             ]
					                             ]); ?>
				<br>
				<center><?= Html::submitButton('Malumotlarni filterlash', ['class' => 'btn btn-primary']) ?></center>

				<?php ActiveForm::end(); ?>
				<br>

				<div class="col-md-6" style="background:white">
					<h4 style="text-align:center;font-weight:bold"> UzAutoMotors Repair uchastkalariga kirgan avtomobillar xisoboti</h4>

					<?=ChartJs::widget([
						                   'type' => 'bar',
						                   'options' => [
							                   'height' => 150,
							                   'width' => 400
						                   ],
						                   'data' => [
							                   'labels' => $labels,
							                   'datasets' => [
								                   [
									                   'label' => "Nexia",
									                   'backgroundColor' => "green",
									                   'borderColor' => "rgba(179,181,198,1)",
									                   'pointBackgroundColor' => "rgba(179,181,198,1)",
									                   'pointBorderColor' => "#fff",
									                   'pointHoverBackgroundColor' => "#fff",
									                   'pointHoverBorderColor' => "rgba(179,181,198,1)",
									                   'data' => $nexia
								                   ],
								                   [
									                   'label' => "Spark",
									                   'backgroundColor' => "darkred",
									                   'borderColor' => "rgba(255,99,132,1)",
									                   'pointBackgroundColor' => "rgba(255,99,132,1)",
									                   'pointBorderColor' => "#fff",
									                   'pointHoverBackgroundColor' => "#fff",
									                   'pointHoverBorderColor' => "rgba(255,99,132,1)",
									                   'data' => $spark
								                   ],
								                   [
									                   'label' => "Gentra",
									                   'backgroundColor' => "lightblue",
									                   'borderColor' => "rgba(255,99,132,1)",
									                   'pointBackgroundColor' => "rgba(255,99,132,1)",
									                   'pointBorderColor' => "#fff",
									                   'pointHoverBackgroundColor' => "#fff",
									                   'pointHoverBorderColor' => "rgba(255,99,132,1)",
									                   'data' => $gentra
								                   ],
								                   [
									                   'label' => "Cobalt",
									                   'backgroundColor' => "orange",
									                   'borderColor' => "rgba(255,99,132,1)",
									                   'pointBackgroundColor' => "rgba(255,99,132,1)",
									                   'pointBorderColor' => "#fff",
									                   'pointHoverBackgroundColor' => "#fff",
									                   'pointHoverBorderColor' => "rgba(255,99,132,1)",
									                   'data' => $cobalt
								                   ]
							                   ]
						                   ]
					                   ]);?>
				</div>

				<div class="col-md-6" style="background:white">
					<h4 style="text-align:center;font-weight:bold">Eng ko'p uchragan defekt ko'dlar xisoboti  </h4>
					<?=ChartJs::widget([
						                   'type' => 'bar',
						                   'options' => [
							                   'height' => 150,
							                   'width' => 400,
							                   'scales' => [
								                   'yAxes' => [
									                   'ticks' => [
										                   'min' => 0
									                   ]
								                   ],
								                   'xAxes' => [
									                   'ticks' => [
										                   'min' => 0
									                   ]
								                   ]
							                   ]
						                   ],
						                   'data' => [

							                   'labels' => $problemCodes,
							                   'datasets' => [

								                   [
									                   'label' => "Cobalt",
									                   'backgroundColor' => "green",
									                   'borderColor' => "rgba(255,99,132,1)",
									                   'pointBackgroundColor' => "rgba(255,99,132,1)",
									                   'pointBorderColor' => "#fff",
									                   'pointHoverBackgroundColor' => "#fff",
									                   'pointHoverBorderColor' => "rgba(255,99,132,1)",
									                   'data' => $cobaltcodes
								                   ],
							                     [
									                   'label' => "Nexia",
									                   'backgroundColor' => "darkred",
									                   'borderColor' => "rgba(255,99,132,1)",
									                   'pointBackgroundColor' => "rgba(255,99,132,1)",
									                   'pointBorderColor' => "#fff",
									                   'pointHoverBackgroundColor' => "#fff",
									                   'pointHoverBorderColor' => "rgba(255,99,132,1)",
									                   'data' => $nexiacodes
								                   ],
								                   [
									                   'label' => "Spark",
									                   'backgroundColor' => "lightblue",
									                   'borderColor' => "rgba(255,99,132,1)",
									                   'pointBackgroundColor' => "rgba(255,99,132,1)",
									                   'pointBorderColor' => "#fff",
									                   'pointHoverBackgroundColor' => "#fff",
									                   'pointHoverBorderColor' => "rgba(255,99,132,1)",
									                   'data' => $sparkCodes
								                   ],
								                   [
									                   'label' => "Gentra",
									                   'backgroundColor' => "orange",
									                   'borderColor' => "rgba(255,99,132,1)",
									                   'pointBackgroundColor' => "rgba(255,99,132,1)",
									                   'pointBorderColor' => "#fff",
									                   'pointHoverBackgroundColor' => "#fff",
									                   'pointHoverBorderColor' => "rgba(255,99,132,1)",
									                   'data' => $gentacodes
								                   ]
							                   ]
						                   ]
					                   ]);?>
				</div>

			</div>
			<div class="row" style="background:white">
				<div class="col-md-6" >
					<h3 class="text-center">Uchastkalar kesimida aniqlangan zarar diagrammada</h3>
					<?=ChartJs::widget([
						                   'type' => 'pie',
						                   'options' => [
							                   'height' => 200,
							                   'width' => 600,
							                   'scales' => [
								                   'yAxes' => [
									                   'ticks' => [
										                   'min' => 0
									                   ]
								                   ],
								                   'xAxes' => [
									                   'ticks' => [
										                   'min' => 0
									                   ]
								                   ]
							                   ]
						                   ],
						                   'data' => [
							                   'labels' => $labels,
							                   'datasets' => [
								                   [
									                   'label' => "Cobalt",
									                   'backgroundColor' => ["#922B21",'#58D68D','#99A3A4','#F1C40F','#154360','green','#7D3C98 ','#17202A'],
									                   'borderColor' => "rgba(255,99,132,1)",
									                   'pointBackgroundColor' => "rgba(255,99,132,1)",
									                   'pointBorderColor' => "#fff",
									                   'pointHoverBackgroundColor' => "#fff",
									                   'pointHoverBorderColor' => "rgba(255,99,132,1)",
									                   'data' => $sums
								                   ],


						                   ]
							                   ]
					                   ]);?>
				</div>
				<div class="col-md-6">
					<h3 class="text-center">Uchastkalar kesimida aniqlangan zarar jadvalda</h3>

					<table class="table table-striped">
						<thead>
						<tr>
							<th class="text-center" style="color:forestgreen">Uchastka</th>
							<th class="text-center" style="color:forestgreen">Aniqlangan zarar</th>
						</tr>
						</thead>
						<tbody>

						<?php foreach($uchastkalar as $uchastka): ?>
							<?php $zarar = ProblemMonitorings::find()
							                                 ->where(['>=', 'date', $statisticsDateBegin])
							                                 ->andWhere(['<=', 'date', $statisticsDateFinish])
							                                 ->andwhere(['sector' => $uchastka->id])
							                                 ->sum('money_spent'); ?>
							<tr class="text-center">
								<td><?=$uchastka->name?></td>
								<td style="color:red;font-weight:bold"><?=number_format($zarar, 0)?> so'm</td>
							</tr>
						<?php endforeach; ?>

						</tbody>
					</table>


				</div>
			</div>
				<div class="col-md-12" style="background:white">
					<h3 style="font-weight:bold;text-align:center">Nuqsonli avtomobillarni REP uchastkalarida ta'mirlashnishi to'g'risidagi ma'lumotlar</h3>
					<table class="table table-hover">
						<thead>
						<tr class="color" style="text-align:center">
							<th>Uchastka nomi</th>
							<th>model</th>
							<th>O'lchov birligi</th>
							<th colspan="3" style="text-align:center">Nuqsonli avto soni</th>
							<th colspan="3">Ta'mirlash qiymati (1 dona uchun)</th>
							<th colspan="3">Jami qiymati</th>
						</tr>
						</thead>

						<tbody>
						<td class="color" colspan="3"></td>
						<td class="color" style="text-align:center">kichik</td>
						<td class="color" style="text-align:center">O'rta</td>
						<td class="color" style="text-align:center">katta</td>
						<td class="color" style="text-align:center">kichik</td>
						<td class="color" style="text-align:center">O'rta</td>
						<td class="color" style="text-align:center">katta</td>
						<td class="color" style="text-align:center">kichik</td>
						<td class="color" style="text-align:center">O'rta</td>
						<td class="color" style="text-align:center">katta</td>
						<?php foreach($uchastkalar as $sector): ?>
							<? $i = 0; ?>
							<?php foreach($sector->prices as $price): $i++; ?>
								<?php $countDisabledCars = ProblemMonitorings::find()->where(['sector' => $sector->id])->count(); ?>

								<tr style="text-align:center">
									<? if($i == 1){ ?>
										<td style="vertical-align:middle;font-weight:bold" rowspan="<?=count($sector->prices)?>"><?=$sector->name?></td>
									<? } ?>
									<td><?=Sectors::ModelName($price->model)?></td>
									<td>dona</td>
									<td><?=Sectors::FindDisabledCar($price->model, $price->sector_id, 1,$statisticsDateBegin,$statisticsDateFinish)?></td>
									<td><?=Sectors::FindDisabledCar($price->model, $price->sector_id, 2,$statisticsDateBegin,$statisticsDateFinish)?></td>
									<td><?=Sectors::FindDisabledCar($price->model, $price->sector_id, 3,$statisticsDateBegin,$statisticsDateFinish)?></td>
									<td><?=$price->is_little?></td>
									<td><?=$price->is_medium?></td>
									<td><?=$price->is_large?></td>
									<td><?=number_format(Sectors::findFinalPrice($price->sector_id, $price->model, 1,$statisticsDateBegin,$statisticsDateFinish))."\n";?></td>
									<td><?=number_format(Sectors::findFinalPrice($price->sector_id, $price->model, 2,$statisticsDateBegin,$statisticsDateFinish))."\n";?></td>
									<td><?=number_format(Sectors::findFinalPrice($price->sector_id, $price->model, 3,$statisticsDateBegin,$statisticsDateFinish))."\n";?></td>
								</tr>
							<?php endforeach; ?>

						<?php endforeach; ?>

						</tbody>
					</table>
				</div>
			</div>
		</section>
		<!-- /.content -->

<style>
	.color{
		background:#3BB9FF;
		color:white;
	}
</style>