<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker


/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */

       
        $mProducto = \app\models\Producto::find()->orderBy('Nombre')->all();
        $cmbProducto = \yii\helpers\ArrayHelper::map($mProducto, 'ProductoID', 'Nombre');
?>

<div class="pedido-form">


    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
    <div class="col-md-6 col-lg-6">
        <?=$form->field($model, 'ProductoID')->widget(Select2::classname(), [
                    'id'       => 'producto',
                    'value'    => $model->ProductoID,
                    'data'     => $cmbProducto, 'options'  => ['placeholder' => 'Seleccione el producto ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => false]])?>
    </div>


 

    <div class="col-md-6 col-lg-6">
        <?= $form->field($model, 'UnidadXLote')->textInput() ?>
    </div>
    
       <div class="col-md-6">

        <label>Fecha de Inicio</label>
        <?= DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'FechaInicio',
                    'options' => ['required'=>true],
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                ]);?>
    </div>
    
    <label>Fecha provisional de término</label>
        <?= DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'FechaFin',
                    'options' => ['required'=>true],
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                ]);?>
    </div>
    
   
    <div>
        <?= $form->field($model, 'Status')->checkbox(["checked"=>false])->hiddenInput() ?>
    </div>
    </div>
    <div class="form-group">
       
    <div class="col-sm-6">
        <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
    </div>
    
    
    <div class="col-sm-6">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
