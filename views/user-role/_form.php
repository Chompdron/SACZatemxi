<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2; // utilizados para select2

/* @var $this yii\web\View */
/* @var $model app\models\UserRole */
/* @var $form yii\widgets\ActiveForm */

	$mUsuario = \app\models\Users::find()->orderBy('username')->all();
    $cmbUsuario = \yii\helpers\ArrayHelper::map($mUsuario, 'id', 'username');

    $mRole = \app\models\Role::find()->orderBy('Nombre')->all();
    $cmbRole = \yii\helpers\ArrayHelper::map($mRole, 'RoleID', 'Nombre');
?>

<div class="user-role-form">

    <?php $form = ActiveForm::begin(); ?>


<div class="col-md-4 col-lg-4">
        <?=$form->field($model, 'UserID')->widget(Select2::classname(), [
                    'id'       => 'usuario',
                    'value'    => $model->UserID,
                    'data'     => $cmbUsuario, 'options'  => ['placeholder' => 'Seleccione el usuario ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
    </div>

<div class="col-md-4 col-lg-4">
        <?=$form->field($model, 'RoleID')->widget(Select2::classname(), [
                    'id'       => 'role',
                    'value'    => $model->RoleID,
                    'data'     => $cmbRole, 'options'  => ['placeholder' => 'Seleccione el rol ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
    </div>

   <!-- <?= $form->field($model, 'UserID')->textInput() ?>

    <?= $form->field($model, 'RoleID')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
