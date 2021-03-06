<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */
/* @var $form yii\widgets\ActiveForm */

 		$mUsuario = \app\models\Users::find()->orderBy('username')->all();
        $cmbUsuario = \yii\helpers\ArrayHelper::map($mUsuario, 'id', 'username');

?>

<div class="empleado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <div class="col-md-4 col-lg-4">
        <?= $form->field($model, 'HorasxSem')->textInput() ?>
    </div>
    <div class="col-md-4 col-lg-4">
        <?= $form->field($model, 'PagoxHrs')->textInput() ?>
    </div>

        <div class="col-md-4 col-lg-4">
        <?=$form->field($model, 'UserID')->widget(Select2::classname(), [
                    'id'       => 'usuario',
                    'value'    => $model->UserID,
                    'data'     => $cmbUsuario, 'options'  => ['placeholder' => 'Seleccione el usuario ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
    
    <div class="form-group">
        <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
