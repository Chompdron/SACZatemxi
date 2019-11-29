<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use app\models\Insumo;
use app\models\Proveedor;


/* @var $this yii\web\View */
/* @var $model app\models\Venta */
/* @var $form yii\widgets\ActiveForm */
    $Proveedor = Proveedor::findone($_SESSION["compra"]->ProveedorID);
	$mProveedor = \app\models\Proveedor::find()->orderBy('NombreComercial')->all();
    $cmbProveedor = \yii\helpers\ArrayHelper::map($mProveedor, 'ProveedorID', 'NombreComercial');
?>

<?php $form = ActiveForm::begin(); ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Proveedor</th>
        </tr>
    </thead>
    <tbody>
    <tr>
      <td><?=$_SESSION["compra"]->Fecha?></td>
      <td><?=$Proveedor->NombreComercial?></td>
    </tr>
    </tbody>
</table>
    
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
    
    $_SESSION["compra"]->Total=$totalT;
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
        <?= Html::a('Regresar',["nuevacompra"], ['class' => 'btn btn-success']) ?>
    </div>

   
    <div class="col-md-6">
        <?= Html::submitButton('FINALIZAR COMPRA', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>