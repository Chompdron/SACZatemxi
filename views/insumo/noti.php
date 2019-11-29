<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use app\models\Insumo;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker

$list= Insumo::find()->andWhere('Stock<5')->all();
?>

<div class="venta-form">

    <h1>Insumos cercanos a acabarse :</h1>
    
    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Insumo</th>
            <th scope="col">Stock Actual</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($list as $detallev) {
        echo '<tr>';
        echo "<td>". $detallev->Descripcion. "</td>";
        echo "<td>" .$detallev->Stock. "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
    
    <div class="col-md-4">
        <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
    </div>


</div>
