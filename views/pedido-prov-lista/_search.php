<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoProvListaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-prov-lista-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PedidoProvListaID') ?>

    <?= $form->field($model, 'PedidoProvID') ?>

    <?= $form->field($model, 'InsumoID') ?>

    <?= $form->field($model, 'Cantidad') ?>

    <?= $form->field($model, 'ImportePorPieza') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
