<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoProvLista */

$this->title = 'Update Pedido Prov Lista: ' . $model->PedidoProvListaID;
$this->params['breadcrumbs'][] = ['label' => 'Pedido Prov Listas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PedidoProvListaID, 'url' => ['view', 'id' => $model->PedidoProvListaID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedido-prov-lista-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
