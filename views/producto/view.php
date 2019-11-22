<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = $model->ProductoID;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="producto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->ProductoID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Bitácora', ['bitacora', 'id' => $model->ProductoID], ['class' => 'btn btn-primary']) ?> <!--P E N D I E N T E-->
        <?= Html::a('Borrar', ['delete', 'id' => $model->ProductoID], [
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
            'ProductoID',
            'Nombre',
            'Cantidad',
            'Precio',
            'Stock',
        ],
    ]) ?>

</div>
