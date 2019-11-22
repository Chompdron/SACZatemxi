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

    
    
    <div class="col-md-6">
        <?= Html::a('Regresar',["nuevaventa"], ['class' => 'btn btn-success']) ?>
    </div>

   
    <div class="col-md-6">
        <?= Html::submitButton('FINALIZAR VENTA', ['class' => 'btn btn-success']) ?>
    </div>