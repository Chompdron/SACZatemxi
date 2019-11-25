<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView; 

/* @var $this yii\web\View */
/* @var $searchModel app\models\InsumoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Insumos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insumo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Insumo', ['create'], ['class' => 'btn btn-success']) ?>
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
                
                return  Html::a("Actualizar",['/insumo/update','id'=>$model->InsumoID],["options"=>["data-pjax"=>"0"]]).
                        '<a href="'.Url::to(['/insumo/view','id'=>$model->InsumoID]).'"  data-pjax="0">'." Ver".'</a>';
              }
            ],
            

           'InsumoID',
           'Descripcion',
           [ 'attribute' => 'UnidadPresentacionID',
           'format'=>'raw',
         'value'=>function($model){
           
           $UnidadPresentacion = $model->UnidadPresentacion;
             
           return $UnidadPresentacion->Nombre;
         }
       ],
           'Stock',
           'PrecioXUnidad',

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
