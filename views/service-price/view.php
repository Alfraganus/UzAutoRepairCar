<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ServicePrice */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Service Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="service-price-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
          <?= Html::a('Yangi malumot kiritish', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Tahrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Siz ushbu ma\'lumotni o\'chirishga aminmisiz?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

	        [
		        'label'=> 'Uchastka',
		        'attribute'=>'uchastka.name',
	        ],
	        [
		        'attribute'=>'model',
		        'value'=>function($model){
			        if($model->model == '1TF69'){
				        return "Nexia";
			        }else if($model->model == '1JX69'){
				        return 'Cobalt!';
			        }else if($model->model == '13U19'){
				        return 'Gentra!';
			        }else if($model->model == '1CQ48'){
				        return 'Spark!';
			        }
		        }
	        ],
            'is_little',
            'is_medium',
            'is_large',
            'is_active',
            'last_updated_by',
        ],
    ]) ?>

</div>
