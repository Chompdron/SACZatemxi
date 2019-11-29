<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2


/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */

       
        $mProducto = \app\models\Producto::find()->orderBy('Nombre')->all();
        $cmbProducto = \yii\helpers\ArrayHelper::map($mProducto, 'ProductoID', 'Nombre');
?>

<div class="pedido-form">


    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
    <div class="col-md-4 col-lg-4">
        <?=$form->field($model, 'ProductoID')->widget(Select2::classname(), [
                    'id'       => 'producto',
                    'value'    => $model->ProductoID,
                    'data'     => $cmbProducto, 'options'  => ['placeholder' => 'Seleccione el producto ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
    </div>


 

    <div class="col-md-4 col-lg-4">
        <?= $form->field($model, 'UnidadXLote')->textInput() ?>
    </div>
    <div class="col-md-4 col-lg-4">
        <?= $form->field($model, 'FechaInicio')->textInput() ?>
    </div>
    <div class="col-md-4 col-lg-4">
        <?= $form->field($model, 'FechaFin')->textInput() ?>

    </div>
    <div class="col-md-4 col-lg-4">
        <?= $form->field($model, 'Status')->checkbox(["checked"=>true])->hiddenInput() ?>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
    </div>
    
    <div class="form-group">
        
    </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
