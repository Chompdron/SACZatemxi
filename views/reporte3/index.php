<?php

use yii\helpers\Html;
use kartik\grid\GridView; 
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reporte de pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
                       
            'PedidoID',
             [ 'attribute' => 'ProductoID',
                'format'=>'raw',
              'value'=>function($model){
                
                return  $model->producto->Nombre ;
              }
            ],
             [ 'attribute' => 'Status',
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
