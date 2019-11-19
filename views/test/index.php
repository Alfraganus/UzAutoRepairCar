<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Tests';
$this->params['breadcrumbs'][] = $this->title;
?>


<h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">   
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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'test1',
            'test2',
            'test3',
            'test4',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<?php ActiveForm::end(); ?>
</div>
