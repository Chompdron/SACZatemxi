<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoProvListaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedido Prov Listas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-prov-lista-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pedido Prov Lista', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PedidoProvListaID',
            'PedidoProvID',
            'InsumoID',
            'Cantidad',
            'ImportePorPieza',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
