<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s

/* @var $this yii\web\View */
/* @var $model app\models\Venta */
/* @var $form yii\widgets\ActiveForm */

	$mCliente = \app\models\Cliente::find()->orderBy('NombreComercial')->all();
    $cmbCliente = \yii\helpers\ArrayHelper::map($mCliente, 'ClienteID', 'NombreComercial');
?>
	<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'Total')->textInput() ?>

    <?= $form->field($model, 'Descuento')->textInput() ?>

    <div class="col-md-4 col-lg-4">
        <?=$form->field($model, 'ClienteID')->widget(Select2::classname(), [
                    'id'       => 'cliente',
                    'value'    => $model->ClienteID,
                    'data'     => $cmbCliente, 'options'  => ['placeholder' => 'Seleccione el cliente ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
    </div>
    <br><br><br><br>

    <!--<?= $form->field($model, 'ClienteID')->textInput() ?>-->
    <div class="venta-form">


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
