<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; // utilizados para select2s
use dosamigos\datepicker\DatePicker; //datepicker


/* @var $this yii\web\View */
/* @var $model app\models\Venta */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="venta-form">

    <div class="col-md-12">
        <?= Html::a('Productos más vendidos',["prodventas"], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="col-md-12">
        <?php
    
     echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/grafico/diasmasventas.php');
     echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/grafico/mesesprod.php');
     echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/grafico/clientemes.php');
    ?>
    </div>
</div>