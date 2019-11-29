<?php

use yii\helpers\Html;
use yii\web\View;
use app\models\Pedidoprov;
use yii\widgets\ActiveForm;
use app\models\Insumo;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker
?>


<?php 

	$mProveedor = \app\models\Proveedor::find()->orderBy('NombreComercial')->all();
    $cmbProveedor = \yii\helpers\ArrayHelper::map($mProveedor, 'ProveedorID', 'NombreComercial');

$form = ActiveForm::begin(); ?>
<div class="col-md-6">

    <label>Fecha de la Venta</label>
    <?= DatePicker::widget([
                    'model' => $_SESSION["compra"],
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
    <?=$form->field($_SESSION["compra"], 'ProveedorID')->widget(Select2::classname(), [
                    'id'       => 'Proveedor',
                    'value'    => $_SESSION["compra"]->ProveedorID,
                    'data'     => $cmbProveedor, 'options'  => ['placeholder' => 'Seleccione el Proveedor ...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
</div>
<br><br><br><br>

<? ActiveForm::end(); ?>


<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Insumo</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
    <?php $totalT=0;
    foreach ($_SESSION["detc"] as $detallev) {
        $ProdCompra = Insumo::findone($detallev->InsumoID);
        if(isset($num)){$num +=1;}else{$num =1;}
        $total = ($detallev->Cantidad) * ($detallev->ImportePorPieza);
        $totalT += $total;
        echo '<tr>';
        echo "<th scope=\"row\">".$num."</th>";
        echo "<td>".$ProdCompra->Descripcion."</td>";
        echo "<td>".$detallev->Cantidad."</td>";
        echo "<td>".$detallev->ImportePorPieza." $</td>";
        echo "<td>".$total." $</td>";
        echo "</tr>";
    }
    //echo var_dump($detallev);
    ?> 
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td>IVA (16%)</td>
      <td><?=$totalT*0.16?> $</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td>TOTAL</td>
      <td><?=$totalT?> $</td>
    </tr>
    </tbody>
</table>


<div class="col-md-4">
    <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
</div>

<div class="col-md-4">
    <?= Html::a('Agregar Insumo',["agregarprod"], ['class' => 'btn btn-success']) ?>
</div>

<div class="col-md-4">
    <?= Html::a('Finalizar',["finalizarcompra"], ['class' => 'btn btn-success']) ?>
</div>
