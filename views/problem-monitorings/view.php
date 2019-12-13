<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProblemMonitorings */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Problem Monitorings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="problem-monitorings-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
		        'header' =>  'Uchastka',
		        'attribute' => 'uchastka.name',
	        ],
            'shift',
            [
	            'attribute' => 'date',
	            'format' => ['date', 'php:d/m/Y']
            ],
            'model',
	        [
		        'header' =>  'Bo\'lim',
		        'attribute' =>'bolim.name',
	        ],
            'PO',
            'problem:ntext',
            'spent_on',
            'comment:ntext',
            'winno',

        ],
    ]) ?>

</div>
