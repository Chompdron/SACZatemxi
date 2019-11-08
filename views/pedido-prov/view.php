<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoProv */

$this->title = $model->PedidoProvID;
$this->params['breadcrumbs'][] = ['label' => 'Pedido Provs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pedido-prov-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar ', ['update', 'id' => $model->PedidoProvID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->PedidoProvID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro que deseas borrarlo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PedidoProvID',
            'ProveedorID',
            'Fecha',
            'Total',
        ],
    ]) ?>

</div>
