<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2; // utilizados para select2

/* @var $this yii\web\View */
/* @var $model app\models\Receta */
/* @var $form yii\widgets\ActiveForm */


        $mUsuarios = \app\models\Producto::find()->orderBy('Nombre')->all();
        $cmbUsuarios = \yii\helpers\ArrayHelper::map($mUsuarios, 'ProductoID', 'Nombre');
?>

<div class="receta-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="col-md-4 col-lg-4">
            <?=$form->field($model, 'ProductoID')->widget(Select2::classname(), [
                    'id'       => 'usuario',
                    'value'    => $model->ProductoID,
                    'data'     => $cmbUsuarios, 'options'  => ['placeholder' => 'Seleccione el usuario ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?></div>
    

    <?= $form->field($model, 'InsumoID')->textInput() ?>

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
