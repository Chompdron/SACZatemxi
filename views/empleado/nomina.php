<?php 
use yii\web\JsExpression;
use yii\helpers\Html;
use yii\web\View;
use app\models\Fechaconsulta;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker
?>

<?php

//Función para contar todos los días laborables (lunes - viernes)
function bussiness_days($begin_date, $end_date, $type = 'array') {
	$date_1 = date_create($begin_date);
	$date_2 = date_create($end_date);
	if ($date_1 > $date_2) return FALSE;
	$bussiness_days = array();
	while ($date_1 <= $date_2) {
		$day_week = $date_1->format('w');
		if ($day_week > 0 && $day_week < 6) {
			$bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
		}
		date_add($date_1, date_interval_create_from_date_string('1 day'));
	}
	if (strtolower($type) === 'sum') {
	    array_map(function($k) use(&$bussiness_days) {
	        $bussiness_days[$k] = count($bussiness_days[$k]);
	    }, array_keys($bussiness_days));
	}
	return $bussiness_days;
}

/*var_dump($_SESSION["Fechas"]);
var_dump($_SESSION["Empleado"]);
<p>Hubo <?=$diastotales?> días laborales</p>
<p>Se le pagará <?=$sueldo?> pesitos</p>
*/


$today = date("F j, Y, g:i a"); 

$dias_habiles = bussiness_days($_SESSION["Fechas"]->FechaInicio, $_SESSION["Fechas"]->FechaFin, 'SUM');

//sumar días
$diastotales = 0;
foreach ($dias_habiles as $v) {
    $diastotales += $v;
}

$sueldo = ($_SESSION["Empleado"]->PagoxHrs * ($_SESSION["Empleado"]->HorasxSem / 5)) * $diastotales;
?>


<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col">Fecha de Expedición</th>
      <th scope="col">Empresa</th>
      <th scope="col">Domicilio</th>
      <th scope="col">RFC</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td><?=$today?></td>
      <td>Zatemxi S.A. de C.V.</td>
      <td>Av Guanajuato 104, Jardines del Moral, 37160 León, Gto.</td>
      <td>XEXX010101000</td>
    </tr>
  </tbody>
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Trabajador</th>
      <th scope="col">Periodo</th>
      <th scope="col">Tot. Días</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td><?=$_SESSION["Empleado"]->Nombre?></td>
      <td><?=$_SESSION["Fechas"]->FechaInicio?> - <?=$_SESSION["Fechas"]->FechaFin?></td>
      <td><?=$diastotales?></td>
    </tr>
  </tbody>
  <thead class="thead-dark">
    <tr>
      <th scope="col">CUANTIA</th>
      <th scope="col">CONCEPTO</th>
      <th scope="col">IMPORTE</th>
      <th scope="col">DEDUCCIÓN</th>
      <th scope="col">TOTAL</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Sueldo Base por Hora Laburada</td>
      <td><?=$_SESSION["Empleado"]->PagoxHrs?></td>
      <td></td>
      <td><?=$sueldo?></td>
    </tr>
     <tr>
      <td>30</td>
      <td>Impuesto Sobre la Renta</td>
      <td></td>
      <td><?=$sueldo*0.16?></td>
      <td>-<?=$sueldo*0.16?></td>
    </tr>
  </tbody><tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>T. Deducir</td>
      <td>LÍQUIDO A PERCIBIR</td>
    </tr>
     <tr>
      <td></td>
      <td></td>
      <td></td>
      <td><?=$sueldo*0.16?></td>
      <td><?=$sueldo?></td>
    </tr>
  </tbody>
</table>

    <div class="col-md-4">
        <?= Html::a('Imprimir',["pdf"], ['class' => 'btn btn-success',"options"=>["data-pjax"=>"0"]]) ?>
    </div>
