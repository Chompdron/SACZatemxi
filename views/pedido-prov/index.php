<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView; 

/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoProvSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedido-Proveedor';
$this->params['breadcrumbs'][] = $this->title;
unset($_SESSION["compra"]);
unset($_SESSION["detc"]);
?>
<div class="pedido-prov-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo Pedido A PROVEEDOR', ['nuevacompra'], ['class' => 'btn btn-success']) ?>
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
                
                return  Html::a("Actualizar",['/pedido-prov/update','id'=>$model->PedidoProvID],["options"=>["data-pjax"=>"0"]]).
                        '<a href="'.Url::to(['/pedido-prov/view','id'=>$model->PedidoProvID]).'"  data-pjax="0">'." Ver".'</a>';
              }
            ],
            
            'PedidoProvID',
            [ 'attribute' => 'ProveedorID',
            'format'=>'raw',
            'value'=>function($model){
           
                $proveedor = $model->proveedor;
             
                return $proveedor->NombreComercial;
            }
        ],
            'Fecha',
            'Total',

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
