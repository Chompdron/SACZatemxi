<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker


/* @var $this yii\web\View */
/* @var $model app\models\Venta */
/* @var $form yii\widgets\ActiveForm */

	$mProveedor = \app\models\Proveedor::find()->orderBy('NombreComercial')->all();
    $cmbProveedor = \yii\helpers\ArrayHelper::map($mProveedor, 'ProveedorID', 'NombreComercial');



?>
<?php $form = ActiveForm::begin(); ?>

<div class="venta-form">

    <div class="col-md-6">

        <label>Fecha</label>
        <?= DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'Fecha',
                    'options' => ['required'=>true],
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                ]);?>
    </div>

    <div class="col-md-6">
        <?=$form->field($model, 'ProveedorID')->label("Nombre del Proveedor")->widget(Select2::classname(), [
                    'id'       => 'Proveedor',
                    'value'    => $model->ProveedorID,
                    'data'     => $cmbProveedor, 'options'  => ['placeholder' => 'Seleccione el Proveedor ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => false]])?>
    </div>
    
     
    <div class="col-md-4">
        <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="col-md-4">
        <?= Html::submitButton('Agregar Insumo', ['class' => 'btn btn-success']) ?>
    </div>
    
    <div class="col-md-4">
        <?= Html::a('Finalizar',["finalizarventa"], ['class' => 'btn btn-success']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
