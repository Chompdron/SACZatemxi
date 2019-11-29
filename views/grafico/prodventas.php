<?php 

use miloschuman\highcharts\Highcharts;

use miloschuman\highcharts\HighchartsAsset; //Para cargar únicamente las librerías

use yii\web\JsExpression;

use yii\helpers\Html;
use yii\web\View;
use app\models\Fechaconsulta;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker


//SELECT producto.Nombre,SUM(ventalista.Cantidad) FROM ventalista INNER JOIN producto ON producto.ProductoID = ventalista.ProductoID INNER JOIN venta ON venta.VentaID = ventalista.DetVentaID WHERE venta.Fecha BETWEEN CAST('2014-02-01' AS DATE) AND CAST('2020-02-28' AS DATE) GROUP BY producto.ProductoID;
//Traer todos los productos ordenados por nombre
$mProducto = \app\models\Productosmasvendidos::find()->all();
//Llenar un arreglo con los nombres de los productos para que sean las "categorías"

$arreglo = array();
foreach ($mProducto as $prod) {
    $arreglotemp = ['name'=> $prod->Nombre,
            'y'=> ($prod->ven)+0

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


<?php $form = ActiveForm::begin(); ?>
<div class="col-md-6">
            <label>Fecha de Inicio</label>
        <?= DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'FechaInicio',
                    'options' => ['required'=>true],
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                ]);?>
</div>

<div class="col-md-6">
            <label>Fecha de Término</label>
        <?= DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'FechaFin',
                    'options' => ['required'=>true],
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                ]);?>
</div>
<br>
    <div class="col-md-4">
        <?= Html::submitButton('Ordenar por fechas', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php
//Para cargar únicamente las librerías
HighchartsAsset::register($this)->withScripts(['highstock', 'modules/exporting', 'modules/drilldown']);?>