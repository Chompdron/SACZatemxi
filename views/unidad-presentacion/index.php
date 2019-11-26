<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView; 
/* @var $this yii\web\View */
/* @var $searchModel app\models\UnidadPresentacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidad de Presentación';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidad-presentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nueva unidad de presentación', ['create'], ['class' => 'btn btn-success']) ?>
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
                
                return  Html::a("Actualizar",['/unidad-presentacion/update','id'=>$model->UnidadPresentacionID],["options"=>["data-pjax"=>"0"]]).
                        '<a href="'.Url::to(['/unidad-presentacion/view','id'=>$model->UnidadPresentacionID]).'"  data-pjax="0">'." Ver".'</a>';

              }
            ],
            
            'UnidadPresentacionID',
            'Nombre',
            'cantidadMlGInd',

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
