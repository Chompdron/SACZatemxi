<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView; 

use app\models\Producto;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$Producto = Producto::findone($id);
$this->title = 'Receta de '.$Producto->Nombre;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar Ingrediente', ['create'], ['class' => 'btn btn-success']) ?>
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
                
                return  Html::a("Actualizar",['/receta/update','id'=>$model->RecetaID],["options"=>["data-pjax"=>"0"]]);
              }
            ],
            [ 'attribute' => 'ProductoID',
           'format'=>'raw',
         'value'=>function($model){
           
           $Producto = $model->Producto;
             
           return $Producto->Nombre;
         }
       ],
            [ 'attribute' => 'InsumoID',
           'format'=>'raw',
         'value'=>function($model){
           
           $Insumo = $model->Insumo;
             
           return $Insumo->Descripcion;
         }
       ],
            'Cantidad',


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
