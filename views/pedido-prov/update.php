<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoProv */

$this->title = 'Update Pedido Prov: ' . $model->PedidoProvID;
$this->params['breadcrumbs'][] = ['label' => 'Pedido Provs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PedidoProvID, 'url' => ['view', 'id' => $model->PedidoProvID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedido-prov-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
