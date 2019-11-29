<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = $model->PedidoID;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PedidoID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PedidoID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PedidoID',
            [ 'attribute' => 'ProductoID',
                'format'=>'raw',
              'value'=>function($model){
                
                return  $model->producto->Nombre ;
              }
            ],
            'UnidadXLote',
            'FechaInicio',
            'FechaFin',[ 'attribute' => 'Status',
                'format'=>'raw',
              'value'=>function($model){
                
                $str = ' ';
              
                if($model->Status > 0){
                  $str .= 'En proceso';
                }if($model->Status == 0){
                  $str .= 'Finalizado';
                }
                return  $str;
                        
              }
            ],
            'FechaStatusFin',
        ],
    ]) ?>

</div>
