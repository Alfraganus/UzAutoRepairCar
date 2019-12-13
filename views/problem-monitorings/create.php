<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProblemMonitorings */

$this->title = 'Muammo monitoring kiritish';
$this->params['breadcrumbs'][] = ['label' => 'Problem Monitorings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-monitorings-create">

    <h1 style="text-align:center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
