<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\ProblemMonitorings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="problem-monitorings-form">

    <?php $form = ActiveForm::begin(); ?>
    <h1><?= var_dump($_GET['ponno']) ?></h1>
 <?php
   $api = "http://web.uzautomotors.com/empc/getVehicleInfo/".$_GET['ponno'];
 
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
 
$assoc = array();
    foreach ($ready->data as $read) {
      $string = $read->pono.' model: '.$read->model.' vinno: '.$read->vinno;
        $assoc[] =$string;
       $assocPono = $read->pono;
       $assocModel = $read->model;
      }

echo '<pre>';

 var_dump(print_r($assoc));
 echo $imp = implode($assoc);
 print_r (explode(" ",$imp));
 $exp =explode(" ",$imp) ;
echo "</pre>";
    ?> 
    <h1><?=$exp[0]?></h1>
    
    <div class="containing" style='width:95%'>
    <div class="col-md-12" style='margin-botton:30px'>
    <?= $form->field($model, 'search')->widget(TypeaheadBasic::classname(), [
        'data' => $assoc,
        'pluginOptions' => ['highlight' => true],
        'scrollable' => true,
        'options' => [
            'placeholder' => 'Izlang...',
            'onchange'=> '
        $.post(
            "' . Url::toRoute('getoperations') . '", 
            {id: $(this).val()}, 
            function(res){
                $("#emeliyyatlar").html(res);
            }
        );'],
        
    ]); ?>
    </div>
   
    <div class="col-md-4">
    <?= $form->field($model, 'sector')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'shift')->dropdownlist(['А'=>'А','В'=>'В','Д'=>'Д']) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
    </div>


    <div class="col-md-4">
    <?= $form->field($model, 'date')->input('date',['format'=>'dd-mm-YYYY','value'=>date("Y-m-d")]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'department')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'spent_on')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-12" style='margin-botton:30px'>
    <label for="male">Muammo(lar)</label>
    <?php
   if (!$model->isNewRecord) {
        $tags = \yii\helpers\ArrayHelper::map(\app\models\TagAssign::find()->where(['post_id'=>$model->id])->all(),'id','tag.name');
        $tags_str = implode(',',$tags);
    }else{
        $tags_str = '';
    }
    echo \dosamigos\selectize\SelectizeTextInput::widget([
        'name' => 'ProblemMonitorings[tag]',
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
   
    <div class="col-md-6">
    <?= $form->field($model, 'problem')->textarea(['rows' => 6]) ?>
    </div>
   
    <div class="col-md-6">
      <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
    </div>
    </div>


  

   



 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
