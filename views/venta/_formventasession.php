<?php

use yii\helpers\Html;
use yii\web\View;
use app\models\Venta;
use yii\widgets\ActiveForm;
use app\models\Producto;
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

<p>Aquí iría el tickeddddddddddt de mientras</p>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
    <?php $totalT=0;
    foreach ($_SESSION["detv"] as $detallev) {
        $ProdCompra = Producto::findone($detallev->ProductoID);
        if(isset($num)){$num +=1;}else{$num =1;}
        $total = ($detallev->Cantidad) * ($detallev->PrecioVenta);
        $totalT += $total;
        echo '<tr>';
        echo "<th scope=\"row\">".$num."</th>";
        echo "<td>".$ProdCompra->Nombre."</td>";
        echo "<td>".$detallev->Cantidad."</td>";
        echo "<td>".$detallev->PrecioVenta." $</td>";
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
    <?= Html::a('Agregar Producto',["agregarprod"], ['class' => 'btn btn-success']) ?>
</div>

<div class="col-md-4">
    <?= Html::a('Finalizar',["finalizarventa"], ['class' => 'btn btn-success']) ?>
</div>
