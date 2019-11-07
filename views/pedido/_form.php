<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2


/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */

       
        $mProducto = \app\models\Producto::find()->orderBy('Nombre')->all();
        $cmbProducto = \yii\helpers\ArrayHelper::map($mProducto, 'ProductoID', 'Nombre');
?>

<div class="pedido-form">


    <?php $form = ActiveForm::begin(); ?>



<div class="col-md-4 col-lg-4">
        <?=$form->field($model, 'ProductoID')->widget(Select2::classname(), [
                    'id'       => 'producto',
                    'value'    => $model->ProductoID,
                    'data'     => $cmbProducto, 'options'  => ['placeholder' => 'Seleccione el producto ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
    </div>


    <br><br><br><br>

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
