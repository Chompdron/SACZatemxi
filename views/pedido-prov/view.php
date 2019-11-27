<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\PedidoProvLista;
use app\models\Insumo;
use app\models\Proveedor;

/* @var $this yii\web\View */
/* @var $model app\models\Venta */

$this->title = $model->PedidoProvID;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$detc = PedidoProvLista::find()->where(["PedidoProvID"=>$model->PedidoProvID])->all();
$Proveedor = Proveedor::findone($model->ProveedorID);

?>
<div class="venta-view">

    <h1>TICKET #<?= Html::encode($this->title) ?></h1>
    
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Proveedor</th>
        </tr>
    </thead>
    <tbody>
    <tr>
      <td><?=$model->Fecha?></td>
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
    foreach ($detc as $detallev) {
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


</div>
