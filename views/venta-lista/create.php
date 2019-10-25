<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VentaLista */

$this->title = 'Create Venta Lista';
$this->params['breadcrumbs'][] = ['label' => 'Venta Listas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-lista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
