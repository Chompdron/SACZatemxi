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



?>
<?php $form = ActiveForm::begin(); ?>

<div class="venta-form">

    <div class="col-md-6">

        <label>Fecha de la Venta</label>
        <?= DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'Fecha',
                    'options' => ['required'=>true],
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-M-yyyy'
                        ]
                ]);?>
    </div>

    <div class="col-md-6">
        <?=$form->field($model, 'ClienteID')->label("Nombre del Cliente")->widget(Select2::classname(), [
                    'id'       => 'cliente',
                    'value'    => $model->ClienteID,
                    'data'     => $cmbCliente, 'options'  => ['placeholder' => 'Seleccione el cliente ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => false]])?>
    </div>
    
     
    <div class="col-md-4">
        <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="col-md-4">
        <?= Html::submitButton('Agregar Producto', ['class' => 'btn btn-success']) ?>
    </div>
    
    <div class="col-md-4">
        <?= Html::a('Finalizar',["finalizarventa"], ['class' => 'btn btn-success']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
