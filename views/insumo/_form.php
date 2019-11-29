<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Insumo */
/* @var $form yii\widgets\ActiveForm */
$mUnidadPresentacion = \app\models\Unidadpresentacion::find()->orderBy('Nombre')->all();
$cmbUnidadPresentacion = \yii\helpers\ArrayHelper::map($mUnidadPresentacion, 'UnidadPresentacionID', 'Nombre');

$mProv = \app\models\Proveedor::find()->orderBy('NombreComercial')->all();
$cmbProv = \yii\helpers\ArrayHelper::map($mProv, 'ProveedorID', 'NombreComercial');

?>

<div class="insumo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4 col-lg-4">
        <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4 col-lg-4">
        <?=$form->field($model, 'UnidadPresentacionID')->widget(Select2::classname(), [
                    'id'       => 'Unidadpresentacion',
                    'value'    => $model->UnidadPresentacionID,
                    'data'     => $cmbUnidadPresentacion, 'options'  => ['placeholder' => 'Seleccione la unidad de presentación ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => false]])?>
    </div>
    <div class="col-md-4 col-lg-4">
        <?= $form->field($model, 'Stock')->textInput() ?>
    </div>
    <div class="col-md-4 col-lg-4">
        <?= $form->field($model, 'PrecioXUnidad')->textInput() ?>
    </div>
    <div class="col-md-4 col-lg-4">
        <?=$form->field($model, 'ProveedorID')->widget(Select2::classname(), [
                    'id'       => 'Unidadpresentacion',
                    'value'    => $model->ProveedorID,
                    'data'     => $cmbProv, 'options'  => ['placeholder' => 'Seleccione el proveedor ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => false]])?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
    
    <div class="form-group">
        <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>