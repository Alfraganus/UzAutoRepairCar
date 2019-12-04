<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sectors */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sectors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sectors-view">

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

            'name',
        ],
    ]) ?>

</div>
