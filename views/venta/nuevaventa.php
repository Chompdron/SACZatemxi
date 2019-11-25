<?php

use yii\helpers\Html;
use yii\web\View;
use app\models\Venta;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker
?>


<?php 
if(isset($_SESSION["venta"])){
    echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/venta/_formventasession.php');
    
}
else
{
    $venta = new Venta(); 
    echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/venta/_formventa.php', [
            'model' => $venta]);
}
?>