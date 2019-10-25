<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VentaListaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venta-lista-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'DetVentaID') ?>

    <?= $form->field($model, 'VentaID') ?>

    <?= $form->field($model, 'ProductoID') ?>

    <?= $form->field($model, 'Cantidad') ?>

    <?= $form->field($model, 'PrecioVenta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
