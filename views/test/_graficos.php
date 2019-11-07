<?php 

use miloschuman\highcharts\Highcharts;

use miloschuman\highcharts\HighchartsAsset; //Para cargar únicamente las librerías

?>


<?=Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Fruit Consumption'],
      'xAxis' => [
         'categories' => ['Apples', 'Bananas', 'Oranges']
      ],
      'yAxis' => [
         'title' => ['text' => 'Fruit eaten']
      ],
      'series' => [
         ['name' => 'Jane', 'data' => [1, 0, 4]],
         ['name' => 'John', 'data' => [5, 7, 3]]
      ]
   ]
])?>



<?=Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Solar Employment Growth by Sector, 2010-2016'],
      'yAxis' => [
         'title' => ['text' => 'Number of Employees']
      ],
      "series"=> [ [
                    "name"=> 'Installation',
                    "data"=> [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
                ], [
                    "name"=> 'Manufacturing',
                    "data"=> [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
                ], [
                    "name"=> 'Sales & Distribution',
                    "data"=> [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
                ], [
                    "name"=> 'Project Development',
                    "data"=> [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
                ], [
                    "name"=> 'Other',
                    "data"=> [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
                ]],

      'legend'=>[
      "layout"=> 'vertical',
        "align"=> 'right',
        "verticalAlign"=> 'middle'
      ],
      "plotOptions"=> [
        "series"=> [
            "label"=> [
                "connectorAllowed"=> false
            ],
            "pointStart"=> 2010
        ]
        ],
        "responsive"=> [
        "rules"=> [[
            "condition"=> [
                "maxWidth"=> 500
            ],
            "chartOptions"=> [
                "legend"=> [
                    "layout"=> 'horizontal',
                    "align"=> 'center',
                    "verticalAlign"=> 'bottom'
                ]
            ]
        ]]
        ]
   ]
])?>



});

<?php
//Para cargar únicamente las librerías
HighchartsAsset::register($this)->withScripts(['highstock', 'modules/exporting', 'modules/drilldown']);?>
