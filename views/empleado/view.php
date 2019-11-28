<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */

$this->title = $model->EmpleadoID;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="empleado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
          <?= Html::a('Actualizar', ['update', 'id' => $model->EmpleadoID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->EmpleadoID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'EmpleadoID',
            'Nombre',
            'HorasxSem',
            'PagoxHrs',
              [ 'attribute' => 'UserID',
                'format'=>'raw',
              'value'=>function($model){
                
                $user = $model->user;
                  
                return $user->username;
              }
            ],
        ],
    ]) ?>

</div>
