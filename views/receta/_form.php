<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Receta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ProductoID')->textInput() ?>

    <?= $form->field($model, 'InsumoID')->textInput() ?>

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
