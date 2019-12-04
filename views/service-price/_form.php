<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicePrice */
/* @var $form yii\widgets\ActiveForm */
$sectors = \yii\helpers\ArrayHelper::map(\app\models\Sectors::find()->all(),'id','name');
?>

<div class="service-price-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="col-md-6">
		<?= $form->field($model, 'sector_id')->dropDownList($sectors) ?>
	</div>
	<div class="col-md-6">
		<?=$form->field($model, 'model')->dropDownList([
			                                               '1JX69' => 'Cobalt',
			                                               '1TF69' => 'Nexia',
			                                               '13U19' => 'Gentra',
			                                               '1CQ48' => 'Spark',
		                                               ])?>
	</div>

	<div class="col-md-6">
		<?= $form->field($model, 'is_little')->textInput() ?>
	</div>
	<div class="col-md-6">
		<?= $form->field($model, 'is_medium')->textInput() ?>
	</div>

	<div class="col-md-6">
		<?= $form->field($model, 'is_large')->textInput() ?>
	</div>
	<div class="col-md-6">
		<?= $form->field($model, 'is_active')->dropDownList([1=>'Aktiv',0=>'no-aktiv']) ?>
	</div>








    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
