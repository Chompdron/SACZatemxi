<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Insumo */
/* @var $form yii\widgets\ActiveForm */

	$mUnidadPresentacion = \app\models\Unidadpresentacion::find()->orderBy('Nombre')->all();
    $cmbUnidadPresentacion = \yii\helpers\ArrayHelper::map($mUnidadPresentacion, 'UnidadPresentacionID', 'Nombre');
?>

<div class="insumo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4 col-lg-4">
        <?=$form->field($model, 'UnidadPresentacionID')->widget(Select2::classname(), [
                    'id'       => 'Unidadpresentacion',
                    'value'    => $model->UnidadPresentacionID,
                    'data'     => $cmbUnidadPresentacion, 'options'  => ['placeholder' => 'Seleccione la unidad de presentación ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
    </div>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UnidadPresentacionID')->textInput() ?>

    <?= $form->field($model, 'Stock')->textInput() ?>

    <?= $form->field($model, 'PrecioXUnidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
