<?php

use yii\helpers\Html;
use yii\web\View;
use app\models\Venta;
use app\models\Pedidoprov;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker
?>


<?php 
if(isset($_SESSION["compra"])){
    echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/pedido-prov/_formcomprasession.php');
    
}
else
{
    $venta = new Pedidoprov(); 
    echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/pedido-prov/_formcompra.php', [
            'model' => $venta]);
}
?>