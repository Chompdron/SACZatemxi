<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\grid\GridView; 
/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = 'Bitácora del Producto: ' . $model->ProductoID;

        $mProducto = \app\models\Producto::find()->orderBy('Nombre')->all();
        $cmbProducto = \yii\helpers\ArrayHelper::map($mProducto, 'ProductoID', 'Nombre');
$model 
    = new \app\models\Producto();     

?>
<div class="producto-bitacora">

    <div class="col-md-4 col-lg-4">
      <?php $form = ActiveForm::begin(); ?>
     <?=$form->field($model, 'ProductoID')->widget(Select2::classname(), [
                  
                    'value'    => $model->ProductoID,
                    'data'     => $cmbProducto, 'options'  => ['placeholder' => 'Seleccione el proveedor...'],
                    'language' => 'es', 'pluginOptions' => ['allowClear' => true]])?>
         <?php ActiveForm::end(); ?>
    </div>

    
    
    <div class="form-group">
        <?= Html::a('Regresar',["index"], ['class' => 'btn btn-success']) ?>
    </div>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          
            [ 'attribute' => 'ProductoID',
                'format'=>'raw',
              'value'=>function($model){
                
                return  $model->producto->Nombre ;
              }
            ],

            
            'PedidoID',
            'UnidadXLote',
            //'FechaInicio',
            //'FechaFin',

            'FechaStatusFin',
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

