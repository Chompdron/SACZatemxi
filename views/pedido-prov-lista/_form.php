<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoProvLista */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-prov-lista-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PedidoProvID')->textInput() ?>

    <?= $form->field($model, 'InsumoID')->textInput() ?>

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <?= $form->field($model, 'ImportePorPieza')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
