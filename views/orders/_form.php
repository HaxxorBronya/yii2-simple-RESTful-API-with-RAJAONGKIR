<?php

use app\models\Cities;
use app\models\Province;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Orders $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <p>
        <b>Pengiriman dari DI Yogyakarta</b> <br>
        ke :
    </p>
    <?= $form->field($model, 'id_province')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Province::find()->all(),'province_id','province'),
            'options' => [
                'placeholder' => 'Choose Province',
                'onchange'=>'
                    $.post("'.Url::to('/orders/list-kota?province_id=').'" + $(this).val(),function(data){ 
                        $("#kota" ).html(data);
                    });
                '
            ],
        ])
    ?>
    <?= $form->field($model, 'id_cities')->widget(Select2::classname(), [
        'data' => [],
        'options' => [
            'placeholder' => 'Choose City',
            'id' => 'kota'
        ]
    ])
    ?>
    


    <?= $form->field($model, 'kurir')->widget(Select2::classname(), [
            'data' => [
                'jne' => 'JNE',
                'pos' => 'Pos Indonesia',
                'tiki' => 'TIKI'
            ],
            
            'options' => [
                'placeholder' => '',
                
                'onchange'=>'
                    $.post("'.Url::to('/orders/cost?&kurir=').'"+$(this).val()+"&tujuan="+$("#kota").val(),function(data){ 
                        $("#cost" ).html(data);
                    });
                '
            ],
            'theme' => Select2::THEME_KRAJEE,
            'size' => 'md'
            
        ])
    ?>
    <div id="cost"></div>
    <?= $form->field($model, 'service')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ongkir')->textInput([
       
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    

</div>
