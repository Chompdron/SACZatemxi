<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProveedorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ProveedorID') ?>

    <?= $form->field($model, 'NombreComercial') ?>

    <?= $form->field($model, 'RazonSocial') ?>

    <?= $form->field($model, 'RFC') ?>

    <?= $form->field($model, 'Telefono') ?>

    <?php // echo $form->field($model, 'CorreoElectronico') ?>

    <?php // echo $form->field($model, 'Direccion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
