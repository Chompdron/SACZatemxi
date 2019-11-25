<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker

/* @var $this yii\web\View */
/* @var $model app\models\Venta */
/* @var $form yii\widgets\ActiveForm */

    $mProducto = \app\models\Producto::find()->orderBy('Nombre')->all();
    $cmbProducto = \yii\helpers\ArrayHelper::map($mProducto, 'ProductoID', 'Nombre');

?>
<?php $form = ActiveForm::begin(); ?>

<div class="venta-form">

    
    <div class="col-md-8 col-lg-8">
        <?=$form->field($detv, 'ProductoID')->widget(Select2::classname(), [
                    'id'       => 'Producto',
                    'value'    => $detv->ProductoID,
                    'data'     => $cmbProducto, 'options'  => ['placeholder' => 'Seleccione el producto ...'],
                    'language' => 'es', 
                    'pluginOptions' => ['allowClear' => true]
                    ])?>
    </div>

    <div class="col-md-4 col-lg-4">
        <?= $form->field($detv, 'Cantidad')->textInput() ?>
    </div>

    <div class="col-md-6">
        <?= Html::a('Regresar',["nuevaventa"], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="col-md-6">
        <?= Html::submitButton('AGREGAR', ['class' => 'btn btn-success']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
