<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker

/* @var $this yii\web\View */
/* @var $model app\models\Venta */
/* @var $form yii\widgets\ActiveForm */

	$mCliente = \app\models\Cliente::find()->orderBy('NombreComercial')->all();
    $cmbCliente = \yii\helpers\ArrayHelper::map($mCliente, 'ClienteID', 'NombreComercial');

    $mProducto = \app\models\Producto::find()->orderBy('Nombre')->all();
    $cmbProducto1 = \yii\helpers\ArrayHelper::map($mProducto, 'ProductoID', 'Nombre');
    $cmbProducto2 = \yii\helpers\ArrayHelper::map($mProducto, 'ProductoID', 'Nombre');

?>
<?php $form = ActiveForm::begin(); ?>

<div class="venta-form">

    <div class="col-md-4">

        <label>Fecha de la Venta</label>
        <?= DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'Fecha',
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-M-yyyy'
                        ]
                ]);?>
    </div>

    <div class="col-md-4 col-lg-4">
        <?= $form->field($model, 'Descuento')->textInput() ?>
    </div>

    <div class="col-md-4 col-lg-4">
        <?=$form->field($model, 'ClienteID')->widget(Select2::classname(), [
                    'id'       => 'cliente',
                    'value'    => $model->ClienteID,
                    'data'     => $cmbCliente, 'options'  => ['placeholder' => 'Seleccione el cliente ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
    </div>
    
    <div class="col-md-8 col-lg-8">
        <?=$form->field($prod1, 'ProductoID')->widget(Select2::classname(), [
                    'id'       => 'Producto1',
                    'value'    => $prod1->ProductoID,
                    'data'     => $cmbProducto1, 'options'  => ['placeholder' => 'Seleccione el producto ...'],
                    'language' => 'es', 
                    'pluginOptions' => ['allowClear' => true]
                    ])?>
    </div>

    <div class="col-md-4 col-lg-4">
        <?= $form->field($prod1, 'Cantidad')->textInput() ?>
    </div>

    <div class="col-md-8 col-lg-8">
        <?=$form->field($prod2, 'PrecioVenta')->widget(Select2::classname(), [
                    'id'       => 'ProductoID2',
                    'value'    => $prod2->ProductoID,
                    'data'     => $cmbProducto2, 'options'  => ['placeholder' => 'Seleccione el producto ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]
                ])?>
    </div>

    <div class="col-md-4 col-lg-4">
        <?= $form->field($prod2, 'Cantidad')->textInput() ?>
    </div>


    <div class="col-md-6">
        <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="col-md-6">
        <?= Html::a('Siguiente',["finalizarventa"], ['class' => 'btn btn-success']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
