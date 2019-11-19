<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProblemMonitoringsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Problem Monitorings';
$this->params['breadcrumbs'][] = $this->title;
?>


    <?php $form = ActiveForm::begin(); ?>
    <div class="row" style='margin:40px 0 0 20px'>   
    <div class="col-md-3">
            <?= $form->field($model, 'ponno')->textinput();?>
        </div>
        <div class="col-md-1">
            <label for="test"></label>
            <button class='btn btn-primary'>So'rovni yuborish</button>
        </div>
        </div>

    
       

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sector',
            'shift',
            'date',
            'model',
            'department',
            'PO',
            'problem:ntext',
            'spent_on',
            //'comment:ntext',
            'winno',
            //'user_id',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
 <?php ActiveForm::end(); ?>

</div>
