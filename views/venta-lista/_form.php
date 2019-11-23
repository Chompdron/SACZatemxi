<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VentaLista */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venta-lista-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'VentaID')->textInput() ?>

    <?= $form->field($model, 'ProductoID')->textInput() ?>

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <?= $form->field($model, 'PrecioVenta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
    
    <div class="form-group">
        <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
