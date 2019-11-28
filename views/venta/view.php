<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\VentaLista;
use app\models\Producto;
use app\models\Cliente;

/* @var $this yii\web\View */
/* @var $model app\models\Venta */

$this->title = $model->VentaID;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$detv = VentaLista::find()->where(["VentaID"=>$model->VentaID])->all();
$Cliente = Cliente::findone($model->ClienteID);

?>
<div class="venta-view">

    <h1>TICKET #<?= Html::encode($this->title) ?></h1>
    
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Cliente</th>
        </tr>
    </thead>
    <tbody>
    <tr>
      <td><?=$model->Fecha?></td>
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
    foreach ($detv as $detallev) {
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
        <?= Html::a("IMPRIMIR",['/venta/pdf','id'=>$model->VentaID],["options"=>["data-pjax"=>"0"]]); ?>
    </div>

</div>
