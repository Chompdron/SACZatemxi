<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Insumo */

$this->title = $model->InsumoID;
$this->params['breadcrumbs'][] = ['label' => 'Insumos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="insumo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->InsumoID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->InsumoID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro que deseas borrarlo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'InsumoID',
            'Descripcion',
            'UnidadPresentacionID',
            'Stock',
            'PrecioXUnidad',
        ],
    ]) ?>

</div>
