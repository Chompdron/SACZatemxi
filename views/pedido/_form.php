<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ProductoID')->textInput() ?>

    <?= $form->field($model, 'UnidadXLote')->textInput() ?>

    <?= $form->field($model, 'FechaInicio')->textInput() ?>

    <?= $form->field($model, 'FechaFin')->textInput() ?>

    <?= $form->field($model, 'Status')->checkbox() ?>

    <?= $form->field($model, 'FechaStatusFin')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
