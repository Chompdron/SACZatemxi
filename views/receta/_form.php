<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2; // utilizados para select2

/* @var $this yii\web\View */
/* @var $model app\models\Receta */
/* @var $form yii\widgets\ActiveForm */


        $mProducto = \app\models\Producto::find()->orderBy('Nombre')->all();
        $cmbProducto = \yii\helpers\ArrayHelper::map($mProducto, 'ProductoID', 'Nombre');


        $mInsumo = \app\models\Insumo::find()->orderBy('Descripcion')->all();
        $cmbInsumo = \yii\helpers\ArrayHelper::map($mInsumo, 'InsumoID', 'Descripcion');

?>

<div class="receta-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4 col-lg-4">
        <?=$form->field($model, 'ProductoID')->widget(Select2::classname(), [
                    'id'       => 'producto',
                    'value'    => $model->ProductoID,
                    'data'     => $cmbProducto, 'options'  => ['placeholder' => 'Seleccione el producto ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
    </div>



    <div class="col-md-4 col-lg-4">
        <?=$form->field($model, 'InsumoID')->widget(Select2::classname(), [
                    'id'       => 'insumo',
                    'value'    => $model->InsumoID,
                    'data'     => $cmbInsumo, 'options'  => ['placeholder' => 'Seleccione el insumo ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
    </div>
    
    <div class="col-md-4 col-lg-4">
        <?= $form->field($model, 'Cantidad')->textInput() ?>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>