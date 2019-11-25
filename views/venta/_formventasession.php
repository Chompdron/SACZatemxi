<?php

use yii\helpers\Html;
use yii\web\View;
use app\models\Venta;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker
?>


<?php 

	$mCliente = \app\models\Cliente::find()->orderBy('NombreComercial')->all();
    $cmbCliente = \yii\helpers\ArrayHelper::map($mCliente, 'ClienteID', 'NombreComercial');

$form = ActiveForm::begin(); ?>
          <div class="col-md-6">

        <label>Fecha de la Venta</label>
        <?= DatePicker::widget([
                    'model' => $_SESSION["venta"],
                    'attribute' => 'Fecha',
                    'options' => ['required'=>true],
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-M-yyyy'
                        ]
                ]);?>
    </div>
       <div class="col-md-4 col-lg-4">
        <?=$form->field($_SESSION["venta"], 'ClienteID')->widget(Select2::classname(), [
                    'id'       => 'cliente',
                    'value'    => $_SESSION["venta"]->ClienteID,
                    'data'     => $cmbCliente, 'options'  => ['placeholder' => 'Seleccione el cliente ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
    </div>
    <br><br><br><br>

    <? ActiveForm::end(); ?> 
        
    <p>Aquí iría el ticket de mientras</p>
     <?
    foreach ($_SESSION["detv"] as $valor) {
    var_dump($valor);
    }?>
    
     
         
    <div class="col-md-4">
        <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="col-md-4">
        <?= Html::a('Agregar Producto',["agregarprod"], ['class' => 'btn btn-success']) ?>
    </div>
    
    <div class="col-md-4">
        <?= Html::a('Finalizar',["finalizarventa"], ['class' => 'btn btn-success']) ?>
    </div>
