<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProblemMonitorings */

$this->title = 'Update Problem Monitorings: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Problem Monitorings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="problem-monitorings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
