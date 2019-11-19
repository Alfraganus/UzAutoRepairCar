<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Test */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-form">

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
echo "</pre>";
    ?> 
    

    <?= $form->field($model, 'search')->widget(TypeaheadBasic::classname(), [
        'data' => $assoc,
        'pluginOptions' => ['highlight' => true],
        'scrollable' => true,
        'options' => [
            'placeholder' => 'Filter as you type ...',
            'onchange'=> '
        $.post(
            "' . Url::toRoute('getoperations') . '", 
            {id: $(this).val()}, 
            function(res){
                $("#emeliyyatlar").html(res);
            }
        );'],
        
    ]); ?>





    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
