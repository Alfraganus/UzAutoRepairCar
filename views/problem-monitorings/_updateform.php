<?php
	use kartik\switchinput\SwitchInput;
	use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\ProblemMonitorings */
/* @var $form yii\widgets\ActiveForm */
	$sector = \yii\helpers\ArrayHelper::map(\app\models\Sectors::find()->all(),'id','name');
	$departments = \yii\helpers\ArrayHelper::map(\app\models\Departments::find()->all(),'id','name');
?>

<div class="problem-monitorings-form">
	<?php $form = ActiveForm::begin(); ?>

    <div class="containing" style='width:95%'>
	    <center>
		    <?= $form->field($model, 'problem_status')->widget(SwitchInput::classname(), [
			    'type' => SwitchInput::CHECKBOX,
			    'value'=>'test',
			    'pluginOptions' => [
				    'onText' => 'Close',
				    'offText' => 'Open',
				    'size' => 'large',
				    'onColor' => 'success',
				    'offColor' => 'danger',

			    ]
		    ]); ?>
	    </center>
   
    <div class="col-md-6">
    <?= $form->field($model, 'sector')->dropDownList($sector) ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'shift')->dropdownlist(['А'=>'А','В'=>'В','Д'=>'Д']) ?>
    </div>
	    <div class="col-md-6">
		    <?= $form->field($model, 'model')->textInput(['readonly'=>true]) ?>
	    </div>



    <div class="col-md-6">
    <?= $form->field($model, 'date')->input('date',['format'=>'dd-mm-YYYY','value'=>date("Y-m-d"),'readonly'=>true]) ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'department')->dropDownList($departments) ?>
    </div>

	    <label for="">defelt kodlar</label>
    <div class="col-md-6" style='margin-botton:30px'>
	    <?php
		    if(!$model->isNewRecord){
			    $tags = \yii\helpers\ArrayHelper::map(\app\models\TagAssign::find()->where(['post_id' => $model->id])->all(), 'id', 'tag.id');
			    $tags_str = implode(',', $tags);
		    }else{
			    $tags_str = '';
		    }
		    echo \dosamigos\selectize\SelectizeTextInput::widget([
			                                                         'name' => 'ProblemMonitorings[tag]',
			                                                         'loadUrl' => ['tag/list'],
			                                                         'value' => $tags_str,
			                                                         'clientOptions' => [
				                                                         'plugins' => ['remove_button'],
				                                                         'valueField' => 'keyword',
				                                                         'labelField' => 'keyword',
				                                                         'searchField' => ['keyword'],
				                                                         'create' => false,
				                                                         'delimiter' => ',',
				                                                         'persist' => false,
				                                                         'createOnBlur' => true,
				                                                         'preload' => false,
			                                                         ]
		                                                         ]);
	    ?>
    </div>
	    <div style="clear:both"></div>
	    <div class="col-md-6">
		    <?= $form->field($model, 'PO')->textInput(['readonly'=>true]) ?>
	    </div>
	    <div class="col-md-6">
		    <?= $form->field($model, 'winno')->textInput(['readonly'=>true]) ?>
	    </div>

    <div class="col-md-6">
    <?= $form->field($model, 'problem')->textarea(['rows' => 6]) ?>
    </div>
   
    <div class="col-md-6">
      <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
    </div>
    </div>


  

   



 

    <div class="form-group">
        <?= Html::submitButton('Tahrirlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

