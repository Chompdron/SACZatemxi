<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView; 

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
            //['class' => 'yii\grid\SerialColumn'],
            [ 'attribute' => 'clave',
                'format'=>'raw',
              'value'=>function($model){
                
                return  Html::a("Actualizar",['/pedido-prov-lista/update','id'=>$model->PedidoProvListaID],["options"=>["data-pjax"=>"0"]]).
                        '<a href="'.Url::to(['/pedido-prov-lista/view','id'=>$model->PedidoProvListaID]).'"  data-pjax="0">'." Ver".'</a>';

              }
            ],
            
            'PedidoProvListaID',
            'PedidoProvID',
            'InsumoID',
            'Cantidad',
            'ImportePorPieza',

            //['class' => 'yii\grid\ActionColumn'],
        ],
        'resizableColumns'=>true,
        'pjax'=>true,
        'pjaxSettings'=>[
                            'neverTimeout'=>true,
                        ],
        'panel' => [
                            'type' =>\kartik\grid\GridView::TYPE_DEFAULT,
                            'footer'=>true,
                        ],
        'toolbar'=>[
                            '{export}'
                        ],
        'tableOptions'=>['class'=>'tbl_custom']

    ]); ?>
 


</div>
