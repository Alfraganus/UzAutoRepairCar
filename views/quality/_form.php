<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quality */
/* @var $form yii\widgets\ActiveForm */
	$sector = \yii\helpers\ArrayHelper::map(\app\models\Sectors::find()->all(),'id','name');

?>

<div class="quality-form">

	<?php $form = ActiveForm::begin([
		                                'options' => ['enctype' => 'multipart/form-data'
		                                ]
	                                ]); ?>


	<?= $form->field($model, 'tabel')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'uchastka')->dropDownList($sector) ?>
	<?= $form->field($model, 'smena')->dropdownlist(['A'=>'A','B'=>'B','D'=>'D']) ?>

    <?= $form->field($model, 'gsip')->dropDownList(['Warranty' => 'Warranty','DRR' => 'DRR','DRL' => 'DRL','GCA' => 'GCA','PDI' => 'PDI','PCP' => 'PCP','EFTQ' => 'EFTQ','QCOS' => 'QCOS']) ?>

	<?php if ($model->image) { ?>
		<img src="/uploads/<?=$model->image?>" style="width: 250px">
	<?php }?>

    <?= $form->field($model, 'image')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
