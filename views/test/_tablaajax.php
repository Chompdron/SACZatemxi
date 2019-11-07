
<?php 

use kartik\grid\GridView; 
use yii\helpers\Url;
use yii\helpers\Html;

?>    

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [ 'attribute' => 'clave',
                'format'=>'raw',
              'value'=>function($model){
                
                return  Html::a($model->username,['/user/update','id'=>$model->id],["options"=>["data-pjax"=>"0"]]).
                        '<a href="'.Url::to(['/areafuncional/view','id'=>$model->id]).'"  data-pjax="0">'.$model->username.'</a>';
              }
            ],
            'password',
            'nacimiento',
            'auth_key',

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