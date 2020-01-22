<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use yii\helpers\Url;
use kartik\switchinput\SwitchInput;
/* @var $this yii\web\View */
/* @var $model app\models\ProblemMonitorings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container" style="width:95%">

<?= $model->PO?>
	<p><?=substr($model->PO,0,6)?></p>
    <?php $form = ActiveForm::begin(); ?>
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

 <?php

	 if ($model->isNewRecord):
		 $api = "http://web.uzautomotors.com/empc/getVehicleInfo/".$_GET['ponno'];
 else :
	 $api = "http://web.uzautomotors.com/empc/getVehicleInfo/".substr($model->PO,0,6);
	 endif;
    $opts = [
        "http" => [
            "method" => "GET",
            "header" => "slip_token: ZmYwFWzbf9\r\n" .
                "Accept: application/json\r\n"
        ]
    ];
    $context = stream_context_create($opts);
    $sFile = file_get_contents($api, false, $context);
    $ready = json_decode($sFile);

    if(count($ready->data)>0) :

$assoc = array();
    foreach ($ready->data as $read) {
      $string = $read->pono.' model: '.$read->model.' vinno: '.$read->vinno;
	    $assoc[] =$string;
       $assocPono = $read->pono;
       $assocModel = $read->model;
      }


	 $sector = \yii\helpers\ArrayHelper::map(\app\models\Sectors::find()->all(),'id','name');
	 $departments = \yii\helpers\ArrayHelper::map(\app\models\Departments::find()->all(),'id','name');
 ?>

    <div class="containing" style='width:95%'>
    <div class="col-md-6" style='margin-botton:30px'>
    <?= $form->field($model, 'search')->dropDownList($assoc) ?>
    </div>
   
    <div class="col-md-6">
    <?= $form->field($model, 'sector')->dropDownList($sector) ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'shift')->dropdownlist(['A'=>'A','B'=>'B','D'=>'D']) ?>
    </div>



    <div class="col-md-6">
	    <?= $form->field($model, 'department')->dropDownList($departments) ?>

    </div>
    <div class="col-md-6">
	    <?= $form->field($model, 'res_person_tabel')->textInput() ?>
    </div>


	    <div class="col-md-6">
		    <?= $form->field($model, 'repair_case')->dropDownList([1=>'kichik',2=>"o'rta",3=>'katta']) ?>
	    </div>
    <div class="col-md-12">
<!--    <label for="male">Muammo(lar)</label>-->

    <?php
   if (!$model->isNewRecord) {
        $tags = \yii\helpers\ArrayHelper::map(\app\models\TagAssign::find()->where(['post_id'=>$model->id])->all(),'id','tag.id');
        $tags_str = implode(',',$tags);
    }else{
        $tags_str = '';
    }
    echo $form->field($model, 'tag')->widget(\dosamigos\selectize\SelectizeTextInput::className(), [
	    'loadUrl' => ['tag/list'],
	    'value' =>$tags_str,
	    'clientOptions' => [
		    'plugins' => ['remove_button'],
		    'valueField' => 'keyword',
		    'labelField' => 'keyword',
		    'searchField' => ['keyword'],
		    'create' => false,
		    'delimiter' => ',',
		    'persist' => false,
		    'createOnBlur' => true,
		    'preload'=> false,
	    ]
    ]);
    ?>
    </div>
	    <div style="clear:both"></div>

    <div class="col-md-6">
    <?= $form->field($model, 'problem')->textarea(['rows' => 6]) ?>
    </div>
   
    <div class="col-md-6">
      <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
    </div>
    </div>


  

   



 

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    <?php else : ?>
	    <br>
	    <div class="alert alert-warning">
		    <strong>Ushbu P/O raqamlari bo'yicha ma'lumotlar bazasida natija topilmadi!</strong>
	    </div>
 <?php endif; ?>
