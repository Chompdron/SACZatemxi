<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView; 

/* @var $this yii\web\View */
/* @var $searchModel app\models\VentaListaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Venta Listas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-lista-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Venta Lista', ['create'], ['class' => 'btn btn-success']) ?>
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
                
                return  Html::a("Actualizar",['/cliente/update','id'=>$model->DetVentaID],["options"=>["data-pjax"=>"0"]]).
                        '<a href="'.Url::to(['/cliente/view','id'=>$model->DetVentaID]).'"  data-pjax="0">'." Ver".'</a>';
              }
            ],
            
            'DetVentaID',
            'VentaID',
            'ProductoID',
            'Cantidad',
            'PrecioVenta',

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
