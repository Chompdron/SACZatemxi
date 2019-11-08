<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2


/* @var $this yii\web\View */
/* @var $model app\models\PedidoProv */
/* @var $form yii\widgets\ActiveForm */

		$mProveedor = \app\models\Proveedor::find()->orderBy('NombreComercial')->all();
        $cmbProveedor = \yii\helpers\ArrayHelper::map($mProveedor, 'ProveedorID', 'NombreComercial');
?>

<div class="pedido-prov-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-4 col-lg-4">
        <?=$form->field($model, 'ProveedorID')->widget(Select2::classname(), [
                    'id'       => 'proveedor',
                    'value'    => $model->ProveedorID,
                    'data'     => $cmbProveedor, 'options'  => ['placeholder' => 'Seleccione el proveedor...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
    </div>


    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'Total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
    
    <div class="form-group">
        <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
