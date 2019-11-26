<?php 

use miloschuman\highcharts\Highcharts;

use miloschuman\highcharts\HighchartsAsset; //Para cargar únicamente las librerías

//Traer todos los productos ordenados por nombre
$mProducto = \app\models\Producto::find()->orderBy('Nombre')->all();
//Llenar un arreglo con los nombres de los productos para que sean las "categorías"
$ProductosLista = Array();
foreach ($mProducto as $prod) {
array_push($ProductosLista,$prod->Nombre); 
}

//Traer todos los Clientes ordenados por nombre
$mCliente = \app\models\Cliente::find()->orderBy('NombreComercial')->all();
//Llenar un arreglo con los nombres de los Clientes para que sean las "categorías"
$ClientesLista = Array();
foreach ($mCliente as $cl) {
array_push($ClientesLista,$cl->NombreComercial); 
}


?>



<?=Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Clientes que más compran'],
      'xAxis' => [
         'categories' => $ProductosLista
      ],
      'yAxis' => [
         'title' => ['text' => 'Compras']
      ],
      'series' => [
         ['name' => 'Jane', 'data' => [1, 0]],
         ['name' => 'John', 'data' => [5, 7]]
      ]
   ]
])?>


<?php
//Para cargar únicamente las librerías
HighchartsAsset::register($this)->withScripts(['highstock', 'modules/exporting', 'modules/drilldown']);?>
