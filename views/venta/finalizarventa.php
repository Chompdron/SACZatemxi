<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use app\models\Producto;
use app\models\Cliente;


/* @var $this yii\web\View */
/* @var $model app\models\Venta */
/* @var $form yii\widgets\ActiveForm */
    $Cliente = Cliente::findone($_SESSION["venta"]->ClienteID);
	$mCliente = \app\models\Cliente::find()->orderBy('NombreComercial')->all();
    $cmbCliente = \yii\helpers\ArrayHelper::map($mCliente, 'ClienteID', 'NombreComercial');
?>

<?php $form = ActiveForm::begin(); ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Cliente</th>
        </tr>
    </thead>
    <tbody>
    <tr>
      <td><?=$_SESSION["venta"]->Fecha?></td>
      <td><?=$Cliente->NombreComercial?></td>
    </tr>
    </tbody>
</table>
    
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
    
    $_SESSION["venta"]->Total=$totalT;
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

    <div class="col-md-6">
        <?= Html::a('Regresar',["nuevaventa"], ['class' => 'btn btn-success']) ?>
    </div>

   
    <div class="col-md-6">
        <?= Html::submitButton('FINALIZAR VENTA', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>