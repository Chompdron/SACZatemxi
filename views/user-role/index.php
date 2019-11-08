<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView; 


/* @var $this yii\web\View */
/* @var $searchModel app\models\UserRoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-role-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Role', ['create'], ['class' => 'btn btn-success']) ?>
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
                
                return  Html::a("Actualizar",['/cliente/update','id'=>$model->id],["options"=>["data-pjax"=>"0"]]).
                        '<a href="'.Url::to(['/cliente/view','id'=>$model->id]).'"  data-pjax="0">'." Ver".'</a>';
              }
            ],
            
            'id',
            'UserID',
            'RoleID',


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
