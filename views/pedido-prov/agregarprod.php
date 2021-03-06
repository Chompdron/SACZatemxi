<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker

/* @var $this yii\web\View */
/* @var $model app\models\Venta */
/* @var $form yii\widgets\ActiveForm */

    $mInsumo = \app\models\Insumo::find()->Where('ProveedorID = '.$_SESSION["compra"]->ProveedorID)->all();
    $cmbInsumo = \yii\helpers\ArrayHelper::map($mInsumo, 'InsumoID', 'Descripcion');

?>
<?php $form = ActiveForm::begin(); ?>

<div class="venta-form">

    
    <div class="col-md-8 col-lg-8">
        <?=$form->field($detc, 'InsumoID')->widget(Select2::classname(), [
                    'id'       => 'Insumo',
                    'value'    => $detc->InsumoID,
                    'data'     => $cmbInsumo, 'options'  => ['placeholder' => 'Seleccione el Insumo ...'],
                    'language' => 'es', 
                    'pluginOptions' => ['allowClear' => true]
                    ])?>
    </div>

    <div class="col-md-4 col-lg-4">
        <?= $form->field($detc, 'Cantidad')->textInput() ?>
    </div>

    <div class="col-md-6">
        <?= Html::a('Regresar',["nuevacompra"], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="col-md-6">
        <?= Html::submitButton('AGREGAR', ['class' => 'btn btn-success']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
