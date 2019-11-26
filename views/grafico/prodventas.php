<?php 

use miloschuman\highcharts\Highcharts;

use miloschuman\highcharts\HighchartsAsset; //Para cargar únicamente las librerías

use yii\web\JsExpression;
//SELECT ProductoID,SUM(Cantidad),COUNT(*) FROM ventalista GROUP BY ProductoID
//SELECT ventalista.ProductoID,SUM(ventalista.Cantidad),producto.Nombre FROM ventalista INNER JOIN producto ON producto.ProductoID = ventalista.ProductoID INNER JOIN venta ON venta.VentaID = ventalista.DetVentaID GROUP BY ProductoID
//Traer todos los productos ordenados por nombre
$mProducto = \app\models\Producto::find()->GROUPBY('Nombre')->all();
//Llenar un arreglo con los nombres de los productos para que sean las "categorías"
$ProductosLista = Array();
foreach ($mProducto as $prod) {
array_push($ProductosLista,$prod->Nombre); 
}

$arreglo = array();
foreach ($mProducto as $prod) {
    $arreglotemp = ['name'=> $prod->Nombre,
            'y'=> $prod->Stock
            ];
    
  array_push($arreglo,$arreglotemp); 
}

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        
        'type' => 'column',
        
        'title' => [
            'text' => 'World\'s largest cities per 2017',
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
      'text' => 'Population (millions)'
    ]
  ],
  'legend' => [
    'enabled' => false
  ],
  'tooltip' => [
    'pointFormat' => 'Population ions</b>'
  ],
  'series' => [[
    'name' => 'Population',
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

SELECT ProductoID,SUM(Cantidad),COUNT(*) FROM ventalista GROUP BY ProductoID

<?php
//Para cargar únicamente las librerías
HighchartsAsset::register($this)->withScripts(['highstock', 'modules/exporting', 'modules/drilldown']);?>
