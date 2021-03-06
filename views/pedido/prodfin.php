<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView; 

/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos Pendientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="col-md-6">
        <?= Html::a('Regresar', ['index'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [ 'attribute' => 'clave',
                'format'=>'raw',
              'value'=>function($model){
                
                $str = Html::a("Actualizar",['/pedido/update','id'=>$model->PedidoID],["options"=>["data-pjax"=>"0"]]).
                '<a href="'.Url::to(['/pedido/view','id'=>$model->PedidoID]).'"  data-pjax="0">'." Ver".'</a>';
              
                if($model->Status > 0){
                  $str .= '<a href="'.Url::to(['/pedido/finalizar','id'=>$model->PedidoID]).'"  data-pjax="0">'." Finalizar".'</a>';
                }
                return  $str;
                        
              }
            ],
            [ 'attribute' => 'ProductoID',
                'format'=>'raw',
              'value'=>function($model){
                
                return  $model->producto->Nombre ;
              }
            ],
            
            'PedidoID',
            'UnidadXLote',
            'FechaInicio',
            'FechaFin',
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
