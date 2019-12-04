<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServicePriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Xizmat narxlari';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-price-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Xizmat narxi kiritish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],



            [
            	'header'=>'uchastka',
	            'attribute'=> 'uchastka.name',
            ],
            [
            	'header'=>'model',
	            'attribute'=>function($model){
		            if($model->model == '1TF69'){
			            return "Nexia";
		            }else if($model->model == '1JX69'){
			            return 'Cobalt';
		            }else if($model->model == '13U19'){
			            return 'Gentra';
		            }else if($model->model == '1CQ48'){
			            return 'Spark';
		            }
	            }
            ],
            'is_little',
            'is_medium',
            'is_large',
            [
	            'attribute'=>'is_active',
	            'header'=>'Status',
	            'filter' => [1=>'Aktiv', 0=>'no-aktiv'],
	            'format'=>'raw',
	            'value' => function($model, $key, $index)
	            {
		            if($model->is_active == 1)
		            {
			            return '<button class="btn btn-success">Aktiv</button>';
		            }
		            else
		            {
			            return '<button class="btn btn-danger">no-aktiv</button>';
		            }
	            },
            ],
            //'created_by',
            //'last_updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
