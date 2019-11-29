<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\grid\GridView; 
/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = 'Bitácora del Producto: ' . $model->InsumoID;

        /* $mProducto = \app\models\Producto::find()->orderBy('Nombre')->all();
        $cmbProducto = \yii\helpers\ArrayHelper::map($mProducto, 'ProductoID', 'Nombre');
$model 
    = new \app\models\Producto();      */

?>
<div class="producto-bitacora">
    <h1>Bitácora de salidas</h1>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          
            [ 'attribute' => 'InsumoID',
           'format'=>'raw',
         'value'=>function($model){
           
           $Insumo = $model->Insumo;
             
           return $Insumo->Descripcion;
         }
       ],

            
            'FechaInicio',
            'UnidadXLote',

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
    <div class="form-group">
        <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
    </div>

