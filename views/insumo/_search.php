<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InsumoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="insumo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'InsumoID') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'UnidadPresentacionID') ?>

    <?= $form->field($model, 'Stock') ?>

    <?= $form->field($model, 'PrecioXUnidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
