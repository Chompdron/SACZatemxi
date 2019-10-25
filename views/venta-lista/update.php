<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VentaLista */

$this->title = 'Update Venta Lista: ' . $model->DetVentaID;
$this->params['breadcrumbs'][] = ['label' => 'Venta Listas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->DetVentaID, 'url' => ['view', 'id' => $model->DetVentaID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="venta-lista-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
