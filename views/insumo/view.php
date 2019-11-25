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
        <?= Html::a('Bitácora de entradas', ['bitacora', 'id' => $model->InsumoID], ['class' => 'btn btn-primary']) ?> <!--P E N D I E N T E-->
        <?= Html::a('Bitácora de salidas', ['bitacora2', 'id' => $model->InsumoID], ['class' => 'btn btn-primary']) ?> <!--P E N D I E N T E-->
        <?= Html::a('Borrar', ['delete', 'id' => $model->InsumoID], [
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
            'InsumoID',
            'Descripcion',
            'UnidadPresentacionID',
            'Stock',
            'PrecioXUnidad',
            'ProveedorID',
        ],
    ]) ?>

</div>
