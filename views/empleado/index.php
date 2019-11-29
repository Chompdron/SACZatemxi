<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView; 

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpleadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo Empleado', ['create'], ['class' => 'btn btn-success']) ?>
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
                
                return  Html::a("Actualizar",['/empleado/update','id'=>$model->EmpleadoID],["options"=>["data-pjax"=>"0"]]).
                        '<a href="'.Url::to(['/empleado/view','id'=>$model->EmpleadoID]).'"  data-pjax="0">'." Ver ".'</a>'.
                        '<a href="'.Url::to(['/empleado/fechanom','id'=>$model->EmpleadoID]).'"  data-pjax="0">'." NÓMINA ".'</a>';
              }
         ],
            'EmpleadoID',
            'Nombre',
            [ 'attribute' => 'UserID',
                'format'=>'raw',
              'value'=>function($model){
                
                $user = $model->user;
                  
                return $user->username;
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
