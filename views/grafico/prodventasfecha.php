<?php 

use miloschuman\highcharts\Highcharts;

use miloschuman\highcharts\HighchartsAsset; //Para cargar únicamente las librerías

use yii\web\JsExpression;

//SELECT producto.Nombre,SUM(ventalista.Cantidad) FROM ventalista INNER JOIN producto ON producto.ProductoID = ventalista.ProductoID INNER JOIN venta ON venta.VentaID = ventalista.DetVentaID WHERE venta.Fecha BETWEEN CAST('2014-02-01' AS DATE) AND CAST('2020-02-28' AS DATE) GROUP BY producto.ProductoID;


$list= Yii::$app->db->createCommand('SELECT producto.Nombre as name,SUM(ventalista.Cantidad) as y FROM ventalista INNER JOIN producto ON producto.ProductoID = ventalista.ProductoID INNER JOIN venta ON venta.VentaID = ventalista.DetVentaID WHERE venta.Fecha BETWEEN CAST(\''.$_SESSION["Fechas"]->FechaInicio.'1\' AS DATE) AND CAST(\''.$_SESSION["Fechas"]->FechaFin.'\' AS DATE) GROUP BY producto.ProductoID;')->queryAll();

//Llenar un arreglo con los nombres de los productos para que sean las "categorías"

$arreglo = array();
foreach ($list as $prod) {
    $arreglotemp = ['name'=> $prod['name'],
            'y'=> $prod['y']+0

            ];
    
  array_push($arreglo,$arreglotemp); 
}

//echo var_dump($arreglo);

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        
        'type' => 'column',
        
        'title' => [
            'text' => 'Productos más vendidos Globalmente',
        ],
  'xAxis' => [
    'type' => 'category',
    'labels' => [
      'rotation' => -45,
      'style' => [
        'fontSize' => '13px',
        'fontFamily' => 'Verdana, sans-serif'
      ]
    ]
  ],
  'yAxis' => [
    'min' => 0,
    'title' => [
      'text' => 'Piezas vendidas'
    ]
  ],
  'legend' => [
    'enabled' => false
  ],
  'series' => [[
    'name' => 'Vendidos',
    'data' => $arreglo
    
  ]
    ],
    'dataLabels' => [
      'enabled' => true,
      'rotation' => -90,
      'color' => '#FFFFFF',
      'align' => 'right',
      'y' => 10, // 10 pixels down from the top
      'style' => [
        'fontSize' => '13px',
        'fontFamily' => 'Verdana, sans-serif'
      ]
    ]
]]);

?>


<?php
//Para cargar únicamente las librerías
HighchartsAsset::register($this)->withScripts(['highstock', 'modules/exporting', 'modules/drilldown']);?>
